<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = "barang";
    protected $primarykey = "id";
    protected $fillable = [
        'id',
        'namabarang',
        'jenis_id',
        'hargabeli',
        'hargajual',
        'stok',
        'gambar',

    ];
}
