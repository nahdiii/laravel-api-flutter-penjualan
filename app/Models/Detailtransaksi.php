<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailtransaksi extends Model
{
    protected $table = "detailtransaksi";
    protected $primarykey = "id";
    protected $fillable = [
        'id',
        'transaksi_id',
        'tgl',
        'barang_id',
        'namabarang',
        'hargabeli',
        'hargajual',
        'qty',
        'subtotal',
    ];
}
