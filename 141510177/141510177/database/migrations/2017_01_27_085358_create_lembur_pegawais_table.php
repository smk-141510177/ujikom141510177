<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLemburPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lembur_pegawais', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kode_lembur_id');
            $table->foreign('kode_lembur_id')->references('id')->on('kategori_lemburs')->onDelete('CASCADE');
            $table->unsignedInteger('pegawai_id');
            $table->foreign('pegawai_id')->references('id')->on('pegawais')->onDelete('CASCADE');
            $table->Integer('Jumlah_jam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lembur_pegawais');
    }
}
