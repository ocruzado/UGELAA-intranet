<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadoTable extends Migration
{
    public function up()
    {
        Schema::create('estado', function (Blueprint $table) {
            $table->increments('idEstado');
            $table->string('codigo');
            $table->integer('id');
            $table->string('value');
            $table->string('descripcion');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estado');
    }
}
