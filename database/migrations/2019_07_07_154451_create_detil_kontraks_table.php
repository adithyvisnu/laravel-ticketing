<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetilKontraksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detil_kontrak', function (Blueprint $table) {
            $table->string('kode_service_id', 19);
            $table->primary('kode_service_id');
            $table->unsignedSmallInteger('kode_layanan');
            $table->unsignedMediumInteger('kode_kontrak');
            $table->foreign('kode_layanan')->references('kode_layanan')->on('layanan')->onDelete('cascade');
            $table->foreign('kode_kontrak')->references('kode_kontrak')->on('kontrak')->onDelete('cascade');
            $table->char('alamat', 255)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detil_kontrak');
    }
}
