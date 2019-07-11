<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    public $primaryKey = 'kode_pelanggan';
    public $timestamps = false;
    public function kontrak(){
        return $this->hasMany('App\Kontrak', 'kode_kontrak', 'kode_kontrak');
    }
}
