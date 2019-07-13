<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BASelesai extends Model
{
    protected $table = 'ba_selesai';
    public $primaryKey = 'kode_ba_selesai';
    public $timestamps = false;
    public function tiket()
    {
        return $this->belongsTo('App\Tiket', 'kode_tiket', 'kode_tiket');
    }
}
