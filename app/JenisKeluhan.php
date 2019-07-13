<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisKeluhan extends Model
{
    protected $table = 'jenis_keluhan';
    public $primaryKey = 'kode_jenis_keluhan';
    public $timestamps = false;
    public function jenis_keluhan(){
            return $this->belongsTo('App\Tiket', 'kode_jenis_keluhan', 'kode_jenis_keluhan');
    }
}
