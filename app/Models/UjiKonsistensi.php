<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UjiKonsistensi extends Model
{
    protected $table = 'uji_konsistensi';

    protected $fillable = [
        'lambda_max',
        'ci',
        'ri',
        'cr',
        'status'
    ];
}
