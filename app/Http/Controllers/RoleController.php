<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        if (request()->ajax()) {
            $roles = Role::query();
            return DataTables::of($roles)
                ->addColumn('actions', function ($role) {
                    // Aquí puedes agregar botones para editar y eliminar roles
                    return view('roles.actions', compact('role'));
                })
                ->rawColumns(['actions'])
                ->toJson();
        }

        return view('roles.index');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Role $role)
    {
        $user = Auth::user();
        $isAdmin = $user->hasRole('admin');
        info($isAdmin);
        return view('roles.edit', compact('role', 'isAdmin'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Role $role)
    {
        $role->name = $request->name;
        $role->guard_name = $request->guard_name;
        $role->save();

        return redirect()->route('roles.index')->with('success', 'Rol actualizado correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        // Obtener el ID del rol al que se reasignarán los usuarios (por ejemplo, el ID del rol "default")
        $defaultRoleId = 4; // ID del rol "default"

        // Obtener todos los usuarios que tienen el rol a eliminar
        $users = $role->users;

        // Reasignar a los usuarios al rol "default"
        foreach ($users as $user) {
            $user->syncRoles([$defaultRoleId]);
        }

        // Eliminar el rol
        $role->delete();

        // Realizar cualquier otra acción necesaria después de la eliminación del rol
        Alert::success('Done!', 'Rol Borrado');
        return redirect()->route('roles.index')->with('success', 'El rol ha sido eliminado exitosamente');
    }
}
