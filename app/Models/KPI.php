<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KPI extends Model
{
    protected $table = 'kpi';
    protected $fillable = [
        'scor_id',
        'gscor_id',
        'variabel',
        'atribut',
        'indikator',
        'keterangan',
        'kategori',
        'skor',
    ];
}
