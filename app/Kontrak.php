<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    protected $table = 'kontrak';
    public $primaryKey = 'kode_kontrak';
    public $timestamps = false;
}
