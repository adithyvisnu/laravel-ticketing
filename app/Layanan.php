<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanan';
    public $primaryKey = 'kode_layanan';
    public $timestamps = false;
}
