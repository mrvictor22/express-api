<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_0 = Role::create(['name' => 'admin']);
        $role_1 = Role::create(['name' => 'basic_user']);
        $role_3 = Role::create(['name' => 'guest']);

        $permission_1 = Permission::create(['name' => 'admin.read'])->syncRoles([$role_0,$role_1,$role_3]);
        $permission_2 = Permission::create(['name' => 'admin.edit '])->syncRoles([$role_0,$role_1,$role_3]);
        $permission_3 = Permission::create(['name' => 'admin.create'])->syncRoles([$role_0], $role_1,$role_3);
        $permission_4 = Permission::create(['name' => 'admin.delete'])->syncRoles([$role_0,$role_1,$role_3]);
        $permission_4 = Permission::create(['name' => 'admin.index'])->syncRoles([$role_0,$role_1,$role_3]);
    }
}
