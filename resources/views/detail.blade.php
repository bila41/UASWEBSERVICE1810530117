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

   

    <!-- <div class="card mb-3" style="max-width: 1500px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ url('image') }}/{{ $barang->gambar }}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{ $barang->nama_barang }}</h5>
        <h5 class="card-title"></strong> Rp. {{ number_format($barang->harga)}} </h5>
        <h5 class="card-title">Stok Tersedia : {{ $barang->stok }}</h5>
        <h5 class="card-title">Keterangan : </strong> <br>
                    {{ $barang->keterangan }} </h5>
        <a href=""class="btn btn-primary" ></i>Add to Cart</a>    
      </div>
    </div> -->
   
  </div>
</div>


<div class="container">

    <div class="row">
       
        <div class="col-md-12 mt-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        <img src="{{ url('image') }}/{{ $barang->gambar }}" class="rounded mx-auto d-block" width="100%" alt=""> 
                        </div>
                        <div class="col-md-6 mt-5">
                            <h2>{{ $barang->nama_barang }}</h2>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Harga</td>
                                        <td>:</td>
                                        <td>Rp. {{ number_format($barang->harga) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td>{{ number_format($barang->stok) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td>{{ $barang->keterangan }}</td>
                                    </tr>
                                   
                                    <tr>
                                        <td>Jumlah Pesan</td>
                                        <td>:</td>
                                        <td>
                                             <form method="post" action="{{ url('pesan') }}/{{ $barang->id }}" >
                                 @csrf
                                                <input type="text" name="jumlah_pesan" class="form-control" required="">
                                                <button type="submit" class="btn btn-primary mt-2"><i class="fa fa-shopping-cart"></i> Masukkan Ke Cart</button>
                                            </form>
                                            @if(session('gagal'))
                                            <div class="alert alert-danger mt-2" role="alert">{{session('gagal')}}</div>
                                            @else
                                            <div class="alert alert-light mt-2" role="alert">{{session('berhasil')}}</div>
                                            @endif
                                        </td>
                                       
                                    </tr> 
                                   
                                </tbody>
                            </table>
                            <table class="table table-borderless">
                              <tbody> 
                              <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr><td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            <td> <div class="col-md-12">
            <a href="{{ url('shop') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Back to Shop</a>
        </div>  </td></tr>
                              </tbody>
                           
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
</body>
</html>


@endsection


