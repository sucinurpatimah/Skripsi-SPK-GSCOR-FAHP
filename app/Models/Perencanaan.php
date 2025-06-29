<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perencanaan extends Model
{
    protected $fillable = [
        'tahun',
        'bulan',
        'permintaan',
        'jumlah_pekerja',
    ];
}
