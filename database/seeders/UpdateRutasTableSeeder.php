<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateRutasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rutas = DB::table('rutas_tbl')
            ->join('users', 'users.name', '=', 'rutas_tbl.creado_por')
            ->select('rutas_tbl.id', 'users.id as user_id')
            ->get();

        foreach ($rutas as $ruta) {
            DB::table('rutas_tbl')
                ->where('id', $ruta->id)
                ->update(['creado_por' => $ruta->user_id]);
        }
    }
}
