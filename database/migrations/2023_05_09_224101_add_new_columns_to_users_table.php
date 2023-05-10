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
        Schema::table('users', function (Blueprint $table) {
            $table->string('lastname')->after('name');
            $table->string('Empresa')->nullable()->after('email');
            $table->string('phone_number')->nullable()->after('Empresa');
            $table->string('Ciudad')->nullable()->after('phone_number');
            $table->text('Direccion')->nullable()->after('Ciudad');
            $table->text('descripcion')->nullable()->after('Direccion');

            $table->index('name');
            $table->index('email');
            $table->index('password');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['lastname', 'Empresa', 'phone_number', 'Ciudad', 'Direccion', 'descripcion']);
            $table->dropIndex(['name', 'email', 'password']);
        });
    }
};
