<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaTable extends Migration
{
    public function up()
    {
        Schema::create('categoria', function (Blueprint $table) {
            $table->increments('idCategoria');
            $table->integer('idCategoriaPadre')->default(0);
            $table->string('nombre');
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('categoria');
    }
}
