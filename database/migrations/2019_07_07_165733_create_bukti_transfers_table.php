<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuktiTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukti_transfer', function (Blueprint $table) {
            $table->increments('kode_transfer');
            $table->char('tanggal_transfer', 24)->default('');
            $table->char('bukti_transfer', 255)->default('');
            $table->decimal('jumlah_transfer', 9);
            $table->char('periode_layanan', 6)->default('');
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
        Schema::dropIfExists('bukti_transfer');
    }
}
