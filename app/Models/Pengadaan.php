<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    protected $fillable = [
        'bahan_baku',
        'pewarna',
        'supplier_iso',
    ];
}
