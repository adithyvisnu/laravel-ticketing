<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetilKontrak extends Model
{
    protected $table = 'detil_kontrak';
    public $primaryKey = 'kode_service_id';
    public $timestamps = false;
    public $incrementing = false;
    public function kontrak(){
        return $this->belongsTo('App\Kontrak', 'kode_kontrak', 'kode_kontrak');
    }
    public function layanan(){
        return $this->hasOne('App\Layanan', 'kode_layanan', 'kode_layanan');
    }
    public function tiket(){
        return $this->hasMany('App\Tiket', 'kode_service_id', 'kode_service_id');
    }
}
