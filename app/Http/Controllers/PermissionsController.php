<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
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

        $modules = [
            'Gestion de rutas' => [
                'create' => $permissions->contains('name', 'Gestion de rutas.create'),
                'read' => $permissions->contains('name', 'Gestion de rutas.read'),
                'update' => $permissions->contains('name', 'Gestion de rutas.update'),
                'delete' => $permissions->contains('name', 'Gestion de rutas.delete')
            ],
            'Configuracion' => [
                'create' => $permissions->contains('name', 'Configuracion.create'),
                'read' => $permissions->contains('name', 'Configuracion.read'),
                'update' => $permissions->contains('name', 'Configuracion.update'),
                'delete' => $permissions->contains('name', 'Configuracion.delete')
            ]
        ];

        $request = request();
        if ($request->ajax()) {
            return view('permissions.table', compact('modules'));
        }

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
//        info($request);
        $permissions = $request->input('permissions', []);

        // Obtén los nombres de permisos basados en los valores booleanos
        $permissionNames = [];
        foreach ($permissions as $module => $modulePermissions) {
            foreach ($modulePermissions as $permission => $value) {
                if ($value === 'true') {
                    // Verificar si el permiso existe
                    $existingPermission = Permission::where('name', $permission)->first();
                    if (!$existingPermission) {
                        // Si el permiso no existe, crearlo
                        $existingPermission = Permission::create([
                            'name' => $permission,
                            'guard_name' => 'web',
                        ]);
                    }
                    $permissionNames[] = $existingPermission->name;
                }
            }
        }

        // Actualizar los permisos del rol
        $role->syncPermissions($permissionNames);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Permisos actualizados correctamente']);
        }

        // Redirigir a la vista de permisos después de la actualización
        return redirect()->route('permissions.index', ['id' => $id])->with('success', 'Permisos actualizados correctamente');
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
