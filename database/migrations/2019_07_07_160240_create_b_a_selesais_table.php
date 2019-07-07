<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBASelesaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ba_selesai', function (Blueprint $table) {
            $table->increments('kode_ba_selesai');
            $table->bigInteger('kode_tiket')->nullable(false);
            $table->char('tanggal_ba_selesai',24);
            $table->char('selesai_oleh', 50);
            $table->char('bukti_ba_selesai', 255)->default('');
            $table->foreign('kode_tiket')->references('kode_tiket')->on('tiket')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ba_selesai');
    }
}
