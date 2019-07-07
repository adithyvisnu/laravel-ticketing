<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->increment('kode_pelanggan');
            $table->char('nama_pelanggan', 50)->default('');
            $table->char('email_pelanggan', 50)->default('');
            $table->char('pawssword', 255)->default('');
            $table->char('npwp', 15)->default('');
            $table->char('no_telepon', 13)->default('');
            $table->integer('nik');
            $table->foreign('nik')->references('nik')->on('karyawan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelanggans');
    }
}
