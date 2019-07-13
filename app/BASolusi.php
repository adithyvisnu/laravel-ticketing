<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BASolusi extends Model
{
    protected $table = 'ba_solusi';
    public $primaryKey = 'kode_ba_solusi';
    public $timestamps = false;
    public function tiket()
    {
        return $this->belongsTo('App\Tiket', 'kode_tiket', 'kode_tiket');
    }
}
