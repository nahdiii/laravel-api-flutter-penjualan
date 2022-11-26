<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Detailtransaksi;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function simpanDataTransaksi(Request $request)
    {
        $date= Carbon::now();
        // return $date->format('Y-m-d');
        $transaksi = new Transaksi();
        $transaksi->kodetransaksi = time() . rand(100, 999);
        $transaksi->tgl = $date->format('Y-m-d');
        $transaksi->total = $request->total;
        $transaksi->dibayar = 0;
        $transaksi->save();




        foreach ($request->trans as $item) {

            $cari = Barang::findOrFail(json_decode($item['id']));
            $data = [
                'stok' => $cari->stok - json_decode($item['qty']),
            ];

            $cari->update($data);

            $detail = new Detailtransaksi();
            $detail->transaksi_id = $transaksi->id;
            $detail->tgl = $date->format('Y-m-d');
            $detail->barang_id = json_decode($item['id']);
            $detail->namabarang = $item['namabarang'];
            $detail->hargabeli = json_decode($item['hargabeli']);
            $detail->hargajual = json_decode($item['hargajual']);
            $detail->qty = json_decode($item['qty']);
            $detail->subtotal = json_decode($item['hargajual']) * json_decode($item['qty']);

            $detail->save();
        }
        // $string = $request->trans;
        // $result = json_decode($string);
        // return response()->json([
        //     'from laravel' =>$request->trans["id"],
        // ]);




    }

    public function rekap($tglAwal, $tglAkhir)
    {
        return Detailtransaksi::whereBetween('tgl', [$tglAwal, $tglAkhir])->get();
    }
}
