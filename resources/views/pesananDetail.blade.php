@extends('layouts.app')
@section('content')


<div class="container">

    <div class="row">
       
        <div class="col-md-12 mt-1">
        <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cart</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>
  

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shotcut icon" href="image/logo2.png">

    <!-- <link rel="stylesheet" href="reset.css"> -->
    <link rel="stylesheet" href="style.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.min.css">
    
</head>
<body>
    

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('history') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <h3>Check Out Berhasil</h3>
                    <h5>Selanjutnya untuk pembayaran silahkan transfer ke rekening
                         <strong>Bank BNI Nomer Rekening : 3211441114 a/n Sandara</strong> dengan nominal :
                          <strong>Rp. {{ number_format($pesanan->kode+$pesanan->total_harga) }}</strong>
                          Kode unik adalah kode untuk mengkonfirmasi pembayaran anda. </h5>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> Detail Pemesanan</h3>
                    @if(!empty($pesanan))
                    <p align="right">Tanggal Pesan : {{ $pesanan->tanggal }}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                               
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($pesanan_details as $pesanan_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="{{ url('image') }}/{{ $pesanan_detail->barang->gambar }}" width="100" alt="...">
                                </td>
                                <td>{{ $pesanan_detail->barang->nama_barang }}</td>
                                <td>{{ $pesanan_detail->jumlah }}</td>
                                <td>Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                                <td>Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                               
                            </tr>
                            @endforeach

                            <tr>
                                <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($pesanan->total_harga) }}</strong></td>
                                
                            </tr>
                            <tr>
                                <td colspan="5" align="right"><strong>Kode Unik :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($pesanan->kode) }}</strong></td>
                                
                            </tr>
                             <tr>
                                <td colspan="5" align="right"><strong>Total yang harus ditransfer :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($pesanan->kode+$pesanan->total_harga) }}</strong></td>
                                
                            </tr>
                            <tr></tr>
                            <tr>
                            <td align="right"><strong>Nomor Resi Pengiriman :</strong></td>
                                <td align="right"><strong>{{($pesanan->nomor_resi) }}</strong></td>
                            </tr>
                           
                        </tbody>
                    </table>
                    @endif

                </div>
            </div>
            <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <h5>Jika sudah mentransfer, pesanan anda akan segera kami kirim sesuai alamat diprofil anda, 
                        dan nomor resi pengiriman akan kami update dihalaman ini.</h5>
                </div>
            </div>
        </div>
        
    </div>
</div>
</body>
</html>
@endsection