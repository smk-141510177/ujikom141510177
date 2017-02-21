<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $table='golongans';
    protected $fillable=['id','kode_g','nama_g','besar_uang'];

    public function kategori_lembur(){
    	return $this->hasMany('App\Kategori_lembur','golongan_id');
    }
    public function Tunjagan(){
    	return $this->hasMany('App\Tunjangan','golongan_id');
    }
    public function pegawai(){
    	return $this->hasMany('App\Pegawai','golongan_id');
    }
}
