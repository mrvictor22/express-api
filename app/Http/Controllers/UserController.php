<?php

namespace App\Http\Controllers;

use App\Models\Rutas;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('users.index');
    }

    public function userdata()
    {
        $userId = Auth::id();
        $userIds = DB::table('users')->pluck('id')->filter(function ($id) use ($userId) {
            return $id != $userId;
        })->toArray();

        $users = DB::table('users')->whereIn('id', $userIds)->distinct()->get();

        return datatables()->of($users)->toJson();
    }

    public function checkData($id)
    {
        $user = User::find($id);

        if (!$user) {
            abort(404);
        }
        // Verificar si el usuario autenticado tiene el rol de administrador y el permiso correspondiente
        if (Auth::user()->hasRole('admin') && Auth::user()->can('admin.read')) {
            return response()->json($user);
        }else{
            // Devolver un error de acceso denegado en json
            return response()->json(['error' => 'Access denied'], 403);
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $roles = Role::all(); // Obtener todos los roles disponibles

        return view('users.create-profile', compact('roles')); // Enviar los roles a la vista
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $request->validate([
                'firstname' => 'required',
                'email' => 'required|email',
                'avatar' => 'nullable|mimes:jpg,jpeg,png,bmp,tiff|max:25600', // 25MB = 25600KB

            ]);

            // verificar si el usuario ya existe
            $user = User::where('name' , $request->firstname)
                ->orWhere('lastname' ,$request->lastname)
                ->orWhere('email' ,$request->email)
                ->first();

            if ($user) {
                Alert::error('Error!', 'El usuario ya existe');
                return redirect()->back();
            }

            // si el usuario no existe, crearlo
            $password = $request->password ?: 'welcome1';
            $password = Hash::make($password);

            $user = new User;
            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $avatarName = time() . '.' . $request->avatar->getClientOriginalExtension();
                $request->avatar->move(public_path('images'), $avatarName);
                $user->avatar = $avatarName;
            }
            $user->name = $request->firstname;
            $user->lastname = $request->lastname;
            $user->phone_number = $request->phonenumber;
            $user->email = $request->email;
            $user->password = $password;
            $user->Empresa = $request->empresa;
            $user->Ciudad = $request->city;
            $user->Direccion = $request->direccion;
            $user->descripcion = $request->description;




            $user->save();

            $user->roles()->attach($request->role);

            Alert::success('Done!', 'Usuario almacenado');
            return redirect()->route('config.index');

        } catch (\Exception $e) {
            info($e->getMessage());
            info($e->getCode());
            info($e->getFile());
            info($e->getLine());
            info($e->getTraceAsString());
            return redirect()->back()->with('error', 'Error al crear el usuario');
        }
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    #Funtion to show the update form for users
    public function showProfile()
    {
        $user = auth()->user();
        $count = Rutas::where('creado_por', $user->name)->count();
        $prods = Rutas::join('producto_rutas_tbl', 'rutas_tbl.id', '=', 'producto_rutas_tbl.id_rutas_tbl')
            ->where('rutas_tbl.creado_por', $user->name)
            ->sum('producto_rutas_tbl.cant_prod');
        return view('users.profile', compact('user', 'count', 'prods'));
    }

    #Funcion para redireccionar a la pantalla de perfil de usuario y enviar toda la informacion del usuario
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $userRole = $user->roles->pluck('id')->toArray();
        return view('users.edit-profile', compact('user', 'roles', 'userRole'));
    }






    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        try {
            DB::beginTransaction();

            $user = User::findOrFail($id);
            $user->permissions()->detach(); // quitar todos los permisos del usuario
            $user->roles()->detach(); // quitar todos los roles del usuario
            $user->delete(); // eliminar el usuario

            DB::commit();

            Alert::success('Done!', 'Usuario eliminado');
            return redirect()->route('config.index');

        } catch (\Exception $e) {
            DB::rollback();
            info($e->getMessage());
            return redirect()->back()->with('error', 'Error al eliminar el usuario');
        }
    }


    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required',
            'email' => 'required|email',
            'avatar' => 'nullable|mimes:jpg,jpeg,png,bmp,tiff|max:25600', // 25MB = 25600KB

        ]);
        //TODO: si la contra es vacia dejar welcome1 si no dejar la que ya habia dejado el usuario
        $password = $request->password ?: 'welcome1';
        $password = Hash::make($password);

        $user = User::find($id);
        $user->name = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone_number = $request->phonenumber;
        $user->email = $request->email;
        $user->password = $password;
        $user->Empresa = $request->empresa;
        $user->Ciudad = $request->city;
        $user->Direccion = $request->direccion;
        $user->descripcion = $request->description;

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $avatarName = time() . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('images'), $avatarName);
            $user->avatar = $avatarName;
        }
        if ($request->role != 'no change' && $request->has('role')) {
            $user->syncRoles($request->role); // Actualiza el rol del usuario
        }



        $user->update();
        if ($user) {
            Alert::success('Done!', 'Usuario Actualizado');
            return redirect()->route('config.index');

        } else {
            Alert::error('Error!', 'Algo salio mal');
            return redirect()->route('config.index');

        }
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return response()->json([
                'isSuccess' => false,
                'Message' => "Your Current password does not matches with the password you provided. Please try again."
            ], 200); // Status code
        } else {
            $user = User::find($id);
            $user->password = Hash::make($request->get('password'));
            $user->update();
            if ($user) {
                Session::flash('message', 'Password updated successfully!');
                Session::flash('alert-class', 'alert-success');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Password updated successfully!"
                ], 200); // Status code here
            } else {
                Session::flash('message', 'Something went wrong!');
                Session::flash('alert-class', 'alert-danger');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Something went wrong!"
                ], 200); // Status code here
            }
        }
    }
}
