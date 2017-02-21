<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table='jabatans';
    protected $fillable=['id','kode_j','nama_j','besar_uang'];
    public function kategori_lembur(){
    	return $this->hasMany('App\Kategori_lembur','jabatan_id');
    }
    public function tunjangan(){
    	return $this->hasMany('App\Tunjangan','jabatan_id');
    }
    public function pegawai(){
    	return $this->hasMany('App\Pegawai','jabatan_id');
    }
}
