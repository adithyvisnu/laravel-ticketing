<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetilKontrak extends Model
{
    protected $table = 'detil_kontrak';
    public $primaryKey = 'kode_service_id';
    public $timestamps = false;
}
