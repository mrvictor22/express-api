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
        Schema::table('producto_rutas_tbl', function (Blueprint $table) {
            $table->string('nombre_prod')->nullable()->change();
            $table->unsignedInteger('cant_prod')->nullable()->change();
            $table->unsignedInteger('cod_prod')->nullable()->change();
            $table->decimal('monto_cobrar', 8, 2)->nullable()->change();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('producto_rutas_tbl', function (Blueprint $table) {
            $table->string('nombre_prod')->change();
            $table->integer('cant_prod')->change();
            $table->string('cod_prod')->change();
            $table->decimal('monto_cobrar', 8, 2)->change();
        });
    }

};
