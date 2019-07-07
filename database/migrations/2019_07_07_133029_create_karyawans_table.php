<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->integer('nik');
            $table->char('nama_karyawan', 50)->default('');
            $table->char('email_karyawan', 50)->default('');
            $table->char('password', 255)->default('');
            $table->char('no_telepon', 13)->default('');
            $table->integer('kode_jabatan')->unsigned();
            $table->foreign('kode_jabatan')->references('kode_jabatan')->on('jabatan')->onDelete('cascade');
            $table->primary('nik');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawans');
    }
}
