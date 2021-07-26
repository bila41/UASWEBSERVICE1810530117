<?php

namespace App\Http\Controllers\API;
use App\Barang;
use App\Pesanan;
use App\pesanan_detail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
class detailpesananController extends Controller
{
    
    public function index()
    {
        return pesanan_detail::all();
    }
    public function show($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        $pesanan_detail = pesanan_detail::where('pesanan_id', $pesanan->id)->get(); 

        if (empty($pesanan_detail)) {
            return response()->json([
                'pesan' => 'Data Tidak Ditemukan',
                'data' => ''
            ], 404);
        }

        return response()->json([
            'pesan' => 'Data Berhasil ditemukan',
            'data' => $pesanan_detail 
        ], 200);
    }

}