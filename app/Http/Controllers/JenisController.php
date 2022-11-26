<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index()
    {
        return Jenis::all();
    }

    public function store(Request $request)
    {
        return Jenis::create([
            'namajenis' => $request['namajenis'],
        ]);
    }
}
