<?php

namespace App\Http\Controllers;

use App\Models\Tesgambar;
use Illuminate\Support\Facades\File;


use Illuminate\Http\Request;

class TesgambarController extends Controller
{
    public function store(Request $request)
    {
        $image = new Tesgambar();
        $image->name = $request->name;

        if ($request->hasFile('image')) {
            $files = $request->file('image');
            $original_ekstensi = strtolower(trim($files->getClientOriginalExtension()));
            // $fileName = $files->getClientOriginalName();
            $fileName = time() . rand(100, 999) . "." . $original_ekstensi;
            $image->gambar = $fileName;
            $files->move(public_path().'/gambar-flutter/', $fileName);
        }
        $image->save();
        // return new ImageResource($image);
    }
}
