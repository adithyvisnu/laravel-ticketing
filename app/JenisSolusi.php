<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisSolusi extends Model
{
    protected $table = 'jenis_solusi';
    public $primaryKey = 'kode_jenis_solusi';
    public $timestamps = false;
}
