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
        Schema::create('rutas_tbl', function (Blueprint $table) {
            $table->id();
            $table->string('numero_guia', 250);
            $table->string('vehiculo', 250);
            $table->string('nombre_contact', 250);
            $table->string('phn_contact', 250);
            $table->string('email_contact', 250);
            $table->string('direccion_contact', 250);
            $table->string('sucursal', 250);
            $table->string('mode', 250);
            $table->text('debug_request', 250);
            $table->date('fecha_despacho');
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
        Schema::dropIfExists('rutas_tbl');
    }
};
