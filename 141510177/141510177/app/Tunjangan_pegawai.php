<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tunjangan_pegawai extends Model
{
    protected $table='tunjangan_pegawais';
    protected $fillable=['id','kode_tunjangan_id','pegawai_id '];

    public function tunjangan(){
    	return $this->belongsTo('App\Tunjangan','kode_tunjangan_id');
    }
    public function pegawai(){
    	return $this->belongsTo('App\Pegawai','pegawai_id');
    }
    public function penggajian(){
    	return $this->hasMany('App\Penggajian','tunjangan_pegawai_id');
    }
}
