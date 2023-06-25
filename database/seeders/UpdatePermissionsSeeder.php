<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UpdatePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Mapeo de nombres de permisos antiguos a los nuevos nombres
        $oldPermissions = [
            'crear_ruta' => 'Gestion de rutas.create',
            'leer_ruta' => 'Gestion de rutas.read',
            'actualizar_ruta' => 'Gestion de rutas.update',
            'eliminar_ruta' => 'Gestion de rutas.delete',
            'crear_configuracion' => 'Configuracion.create',
            'leer_configuracion' => 'Configuracion.read',
            'actualizar_configuracion' => 'Configuracion.update',
            'eliminar_configuracion' => 'Configuracion.delete',
        ];

        foreach ($oldPermissions as $oldName => $newName) {
            $permission = Permission::where('name', $oldName)->first();

            if ($permission) {
                $permission->name = $newName;
                $permission->save();
            }
        }
    }
}
