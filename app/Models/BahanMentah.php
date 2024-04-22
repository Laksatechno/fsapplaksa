<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanMentah extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_barang',
        'stok',
    ];
}
