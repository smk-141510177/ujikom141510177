<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategoriLembursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_lemburs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_l')->unique();
            $table->unsignedInteger('jabatan_id');
            $table->foreign('jabatan_id')->references('id')->on('jabatans')->onDelete('CASCADE');
            $table->unsignedInteger('golongan_id');
            $table->foreign('golongan_id')->references('id')->on('golongans')->onDelete('CASCADE');
            $table->Integer('besar_uang');
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
        Schema::dropIfExists('kategori_lemburs');
    }
}
