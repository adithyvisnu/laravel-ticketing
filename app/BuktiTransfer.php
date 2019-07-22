<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuktiTransfer extends Model
{
    protected $table = 'bukti_transfer';
    public $primaryKey = 'kode_transfer';
    public $timestamps = false;
}
