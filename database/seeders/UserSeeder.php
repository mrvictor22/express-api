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
//        User::create([
//            'name' => 'user1',
//            'email'=> 'invitado@mail.com',
//            'avatar' => 'avatar-1.jpg',
//            'password'=>bcrypt('express22')
//        ])->assignRole('admin');
//
//usuario: lagranvia
//claave: lagranvia1
//
//usuario: galerias
//claave: galerias2
//
//usuario: metrocentro
//claave: metrocentro3
//
//usuario: plazamundo
//claave: plazamundo4
//
//usuario: santaana
//claave: santaana5
//
//usuario: sanmiguel
//claave: sanmiguel6
//
//usuario: ffc
//claave: ffc7
//
//usuario: invitado
//claave: invitado8


//        User::create([
//            'name' => 'lagranvia',
//            'email'=> 'lagranvia@mail.com',
//            'avatar' => 'avatar-1.jpg',
//            'password'=>bcrypt('lagranvia1')
//        ])->assignRole('basic_user');
//
//        User::create([
//            'name' => 'galerias',
//            'email'=> 'galerias@mail.com',
//            'avatar' => 'avatar-1.jpg',
//            'password'=>bcrypt('galerias2')
//        ])->assignRole('basic_user');
//
//        User::create([
//            'name' => 'metrocentro',
//            'email'=> 'metrocentro@mail.com',
//            'avatar' => 'avatar-1.jpg',
//            'password'=>bcrypt('metrocentro3')
//        ])->assignRole('basic_user');
//
//        User::create([
//            'name' => 'plazamundo',
//            'email'=> 'plazamundo@mail.com',
//            'avatar' => 'avatar-1.jpg',
//            'password'=>bcrypt('plazamundo4')
//        ])->assignRole('basic_user');
//
//        User::create([
//            'name' => 'santaana',
//            'email'=> 'santaana@mail.com',
//            'avatar' => 'avatar-1.jpg',
//            'password'=>bcrypt('santaana5')
//        ])->assignRole('basic_user');
//
//        User::create([
//            'name' => 'sanmiguel',
//            'email'=> 'sanmiguel@mail.com',
//            'avatar' => 'avatar-1.jpg',
//            'password'=>bcrypt('sanmiguel6')
//        ])->assignRole('basic_user');
//
//        User::create([
//            'name' => 'ffc',
//            'email'=> 'ffc@mail.com',
//            'avatar' => 'avatar-1.jpg',
//            'password'=>bcrypt('ffc7')
//        ])->assignRole('basic_user');
//
//        User::create([
//            'name' => 'invitado8',
//            'email'=> 'invitado8@mail.com',
//            'avatar' => 'avatar-1.jpg',
//            'password'=>bcrypt('invitado8')
//        ])->assignRole('basic_user');
//        User::create([
//            'name' => 'marketplace',
//            'email'=> 'marketplace@mail.com',
//            'avatar' => 'avatar-1.jpg',
//            'password'=>bcrypt('marketplace9')
//        ])->assignRole('basic_user');
//        User::create([
//            'name' => 'KiutDiva',
//            'email'=> 'kiutdiva@mail.com',
//            'avatar' => 'avatar-1.jpg',
//            'password'=>bcrypt('KiutDiva2023')
//        ])->assignRole('basic_user');
//        User::create([
//            'name' => 'MintStore',
//            'email'=> 'mintStore@mail.com',
//            'avatar' => 'avatar-1.jpg',
//            'password'=>bcrypt('MintStore2023')
//        ])->assignRole('basic_user');
//        User::create([
//            'name' => 'MuchaMujer',
//            'email'=> 'muchamujer@mail.com',
//            'avatar' => 'avatar-1.jpg',
//            'password'=>bcrypt('MuchaMujer2023')
//        ])->assignRole('basic_user');
//        User::create([
//            'name' => 'ShopSV',
//            'email'=> 'shopsv@mail.com',
//            'avatar' => 'avatar-1.jpg',
//            'password'=>bcrypt('ShopSV2023')
//        ])->assignRole('basic_user');
//        User::create([
//            'name' => 'Laikis.sv',
//            'email'=> 'laikissv@mail.com',
//            'avatar' => 'avatar-1.jpg',
//            'password'=>bcrypt('laikissv2023')
//        ])->assignRole('basic_user');
//        User::create([
//            'name' => 'UNIKA STORE',
//            'email'=> 'unikastore@mail.com',
//            'avatar' => 'avatar-1.jpg',
//            'password'=>bcrypt('unikastore2023')
//        ])->assignRole('basic_user');
//        User::create([
//            'name' => 'Velail Studio',
//            'email'=> 'velailstudio@mail.com',
//            'avatar' => 'avatar-1.jpg',
//            'password'=>bcrypt('velailstudio2023')
//        ])->assignRole('basic_user');
//        User::create([
//            'name' => 'Place It ',
//            'email'=> 'placeit@mail.com',
//            'avatar' => 'avatar-1.jpg',
//            'password'=>bcrypt('placeit2023')
//        ])->assignRole('basic_user');
        User::create([
            'name' => 'ONE CLICK',
            'email'=> 'oneclick@mail.com',
            'avatar' => 'avatar-1.jpg',
            'password'=>bcrypt('oneclick2023')
        ])->assignRole('basic_user');

    }
}
