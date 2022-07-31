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
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        return view('rutas-form');

    }
    public function form()
    {
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
        //
        $ruta_save = new Rutas;
        $productos_ruta = new RutasProductos;

        //Save data
               $ruta_save->numero_guia      = $request->guiaInput;
               $ruta_save->vehiculo         = $request->vehiculoInput;
               $ruta_save->nombre_contact   = $request->nombre_contact;
               $ruta_save->phn_contact      = $request->phn_contact;
               $ruta_save->email_contact    = $request->email_contact;
               $ruta_save->direccion_contact = $request->direccion_contact;
               $ruta_save->sucursal         = $request->sucursal_contact;
               $ruta_save->fecha_despacho   = $request->fecha_despacho;
               $ruta_save->debug_request = $request;
               $ruta_save->save();
               $last_id = $ruta_save->id;
            $name =  count($request->DetailsName);
            $count =  count($request->DetailsName);
            
            info($name);
            info($request->DetailsName);

            for ($i=0; $i < $count ; $i++) { 
                
                $prod_names = $request->DetailsName[$i];
                $prod_amounts = $request->DetailsAmount[$i];
                $prod_codes = $request->DetailsCode[$i];

                $productos_ruta = new RutasProductos;
                $productos_ruta->id_rutas_tbl = $last_id;
                $productos_ruta->nombre_prod = $prod_names;
                $productos_ruta->cant_prod = $prod_amounts;
                $productos_ruta->cod_prod = $prod_codes;
                $productos_ruta->save();
            }

          
            

            
               $message = 'correct'  ;
               Alert::success('Done!', 'Ruta almacenada');
               return view('rutas.rutas-form');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rutas  $rutas
     * @return \Illuminate\Http\Response
     */
    public function show(Rutas $rutas)
    {
        //
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
}
