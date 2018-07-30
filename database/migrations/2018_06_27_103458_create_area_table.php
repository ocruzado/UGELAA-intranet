<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaTable extends Migration
{
    public function up()
    {
        Schema::create('area', function (Blueprint $table) {
            $table->increments('idArea');
            $table->integer('idAreaPadre')->default(0);
            $table->string('nombre');
            $table->string('siglas')->unique();
            $table->string('descripcion');
            $table->timestamps();
        });

//        Schema::create('categoria', function (Blueprint $table) {
//            $table->increments('idCategoria');
//            $table->integer('idCategoriaPadre')->default(0);
//            $table->string('nombre');
//            $table->timestamps();
//        });

//        Schema::create('persona', function (Blueprint $table) {
//            $table->increments('idPersona');
//            $table->string('nombre');
//            $table->string('apellido_paterno');
//            $table->string('apellido_materno');
//            $table->string('dni')->unique();
//            $table->string('fecha_nacimiento');
//            $table->string('telefono');
//            $table->string('correo');
//            $table->timestamps();
//        });

//        Schema::create('ticket', function (Blueprint $table) {
//            $table->increments('idTicket');
//            $table->string('codigo')->unique();
//            $table->integer('idArea_solicita');
//            $table->integer('idPersona_solicita');
//            $table->integer('idCategoria');
//            $table->string('descripcion');
//            $table->integer('idPersona_designado');
//            $table->string('fecha_designacion');
//            $table->integer('estado');
//            $table->timestamps();
//        });
    }

    public function down()
    {
        Schema::dropIfExists('area');
//        Schema::dropIfExists('categoria');
//        Schema::dropIfExists('persona');
//        Schema::dropIfExists('ticket');
    }
}
