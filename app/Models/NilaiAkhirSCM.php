<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiAkhirSCM extends Model
{
    protected $table = 'nilai_akhir_scm';

    protected $fillable = [
        'indikator_id',
        'bobot_prioritas',
        'snorm',
        'nilai_akhir',
        'rekomendasi'
    ];

    public function kpi()
    {
        return $this->belongsTo(KPI::class, 'indikator_id', 'id');
    }
}
