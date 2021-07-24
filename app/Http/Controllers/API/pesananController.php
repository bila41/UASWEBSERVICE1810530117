<?php

namespace App\Http\Controllers\API;
use App\Barang;
use App\Pesanan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
class pesananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return pesanan::all();
    }

    public function show($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();

        if (empty($barang)) {
            return response()->json([
                'pesan' => 'Data Tidak Ditemukan',
                'data' => ''
            ], 404);
        }

        return response()->json([
            'pesan' => 'Data Berhasil ditemukan',
            'data' => $pesanan
        ], 200);
    }



}