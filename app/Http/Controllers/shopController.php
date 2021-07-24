<?php

namespace App\Http\Controllers;
use App\Barang;
use App\Pesanan;
use App\User;
use App\Pesanan_detail;
use Auth;
use Alert;
use Carbon\Carbon;
use Illuminate\Http\Request;

class shopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $barangs = Barang::paginate(20);
        return view('shop', compact('barangs'));
    }

    
    public function pesan(Request $request, $id)
    {
        $barang = Barang::where('id', $id)->first();
        $tanggal = Carbon::now();

        //validasi apakah melebihi stok
    	if($request->jumlah_pesan > $barang->stok)
    	{
    	return redirect('detail/'.$id)->with('gagal','Tidak Boleh Melebihi Stok yang Tersedia');
    	}

    //cek validasi
	$cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
	//simpan ke database pesanan
	if(empty($cek_pesanan))
	{
		$pesanan = new Pesanan;
		$pesanan->user_id = Auth::user()->id;
		$pesanan->tanggal = $tanggal;
		$pesanan->status = 0;
		$pesanan->total_harga = 0;
		$pesanan->kode = mt_rand(100, 999);
		$pesanan->save();
	}
	
	//simpan ke database pesanan detail
	$pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

	//cek pesanan detail
	$cek_pesanan_detail = Pesanan_detail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
	if(empty($cek_pesanan_detail))
	{
		$pesanan_detail = new Pesanan_detail;
		$pesanan_detail->barang_id = $barang->id;
		$pesanan_detail->pesanan_id = $pesanan_baru->id;
		$pesanan_detail->jumlah = $request->jumlah_pesan;
		$pesanan_detail->jumlah_harga = $barang->harga*$request->jumlah_pesan;
		$pesanan_detail->save();
	}else 
	{
		$pesanan_detail = Pesanan_detail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();

		$pesanan_detail->jumlah = $pesanan_detail->jumlah+$request->jumlah;

		//harga sekarang
		$harga_pesanan_detail_baru = $barang->harga*$request->jumlah;
		$pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
		$pesanan_detail->update();
	}

	//jumlah total
	$pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
	$pesanan->total_harga = $pesanan->total_harga+$barang->harga*$request->jumlah_pesan;
	$pesanan->update();
    	
        alert()->success('Ditambah Ke Cart', 'Berhasil');
    	return redirect('detail/'.$id)->with('berhasil','sudah ditambah ke Cart. masuk ke Cart untuk Check-out Produk ya..');

    }

    public function cart()
    {
		$pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
		$pesanan_details = [];
		   if(!empty($pesanan))
		   {
			   $pesanan_details = Pesanan_detail::where('pesanan_id', $pesanan->id)->get();
   
		   }
		   
		   return view('cart', compact('pesanan', 'pesanan_details'));
    }


    public function show($id)
    {
        $barang = Barang::where('id', $id)->first();
        return view('detail', compact('barang'));
    }

    
    public function delete($id)
    {
		$pesanan_detail = Pesanan_detail::where('id', $id)->first();

        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->total_harga = $pesanan->total_harga-$pesanan_detail->jumlah_harga;
        $pesanan->update();


        $pesanan_detail->delete();

        Alert::error('Dihapus dari cart', 'Berhasil');
        return redirect('cart');
    }

    
	public function konfirmasi()
    {
        $user = User::where('id', Auth::user()->id)->first();

        if(empty($user->alamat))
        {
            Alert::error('Identitasi Harap dilengkapi', 'Error');
            return redirect('profil');
        }

        if(empty($user->nohp))
        {
            Alert::error('Identitasi Harap dilengkapi', 'Error');
            return redirect('profil');
        }

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = Pesanan_detail::where('pesanan_id', $pesanan_id)->get();
        foreach ($pesanan_details as $pesanan_detail) {
            $barang = Barang::where('id', $pesanan_detail->barang_id)->first();
            $barang->stok = $barang->stok-$pesanan_detail->jumlah;
            $barang->update();
        }



        Alert::success('Pesanan Sukses Check Out Silahkan Lanjutkan Proses Pembayaran', 'Success');
        return redirect('history/'.$pesanan_id);

    }
}
