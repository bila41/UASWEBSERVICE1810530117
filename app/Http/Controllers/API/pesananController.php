<?php

namespace App\Http\Controllers\API;
use App\Barang;
use App\Pesanan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
class pesananController extends Controller
{
    
    public function index()
    {
        return pesanan::all();
    }

    public function show($id)
    {
        
        $pesanan = Pesanan::where('id', $id)->first();

        if (empty($pesanan)) {
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
    public function update(Request $request, $pesanan)
    {
        $pesanan= Pesanan::where('id',$pesanan)->first();
        if (!empty($pesanan)) {
            $validasi = Validator::make($request->all(), [
                "Nomor_Resi" => "required|string"
            ]);
            if ($validasi->passes()){
                $pesanan ->update($request->all());
                return response()->json([
                    'pesan' => 'Data Berhasil diUpdate',
                    'data' => $pesanan
                ], 200);
            }
            return response()->json([
                'pesan' => 'Data Gagal disimpan',
                'data' => $validasi->errors()->all()
            ], 400);    
        }
    }


}