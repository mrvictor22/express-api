<?php

namespace App\Http\Controllers;

use App\Models\Rutas;
use App\Models\RutasProductos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Exports\RutasExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Http;
use Symfony\Polyfill\Intl\Idn\Info;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use App\Models\Vehiculos;
use App\Models\User;
class RutasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  //  public function __construct()
  //  {
  //      $this->middleware('auth');
  //  }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public $id;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->id = Auth::user()->id;

            return $next($request);
        });

    }

    public function index()
    {
        return view('rutas.index');

    }
    public function form()
    {
        $this->get_vehiculos();
//        $Id_usuario = $this->id;
//        $nombre = User::find($Id_usuario);
//
//        dd($nombre->name);
        return view('rutas.rutas-form');

    }
    public function root()
    {
        return view('index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $ruta_save = new Rutas;
        $productos_ruta = new RutasProductos;
        $Id_usuario = $this->id;
        $nombre = User::find($Id_usuario);
        //Save data
               $ruta_save->numero_guia      = $request->guiaInput;
               $ruta_save->vehiculo         = $request->vehiculoInput;
               $ruta_save->nombre_contact   = $request->nombre_contact;
               $ruta_save->phn_contact      = $request->phn_contact;
               $ruta_save->email_contact    = $request->email_contact;
               $ruta_save->direccion_contact = $request->direccion_contact;
               $ruta_save->sucursal         = $request->sucursal_contact;
               $ruta_save->mode         = $request->mode;
               $ruta_save->creado_por         = $nombre->name;
               $ruta_save->fecha_despacho   = $request->fecha_despacho;
               $ruta_save->debug_request = $request;
               $ruta_save->save();
               $last_id = $ruta_save->id;
            // $name =  count($request->DetailsName);
            $count =  count($request->DetailsName);

            // info($name);
            // info($request->DetailsName);

            for ($i=0; $i < $count ; $i++) {

                $prod_names = $request->DetailsName[$i];
                $prod_amounts = $request->DetailsAmount[$i];
                $prod_codes = $request->DetailsCode[$i];
                if ($prod_names == '' || $prod_amounts == '' || $prod_codes == '')
                {
                    $prod_names = null;
                    $prod_amounts = null;
                    $prod_codes = null;
                } else
                {
                    $productos_ruta = new RutasProductos;
                    $productos_ruta->id_rutas_tbl = $last_id;
                    $productos_ruta->nombre_prod = $prod_names;
                    $productos_ruta->cant_prod = $prod_amounts;
                    $productos_ruta->cod_prod = $prod_codes;
                    $productos_ruta->save();

                    $prod[] = [
                        "code" => $prod_codes,
                        "description"=> $prod_names,
                        "quantity"=> $prod_amounts,
                        "unit_price"=> "0"
                    ];
                }



            }
//            info($prod);
            if (empty($prod))
            {
                $prod = 0;

                $data = [
                    'vehiculo' => $request->vehiculoInput,
                    'f_despacho' => $request->fecha_despacho,
                    'guia'      => $request->guiaInput,
                    'mode'      => $request->mode,
                    'nombre_contacto' => $request->nombre_contact,
                    'telefono_contacto' => $request->phn_contact,
                    'dir_contacto' => $request->direccion_contact,
                    'email_contacto' => $request->email_contact
                     ];
                $this->to_api($data, $prod);
            } else
            {
                $whith_prod = 1;
                $data = [
                    'vehiculo' => $request->vehiculoInput,
                    'f_despacho' => $request->fecha_despacho,
                    'guia'      => $request->guiaInput,
                    'mode'      => $request->mode,
                    'nombre_contacto' => $request->nombre_contact,
                    'telefono_contacto' => $request->phn_contact,
                    'dir_contacto' => $request->direccion_contact,
                    'email_contacto' => $request->email_contact,
                    'productos' => $prod ];

                $this->to_api($data,$whith_prod );
            }



               $message = 'correct'  ;
               Alert::success('Done!', 'Ruta almacenada');
               return view('rutas.rutas-form');
    }

    public function to_api($param,$with_prod)
    {
        $object = (object) $param ;
        $dt = $object->f_despacho;

//        info($dt);


        if ($with_prod == 0)
        {
            $data = [
                "truck_identifier" => $object->vehiculo,
                "date"             => $object->f_despacho,
                "dispatches"=> [[

                    "identifier" => $object->guia,
                    "mode" => $object->mode,
                    "contact_name"=> $object->nombre_contacto,
                    "contact_address"=> $object->dir_contacto,
                    "contact_phone"=> $object->telefono_contacto,
                    "contact_email"=> $object->email_contacto

                ]]

            ];
        }
        else
        {
            $productos = $object->productos;
            $data = [
                "truck_identifier" => $object->vehiculo,
                "date"             => $object->f_despacho,
                "dispatches"=> [[

                    "identifier" => $object->guia,
                    "mode" => $object->mode,
                    "contact_name"=> $object->nombre_contacto,
                    "contact_address"=> $object->dir_contacto,
                    "contact_phone"=> $object->telefono_contacto,
                    "contact_email"=> $object->email_contacto,
                    "items"=>  $productos

                ]]

            ];
        }


        $coded = json_encode($data);
        info($coded);

        $response = Http::withHeaders(['X-AUTH-TOKEN' => 'fae3a44c63ab2487f03a2664e801197e56f9886167fb26e47b3b89f19fce0403'])
            ->withOptions(['verify' => false])
            ->withBody($coded, 'application/json')
            ->post(env('BEETRAK_URL'));

//        info($response->throw());

        return $response->throw();
    }

    public function get_vehiculos()
    {
        $response = Http::withHeaders(['X-AUTH-TOKEN' => 'fae3a44c63ab2487f03a2664e801197e56f9886167fb26e47b3b89f19fce0403'])
            ->withOptions(['verify' => false])
            ->get(env('BEETRAK_TRUCKS_URL'));




//        info($response->json()['response']['trucks']);
        $v = $response->json()['response']['trucks'];
      foreach ($v as $objeto)
      {
          $a[] = [ 'id' => $objeto,
                    'text' => $objeto];
//            info($a);
            DB::table('vehiculos_tbl')->insertOrIgnore(['vehiculo' => $objeto]);

      }



    $data = [ 'results' => $a];
        $coded = json_encode($data);
    return $coded;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rutas  $rutas
     * @return \Illuminate\Http\Response
     */
    public function show(Rutas $rutas)
    {
        $data = DB::table('rutas_tbl')->join('producto_rutas_tbl','rutas_tbl.id','=','producto_rutas_tbl.id_rutas_tbl')
                                            ->select('rutas_tbl.*','producto_rutas_tbl.nombre_prod','producto_rutas_tbl.cant_prod','producto_rutas_tbl.cod_prod')
                                            ->get();

        return datatables()->of($data)->toJson();
    }
    public function data()
    {
        $Id_usuario = $this->id;
        $nombre = User::find($Id_usuario);

       $data = DB::table('rutas_tbl')
                //->join('producto_rutas_tbl','rutas_tbl.id', '=' , 'producto_rutas_tbl.id_rutas_tbl')
                //->groupBy('rutas_tbl.id')
                ->where('creado_por' , $nombre->name)
                ->orderBy('id','DESC')
                ->get();


       foreach ($data as $column){
           $data2 = DB::table('producto_rutas_tbl')->where('id_rutas_tbl',$column->id)->get();
           $ajax_data[] = [
               'id' => $column->id,
               'numero_guia' => $column->numero_guia,
               'vehiculo' => $column->vehiculo,
               'nombre_contact' => $column->nombre_contact,
               'phn_contact' => $column->phn_contact,
               'email_contact' => $column->email_contact,
               'direccion_contact' => $column->direccion_contact,
               'sucursal' => $column->sucursal,
               'fecha_despacho' => $column->fecha_despacho,
               'fecha_registro' => $column->created_at,
               'creado_por' => $column->creado_por,
               'productos' => [
                   $data2
               ]

           ];

       }



        //return $ajax_data ;
       return datatables()->of($ajax_data)->toJson();
    }

    /**
     * Show the form for generate the specified resource.
     *
     * @param  \App\Models\Rutas  $rutas
     * @return \Illuminate\Http\Response
     */
    public function qr($rutas)
    {
        $ruta_id = $rutas;
        $guia = DB::table('rutas_tbl')->where('id' , $ruta_id)->get();
        $id_guia = "";
        foreach ( $guia as $object)
        {
          $id_guia =  $object->numero_guia;
          $telefono = $object->phn_contact;
          $destino = $object->direccion_contact;
          $nombre_contact = $object->nombre_contact;
          $tipo_entrega = $object->mode;
          $sucursal = $object->sucursal;
          $fecha_despacho = $object->fecha_despacho;
          $google_API = "https://chart.googleapis.com/chart?chs=290x290&cht=qr&chl=";
        }
        return view('rutas.qr-print',compact('ruta_id','telefono','google_API','sucursal','fecha_despacho', 'id_guia','destino','nombre_contact','tipo_entrega'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rutas  $rutas
     * @return \Illuminate\Http\Response
     */
    public function edit(Rutas $rutas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rutas  $rutas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rutas $rutas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rutas  $rutas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rutas $rutas)
    {
        //
    }

    public function csv_export()
    {
        return Excel::download(new RutasExport, 'rutas.csv');

    }

    function generarNumeroGuia() {
        // Obtener el último número de guía registrado
        $ultimoNumeroGuia = DB::table('rutas_tbl')->max('numero_guia');

        // Si no hay registros, empezar desde A0001
        if (!$ultimoNumeroGuia || $ultimoNumeroGuia == 'A0001'){
            $numeroGuia = 'A0001';
        } else {
            // Obtener la letra y el número del último número de guía registrado
            $letra = substr($ultimoNumeroGuia, 0, 1);
            $numero = intval(substr($ultimoNumeroGuia, 1));

            // Si el número es menor a 9999, aumentarlo en 1. Si es igual a 9999, cambiar de letra y empezar desde 0001.
            if ($numero < 9999) {
                $numero++;
            } else {
                $letra++;
                $numero = 1;
            }

            // Formatear el número de guía con ceros a la izquierda y la letra correspondiente
            $numeroGuia = $letra . sprintf('%04d', $numero);
        }

        // Retornar el número de guía generado en formato JSON
        $response = ['numeroGuia' => $numeroGuia];
        return response()->json($response);
    }


}
