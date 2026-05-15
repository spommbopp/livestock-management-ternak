<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livestock extends Model
{
    // Tambahkan ini agar kolom bisa diisi lewat form
    protected $fillable = ['name', 'type', 'weight'];
}