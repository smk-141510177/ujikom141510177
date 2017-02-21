<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tunjangan extends Model
{
     protected $table='tunjangans';
    protected $fillable=['id','kode_t','jabatan_id','golongan_id','status','jumlah_anak','besar_uang'];
    public function golongan(){
    	return $this->belongsTo('App\Golongan','golongan_id');
    }
    public function jabatan(){
    	return $this->belongsTo('App\Jabatan','jabatan_id');
    }
    public function tunjangan_pegawai(){
    	return $this->belongsTo('App\Tunjangan_pegawai','kode_tunjangan_id');
    }
}
