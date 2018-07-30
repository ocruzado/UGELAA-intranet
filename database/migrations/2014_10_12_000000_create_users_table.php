<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('idUsuario');
//            $table->integer('idPersona')->default(0);

//            $table->string('usuario')->unique();
//            $table->string('clave');

            $table->string('email')->unique();
            $table->string('password');
            $table->integer('idArea')->default(0);
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('dni')->unique();
            $table->date('fecha_nacimiento');
            $table->string('telefono');
            $table->string('correo')->unique();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
