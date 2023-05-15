<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index($id)
    {
        $role = Role::findOrFail($id);
        $permissions = $role->permissions;
        info($permissions);

        $modules = [
            'Gestion de rutas' => [
                'create' => $permissions->contains('name', 'crear_ruta'),
                'read' => $permissions->contains('name', 'leer_ruta'),
                'update' => $permissions->contains('name', 'actualizar_ruta'),
                'delete' => $permissions->contains('name', 'eliminar_ruta')
            ],
            'Configuracion' => [
                'create' => $permissions->contains('name', 'crear_configuracion'),
                'read' => $permissions->contains('name', 'leer_configuracion'),
                'update' => $permissions->contains('name', 'actualizar_configuracion'),
                'delete' => $permissions->contains('name', 'eliminar_configuracion')
            ]
        ];

        return view('permissions.index', compact('modules', 'id'));
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
