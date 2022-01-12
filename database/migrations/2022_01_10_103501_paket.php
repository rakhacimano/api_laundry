<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Paket extends Migration
{

    public function up()
    {
        Schema::create('paket', function (Blueprint $table) {
            $table->bigIncrements('id_paket');
            $table->enum('jenis_paket', ['kiloan', 'bed_cover', 'kaos']);
            $table->integer('harga');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paket');
    }
}
