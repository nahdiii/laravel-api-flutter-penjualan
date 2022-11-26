<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        return Barang::all();
    }

    public function simpanDataBrang(Request $request)
    {
        // return Barang::create([
        //     'namabarang' => $request['namabarang'],
        //     'jenis_id' => $request['jenis_id'],
        //     'hargabeli' => $request['hargabeli'],
        //     'hargajual' => $request['hargajual'],
        //     'stok' => $request['stok'],
        // ]);

        $barang = new Barang;


        if ($request->hasFile('image')) {
            $files = $request->file('image');
            $original_ekstensi = strtolower(trim($files->getClientOriginalExtension()));
            // $fileName = $files->getClientOriginalName();
            $fileName = time() . rand(100, 999) . "." . $original_ekstensi;

            $barang->namabarang = $request->namabarang;
            $barang->jenis_id = $request->jenis_id;
            $barang->hargabeli = $request->hargabeli;
            $barang->hargajual = $request->hargajual;
            $barang->stok = $request->stok;
            $barang->gambar = $fileName;
            $files->move(public_path() . '/gambar-barang/', $fileName);
        }

        $barang->save();
    }

    public function hapusBarang($id)
    {
        $brg = Barang::findOrFail($id);
        $brg->delete();
    }

    public function ubahDataBarang(Request $request, $id)
    {
        $brg = Barang::findOrFail($id);
        $data = [
            'namabarang' => $request['namabarang'],
            'jenis_id' => $request['jenis_id'],
            'hargabeli' => $request['hargabeli'],
            'hargajual' => $request['hargajual'],
            'stok' => $request['stok'],
        ];

        $brg->update($data);
    }
}
