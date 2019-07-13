<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetilSolusisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detil_solusi', function (Blueprint $table) {
            $table->integer('kode_ba_solusi')->unsigned();
            $table->unsignedMediumInteger('kode_jenis_solusi');
            $table->char('keterangan', 255)->default('');
            $table->foreign('kode_ba_solusi')->references('kode_ba_solusi')->on('ba_solusi')->onDelete('cascade');
            $table->foreign('kode_jenis_solusi')->references('kode_jenis_solusi')->on('jenis_solusi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detil_solusi');
    }
}
