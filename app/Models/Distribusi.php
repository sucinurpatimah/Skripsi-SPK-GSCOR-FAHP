<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distribusi extends Model
{
    protected $fillable = [
        'nama_agen',
        'alamat',
        'produk_dikirim',
    ];
}
