<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    protected $table = 'kontrak';
    public $primaryKey = 'kode_kontrak';
    public $timestamps = false;
    public function pelanggan() {
        return $this->belongsTo('App\Pelanggan', 'kode_pelanggan', 'kode_pelanggan');
    }
    public function detil_kontrak(){
        return $this->hasMany('App\DetilKontrak', 'kode_kontrak', 'kode_kontrak');
    }
}
