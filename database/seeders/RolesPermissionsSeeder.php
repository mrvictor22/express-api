<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear los permisos
        $permissions = [
            'crear_ruta',
            'leer_ruta',
            'actualizar_ruta',
            'eliminar_ruta',
            'crear_configuracion',
            'leer_configuracion',
            'actualizar_configuracion',
            'eliminar_configuracion',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Crear los roles
        $roles = [
            'admin',
            'basic_user',
            'guest',
        ];

        foreach ($roles as $roleName) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($permissions);
        }
    }
}
