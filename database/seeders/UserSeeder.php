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
        $avatar = 'avatar-1.jpg';
        //
       
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
//        User::create([
//            'name' => 'ONE CLICK',
//            'email'=> 'oneclick@mail.com',
//            'avatar' => 'avatar-1.jpg',
//            'password'=>bcrypt('oneclick2023')
//        ])->assignRole('basic_user');
//        User::create([
//            'name' => 'DANILO ESCOBAR',
//            'email'=> 'daniloescobar@mail.com',
//            'avatar' => 'avatar-1.jpg',
//            'password'=>bcrypt('daniloescobar2023')
//        ])->assignRole('basic_user');
//        User::create([
//            'name' => 'CHIDO',
//            'email'=> 'chido@mail.com',
//            'avatar' => 'avatar-1.jpg',
//            'password'=>bcrypt('chido2023')
//        ])->assignRole('basic_user');
//        User::create([
//            'name' => 'ESAU MARTINEZ',
//            'email'=> 'esaumartinez@mail.com',
//            'avatar' => 'avatar-1.jpg',
//            'password'=>bcrypt('esaumartinez2023')
//        ])->assignRole('basic_user');
//        User::create([
//            'name' => 'RONELY STORE',
//            'email'=> 'ronelystore@mail.com',
//            'avatar' => 'avatar-1.jpg',
//            'password'=>bcrypt('ronelystore2023')
//        ])->assignRole('basic_user');
//        User::create([
//            'name' => 'MIA VOGA',
//            'email'=> 'miavoga@mail.com',
//            'avatar' => 'avatar-1.jpg',
//            'password'=>bcrypt('miavoga2023')
//        ])->assignRole('basic_user');
//        User::create([
//            'name' => 'Piqueando Online',
//            'email'=> 'piqueando@mail.com',
//            'avatar' => 'avatar-1.jpg',
//            'password'=>bcrypt('piqueando2023')
//        ])->assignRole('basic_user');





        User::create([
            'name' => 'littlekids',
            'email' => 'littlekids@example.com',
            'avatar' => $avatar,
            'password' => bcrypt('littlekids2023'),
        ])->assignRole('basic_user');

        User::create([
            'name' => 'JMSport',
            'email' => 'jmsport@example.com',
            'avatar' => $avatar,
            'password' => bcrypt('jmsport2023'),
        ])->assignRole('basic_user');

        User::create([
            'name' => 'Wizards',
            'email' => 'wizards@example.com',
            'avatar' => $avatar,
            'password' => bcrypt('wizards2023'),
        ])->assignRole('basic_user');

        User::create([
            'name' => 'Bazar Melissa',
            'email' => 'bazarmelissa@example.com',
            'avatar' => $avatar,
            'password' => bcrypt('bazarmelissa2023'),
        ])->assignRole('basic_user');

        User::create([
            'name' => 'La Manzanita',
            'email' => 'lamanzanita@example.com',
            'avatar' => $avatar,
            'password' => bcrypt('lamanzanita2023'),
        ])->assignRole('basic_user');

        User::create([
            'name' => 'WoodartSv',
            'email' => 'woodartsv@example.com',
            'avatar' => $avatar,
            'password' => bcrypt('woodartsv2023'),
        ])->assignRole('basic_user');

        User::create([
            'name' => 'Cygnus',
            'email' => 'cygnus@example.com',
            'avatar' => $avatar,
            'password' => bcrypt('cygnus2023'),
        ])->assignRole('basic_user');

        User::create([
            'name' => 'Balu-Vogue',
            'email' => 'balu-vogue@example.com',
            'avatar' => $avatar,
            'password' => bcrypt('balu-vogue2023'),
        ])->assignRole('basic_user');



    }
}
