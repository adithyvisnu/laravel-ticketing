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
            $table->integer('kode_service_id')->unsigned()->nullable(false);
            $table->primary('kode_service_id');
            $table->integer('kode_layanan')->unsigned();
            $table->char('kode_kontrak', 22)->nullable(false);
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
        Schema::dropIfExists('detil_kontraks');
    }
}
