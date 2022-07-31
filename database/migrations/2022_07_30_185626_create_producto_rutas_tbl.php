<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_rutas_tbl', function (Blueprint $table) {
            $table->id();
            $table->integer('id_rutas_tbl');
            $table->string('nombre_prod', 250);
            $table->integer('cant_prod');
            $table->integer('cod_prod');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto_rutas_tbl');
    }
};
