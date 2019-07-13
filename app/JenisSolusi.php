<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisSolusi extends Model
{
    protected $table = 'jenis_solusi';
    public $primaryKey = 'kode_jenis_solusi';
    public $timestamps = false;
    public function jenis_solusi(){
            return $this->belongsTo('App\Tiket', 'kode_jenis_keluhan', 'kode_jenis_keluhan');
    }
    public function jenis_keluhan(){
            return $this->hasOne('App\JenisKeluhan', 'kode_jenis_keluhan', 'kode_jenis_keluhan');
    }
}
