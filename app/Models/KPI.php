<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KPI extends Model
{
    protected $fillable = [
        'scor_id',
        'gscor_id',
        'variabel',
        'atribut',
        'indikator',
        'keterangan',
    ];
}
