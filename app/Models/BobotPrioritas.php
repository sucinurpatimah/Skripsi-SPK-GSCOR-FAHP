<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BobotPrioritas extends Model
{
    protected $table = 'bobot_prioritas';

    protected $fillable = [
        'indikator_id',
        'bobot_prioritas',
    ];

    public function kpi()
    {
        return $this->belongsTo(KPI::class, 'kpi_id');
    }
}
