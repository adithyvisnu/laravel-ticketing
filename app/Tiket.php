<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = 'tiket';
    public $primaryKey = 'kode_tiket';
    public $timestamps = false;
    protected $fillable = ['nik'];
    public function detil_kontrak(){
        return $this->hasOne('App\DetilKontrak', 'kode_service_id', 'kode_service_id');
    }
    public function jenis_keluhan(){
        return $this->hasOne('App\JenisKeluhan', 'kode_jenis_keluhan', 'kode_jenis_keluhan');
    }
    public function jenis_solusi(){
        return $this->hasMany('App\JenisSolusi', 'kode_jenis_keluhan', 'kode_jenis_keluhan');
    }
    public function ba_solusi(){
        return $this->hasOne('App\BASolusi', 'kode_tiket', 'kode_tiket');
    }
    public function ba_selesai(){
        return $this->hasOne('App\BASelesai', 'kode_tiket', 'kode_tiket');
    }
    public function restitusi(){
        return $this->hasOne('App\Restitusi', 'kode_tiket', 'kode_tiket');
    }
}
