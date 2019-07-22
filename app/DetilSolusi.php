<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetilSolusi extends Model
{
    protected $table = 'detil_solusi';
    public $timestamps = false;
    public $incrementing = false;
    public function detil_solusi()
    {
        return $this->belongsTo('App\BASolusi', 'kode_ba_solusi', 'kode_ba_solusi');
    }
}
