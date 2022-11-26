<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tesgambar extends Model
{
    protected $table = "tesgambar";
    protected $primarykey = "id";
    protected $fillable = [
        'name',
        'gambar',
    ];
}
