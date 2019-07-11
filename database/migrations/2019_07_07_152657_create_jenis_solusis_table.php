<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisSolusisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_solusi', function (Blueprint $table) {
            $table->unsignedMediumInteger('kode_jenis_solusi')->autoIncrement();
            $table->char('jenis_solusi', 40)->default('');
            $table->unsignedTinyInteger('kode_jenis_keluhan');
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
        Schema::dropIfExists('jenis_solusi');
    }
}
