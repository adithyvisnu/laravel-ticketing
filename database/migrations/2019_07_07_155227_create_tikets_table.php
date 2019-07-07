<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiket', function (Blueprint $table) {
            $table->bigInteger('kode_tiket')->nullable(false);
            $table->primary('kode_tiket');
            $table->char('tanggal_waktu_buat', 24);
            $table->char('tanggal_waktu_selesai', 24);
            $table->char('keterangan_keluhan', 255);
            $table->integer('kode_pelanggan')->unsigned();
            $table->integer('kode_jenis_keluhan')->unsigned();
            $table->foreign('kode_pelanggan')->references('kode_pelanggan')->on('pelanggan')->onDelete('cascade');
            $table->foreign('kode_jenis_keluhan')->references('kode_jenis_keluhan')->on('jenis_keluhan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiket');
    }
}
