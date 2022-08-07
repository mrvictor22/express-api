<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Victor Alfonso Ventura',
            'email'=> 'vc70383@hotmail.com',
            'avatar' => 'avatar-1.jpg',
            'password'=>bcrypt('220199')
        ])->assingRole('admin');
        User::factory(9)->create();
    }
}
