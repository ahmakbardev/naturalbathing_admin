<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketSpesial extends Model
{
    use HasFactory;

    protected $table = 'paket_spesial';

    protected $fillable = ['nama_paket', 'harga', 'deskripsi', 'gambar', 'review'];

    protected $casts = [
        'gambar' => 'array',
        'review' => 'array',
    ];
}
