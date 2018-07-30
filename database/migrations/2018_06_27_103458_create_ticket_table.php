<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketTable extends Migration
{
    public function up()
    {

        Schema::create('ticket', function (Blueprint $table) {
            $table->increments('idTicket');
            $table->string('codigo')->unique();

            $table->integer('idUsuario');

            $table->integer('idArea');
            $table->integer('idCategoria');
            $table->string('descripcion');
            $table->string('image')->nullable();
//            $table->date('fecha_registro');
            $table->integer('estado');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ticket');
    }
}
