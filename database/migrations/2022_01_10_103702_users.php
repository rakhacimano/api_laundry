<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_outlet');
            $table->string('nama');
            $table->string('username');
            $table->string('password');
            $table->enum('role', ['admin', 'kasir', 'owner']);
            $table->timestamps();

            $table->foreign('id_outlet')->references('id_outlet')->on('outlet')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
