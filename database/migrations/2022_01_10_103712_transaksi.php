<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaksi extends Migration
{

    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id_transaksi');
            $table->unsignedBigInteger('id_member');
            $table->unsignedBigInteger('id_user');
            $table->date('tanggal');
            $table->date('tanggal_bayar');
            $table->enum('status_cucian', ['baru', 'proses', 'selesai', 'diambil']);
            $table->enum('status_pembayaran', ['dibayar', 'belum_dibayar']);
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('id_member')->references('id_member')->on('member')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
