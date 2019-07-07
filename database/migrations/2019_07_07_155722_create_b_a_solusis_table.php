<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBASolusisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ba_solusi', function (Blueprint $table) {
            $table->increments('kode_ba_solusi');
            $table->bigInteger('kode_tiket')->nullable(false);
            $table->char('tanggal_ba_solusi', 24)->default('');
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
        Schema::dropIfExists('ba_solusi');
    }
}
