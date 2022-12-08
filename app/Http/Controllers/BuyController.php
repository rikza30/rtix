<?php

namespace App\Http\Controllers;

use App\Models\Konser;
use App\Models\Buy;
use App\Models\bayar;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    public function store(request $request)
    {
        $table = Buy::create([
            "Nama" => $request->Nama,
            "NoHp" => $request->NoHp,
            "Email" => $request->Email,
            "Tittle" => $request->Tittle,
            "Artist" => $request->Artist,
            "Class" => $request->Class,
            "Jumlah" => $request->Jumlah
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'Berhasil',
            'data' => $table
        ], 201);
    }

    public function bayar()
    {
        $table = Bayar::create([
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
}
