<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPerhitungan extends Model
{
    protected $table = 'riwayat_perhitungan';
    protected $fillable = ['judul', 'hasil_per_indikator', 'total_nilai_akhir', 'rekomendasi'];
    protected $casts = [
        'hasil_per_indikator' => 'array',
    ];
}
