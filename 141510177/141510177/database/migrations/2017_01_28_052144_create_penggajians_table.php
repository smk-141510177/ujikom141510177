<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenggajiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penggajians', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tunjangan_pegawai_id');
            $table->foreign('tunjangan_pegawai_id')->references('id')->on('tunjangan_pegawais')->onDelete('CASCADE');
            $table->Integer('jumlah_jam_lembur');
            $table->Integer('jumlah_uang_lembur');
            $table->Integer('gaji_pokok');
            $table->date('tanggal_pengambilan');
            $table->boolean('status_pengambilan')->default(0);
            $table->string('petugas_penerima');
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
        Schema::dropIfExists('penggajians');
    }
}
