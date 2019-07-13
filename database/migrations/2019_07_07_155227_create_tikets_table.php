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
            $table->increments('kode_tiket');
            $table->char('tanggal_waktu_buat', 24);
            $table->char('tanggal_waktu_selesai', 24)->nullable();
            $table->char('keterangan_keluhan', 255);
            $table->unsignedMediumInteger('kode_pelanggan');
            $table->unsignedMediumInteger('nik');
            $table->unsignedTinyInteger('kode_jenis_keluhan');
            $table->string('kode_service_id', 19);
            $table->foreign('nik')->references('nik')->on('karyawan')->onDelete('cascade');
            $table->foreign('kode_pelanggan')->references('kode_pelanggan')->on('pelanggan')->onDelete('cascade');
            $table->foreign('kode_jenis_keluhan')->references('kode_jenis_keluhan')->on('jenis_keluhan')->onDelete('cascade');
            $table->foreign('kode_service_id')->references('kode_service_id')->on('detil_kontrak')->onDelete('cascade');
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
