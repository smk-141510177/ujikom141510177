<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori_lembur extends Model
{
    protected $table='kategori_lemburs';
    protected $fillable=['id','kode_l','jabatan_id','golongan_id','besar_uang'];
    public function golongan(){
    	return $this->belongsTo('App\Golongan','golongan_id');
    }
    public function jabatan(){
    	return $this->belongsTo('App\Jabatan','jabatan_id');
    }
    public function lembur_pegawai(){
    	return $this->hasMany('App\Lembur_pegawai','kode_lembur_id');
    }
}
