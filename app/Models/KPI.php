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

    //Relasi dengan tabel bobot_prioritas
    public function bobotPrioritas()
    {
        return $this->hasOne(BobotPrioritas::class, 'indikator_id');
    }

    //Relasi dengan tabel kinerja_indikator
    public function kinerjaIndikator()
    {
        return $this->hasOne(KinerjaIndikator::class, 'kpi_id');
    }

    //Relasi dengan tabel SCOR
    public function scor()
    {
        return $this->hasOne(SCOR::class, 'indikator', 'indikator');
    }

    //Relasi dengan tabel GSCOR
    public function gscor()
    {
        return $this->hasOne(GSCOR::class, 'indikator', 'indikator');
    }
}
