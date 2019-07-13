<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanan';
    public $primaryKey = 'kode_layanan';
    public $timestamps = false;
    public function detil_kontrak()
    {
        return $this->belongsTo('App\DetilKontrak', 'kode_layanan', 'kode_layanan');
    }
}
