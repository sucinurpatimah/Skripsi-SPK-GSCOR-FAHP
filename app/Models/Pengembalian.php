<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    protected $fillable = [
        'nama_agen',
        'alamat',
        'produk_dikembalikan',
    ];
}
