<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapSection extends Model
{
    use HasFactory;
    // Menentukan atribut yang dapat diisi melalui mass assignment
    protected $fillable = ['name', 'google_map_url'];
}
