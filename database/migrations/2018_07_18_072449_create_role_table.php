<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTable extends Migration
{
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
            $table->increments('idRole');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('role');
    }
}
