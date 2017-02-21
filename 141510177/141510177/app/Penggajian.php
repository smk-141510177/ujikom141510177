<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    protected $table='penggajians';
    protected $fillable=['id','tunjangan_pegawai_id','jumlah_jam_lembur','jumlah_uang_lembur','gaji_pokok','tanggal_pengambilan','petugas_penerima','status_penerima'];

    public function tunjangan_pegawai(){
    	return $this->belongsTo('App\Tunjangan_pegawai','tunjangan_pegawai_id');
    }
}
