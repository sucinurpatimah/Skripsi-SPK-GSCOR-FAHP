<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GSCOR extends Model
{
    protected $table = 'gscor';
    protected $fillable = [
        'variabel',
        'atribut',
        'indikator',
        'keterangan',
        'rekomendasi_bawaan',
    ];
}
