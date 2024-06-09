<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketBiasa extends Model
{
    use HasFactory;

    protected $table = 'paket_biasa';

    protected $fillable = ['nama_paket', 'harga', 'deskripsi', 'gambar', 'review'];

    protected $casts = [
        'gambar' => 'array',
        'review' => 'array',
    ];
}
