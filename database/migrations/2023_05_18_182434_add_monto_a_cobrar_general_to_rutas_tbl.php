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
        Schema::table('rutas_tbl', function (Blueprint $table) {
            Schema::table('rutas_tbl', function (Blueprint $table) {
                $table->decimal('monto_a_cobrar_general', 10, 2)->after('sucursal')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rutas_tbl', function (Blueprint $table) {
            $table->dropColumn('monto_a_cobrar_general');
        });
    }
};
