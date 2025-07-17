<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SCOR extends Model
{
    protected $fillable = [
        'variabel',
        'atribut',
        'indikator',
        'keterangan',
        'rekomendasi_bawaan'
    ];

    protected $table = 'scor';
}
