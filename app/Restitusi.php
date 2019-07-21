<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restitusi extends Model
{
    protected $table = 'restitusi';
    public $primaryKey = 'kode_restitusi';
    public $timestamps = false;
    public function tiket()
    {
        return $this->belongsTo('App\Tiket', 'kode_tiket', 'kode_tiket');
    }
}
