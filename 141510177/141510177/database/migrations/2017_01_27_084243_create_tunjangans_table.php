<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTunjangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tunjangans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_t')->unique();

            $table->unsignedInteger('jabatan_id');
            $table->foreign('jabatan_id')->references('id')->on('jabatans')->onDelete('CASCADE');
            $table->unsignedInteger('golongan_id');
            $table->foreign('golongan_id')->references('id')->on('golongans')->onDelete('CASCADE');
            
            $table->string('status');
            $table->Integer('jumlah_anak');
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
        Schema::dropIfExists('tunjangans');
    }
}
