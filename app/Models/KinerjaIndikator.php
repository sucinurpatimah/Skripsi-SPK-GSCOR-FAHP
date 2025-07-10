<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KinerjaIndikator extends Model
{
    use HasFactory;

    protected $table = 'kinerja_indikator';

    protected $fillable = [
        'kpi_id',
        'nilai_kinerja',
        'snorm_de_boer',
    ];

    //Relasi ke tabel KPI
    public function kpi()
    {
        return $this->belongsTo(KPI::class, 'kpi_id');
    }
}
