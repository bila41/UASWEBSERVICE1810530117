<?php

namespace App\Http\Controllers\API;
use App\Barang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
class barangController extends Controller
{
    
    public function index()
    {
        return Barang::all();
    }

    public function show($barang)
    {
        $barang = Barang::where('id', $barang)->first();
        return response()->json([
            'pesan' => 'Data Berhasil ditemukan',
            'data' => $barang
        ], 200);

        if (empty($barang)) {
            return response()->json([
                'pesan' => 'Data Tidak Ditemukan',
                'data' => ''
            ], 404);
        }

        return response()->json([
            'pesan' => 'Data Berhasil ditemukan',
            'data' => $barang
        ], 200);
    }

    public function delete($barang)
    {
        $barang = Barang::where('id', $barang)->first();

        if (empty($barang)) {
            return response()->json([
                'pesan' => 'Data Tidak Ditemukan',
                'data' => ''
            ], 404);
        }
        $barang->delete();
        return response()->json([
            'pesan' => 'Data Berhasil Dihapus',
            'data' => $barang
        ], 200);
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            "id" => "required",
            "nama_barang" => "required",
            "stok" => "required",
            "harga" => "required",
            "gambar" => "required",
            "keterangan" => "required"
        ]);

        if ($validasi->passes()){
            $barang = Barang::create($request->all());
            return response()->json([
                'pesan' => 'Data Berhasil ditambahkan',
                'data' => $barang
            ], 200);
        }
        return response()->json([
            'pesan' => 'Data Gagal disimpan',
            'data' => $validasi->errors()->all()
        ], 400); 
    }

    public function update(Request $request, $barang)
    {
        $barang= Barang::where('id',$barang)->first();
        if (!empty($barang)) {
            $validasi = Validator::make($request->all(), [
                "nama_barang" => "required",
                "stok" => "required",
                "harga" => "required",
                "gambar" => "required",
                "keterangan" => "required"
            ]);
            if ($validasi->passes()){
                $barang ->update($request->all());
                return response()->json([
                    'pesan' => 'Data Berhasil ditambahkan',
                    'data' => $barang
                ], 200);
            }
            return response()->json([
                'pesan' => 'Data Gagal disimpan',
                'data' => $validasi->errors()->all()
            ], 400);    
        }
    }
}