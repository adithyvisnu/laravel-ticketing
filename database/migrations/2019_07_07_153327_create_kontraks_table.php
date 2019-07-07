<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKontraksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontrak', function (Blueprint $table) {
            $table->char('kode_kontrak', 22)->nullable(false);
            $table->char('judul_kontrak', 150)->default('');
            $table->char('tanggal_mulai_kontrak', 24)->default('');
            $table->char('tanggal_selesai_kontrak', 24)->default('');
            $table->char('file_kontrak', 255)->default('');
            $table->integer('level_garansi_layanan', 2);
            $table->integer('kode_pelanggan')->unsigned();
            $table->foreign('kode_pelanggan')->references('kode_pelanggan')->on('pelanggan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kontraks');
    }
}
