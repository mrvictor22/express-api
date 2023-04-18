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
            $table->decimal('monto_cobrar', 8, 2)->nullable()->after('cod_prod');
        });
    }

    public function down()
    {
        Schema::table('producto_rutas_tbl', function (Blueprint $table) {
            $table->dropColumn('monto_cobrar');
        });
    }


};
