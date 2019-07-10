<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';
    public $primaryKey = 'kode_jabatan';
    public $timestamps = false;
}
