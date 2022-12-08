<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buy;
use App\Models\send;

class AdminController extends Controller
{
    public function show()
    {
        $buy = buy::get();

        if (count($buy) > 0) {
            return response()->json([
                'code' => 200,
                'data Pesanan' => 'Daftar Pesanan',
                'data' => $buy
            ], 200);
        }

        return response()->json([
            'code' => 404,
            'data' => 'Daftar Pesanan Belum Tersedia'
        ], 404);
        
    }

    public function byartist($artist)
    {
        $buy = buy::where('artist', $artist)->first();
        if ($buy) {
            return response()->json([
                'status' => 200,
                'data' => $buy
            ], 200);

        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Pesanan Konser ' . $artist . '  Tidak Ditemukan'
            ], 404);
        }
    }

    public function send()
    {
        $table = send::create([
            "Nama" => $request->Nama,
            "KodePembayaran" => $request->KodePembayaran,
            "Nominal" => $request->Nominal,
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'Berhasil',
            'data' => $table
        ], 201);
    }

    public function bayar()
    {
        $bayar = bayar::get();
        if ($bayar) {
            return response()->json([
                'status' => 200,
                'data' => $bayar

            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Pemabayaran Konser Tidak Ditemukan'
            ], 404);
        }
    }
}
