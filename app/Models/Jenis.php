<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = "jenis";
    protected $primarykey = "id";
    protected $fillable = [
        'id',
        'namajenis',
    ];
}
