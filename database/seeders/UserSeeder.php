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
            'name' => 'user1',
            'email'=> 'invitado@mail.com',
            'avatar' => 'avatar-1.jpg',
            'password'=>bcrypt('express22')
        ])->assignRole('admin');

    }
}
