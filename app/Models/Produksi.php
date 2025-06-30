<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    protected $fillable = [
        'listrik',
        'air',
        'hasil_produksi',
        'sampah',
    ];
}
