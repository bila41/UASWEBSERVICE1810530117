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

    public function show($id)
    {
        $barang = Barang::where('id', $id)->first();

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

    public function deletebarang($id)
    {
        $barang = Barang::where('id', $id)->first();

        if (empty($barang)) {
            return response()->json([
                'pesan' => 'Data Tidak Ditemukan',
                'data' => ''
            ], 404);
        }
        $detail->delete();
        return response()->json([
            'pesan' => 'Data Berhasil Dihapus',
            'data' => $barang
        ], 200);
    }

    public function tambahbarang(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            "id" => "required|integer",
            "nama" => "required",
            "harga" => "required|integer",
            "stok" => "required|integer",
            "keterangan" => "required",
            "gambar" => "required"
            
        ]);

        if ($validasi->passes()) {
            return response()->json([
                'pesan' => "Data Berhasil disimpan",
                'data' => Barang::create($request->all())
            ]);
        }
        return response()->json([
            'pesan' => 'Data Gagal ditambahkan',
            'data' => $validasi->errors()->all()
        ], 404);
    }

    public function update(Request $request, $id)
    {
        $data = Barang::where('id', $id)->first();

        if (empty($id)) {
            return response()->json([
                'pesan' => 'Data Tidak Ditemukan',
                'data' => ''
            ], 404);
        } else {

            $validasi = Validator::make($request->all(), [
            "id" => "required|integer",
            "nama" => "required",
            "harga" => "required|integer",
            "stok" => "required|integer",
            "keterangan" => "required",
            "gambar" => "required"
            ]);

            if ($validasi->passes()) {
                return response()->json([
                    'pesan' => "Data Berhasil disimpan",
                    'data' => $id->update($request->all())
                ]);
            } else {
                return response()->json([
                    'pesan' => 'Data Gagal di Update',
                    'data' => $validasi->errors()->all()
                ], 404);
            }
        }
    }

}