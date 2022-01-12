<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Member extends Migration
{

    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->bigIncrements('id_member');
            $table->string('nama');
            $table->string('alamat');
            $table->enum('jenis_kelamin', ['l', 'p']);
            $table->string('telp');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('member');
    }
}
