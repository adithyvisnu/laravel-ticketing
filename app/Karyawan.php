<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    public $primaryKey = 'nik';
    public $timestamps = false;
    public function jabatan()
    {
        return $this->hasOne('App\Jabatan', 'kode_jabatan', 'kode_jabatan');
    }
}
