<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestitusisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restitusi', function (Blueprint $table) {
            $table->decimal('kode_restitusi', 26)->nullable(false);
            $table->primary('kode_restitusi');
            $table->char('tanggal_waktu_terbit', 24)->default();
            $table->integer('jumlah')->unsigned()->nullable(false);
            $table->bigInteger('kode_tiket')->nullable(false);
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
        Schema::dropIfExists('restitusi');
    }
}
