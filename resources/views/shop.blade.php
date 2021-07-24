<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIPOOLAR Product</title>
    <link rel="shotcut icon" href="image/logo2.png">
    <!-- <link rel="stylesheet" href="reset.css"> -->
    <link rel="stylesheet" href="style.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.min.css">
</head>

<body>
<div class="flex-center position-ref full-height">
           
        </div>
    <!-- header -->
    <header>
        <a href="" class="logo">OUR <span>PRO</span>DUCT</a>
        <ul class="navigation">
            <li>
                <!-- @if(session('sukses'))  -->
                <!-- <div class="alert alert-danger" role="alert">{{session('sukses')}}</div> -->
             <!-- @endif</li> -->
            <li><a href="/home">Home</a></li>
            <li class="nav-item">
                <?php
                $pesanan_utama = App\Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
                    if(!empty($pesanan_utama))
                        {
                        $notif = App\Pesanan_detail::where('pesanan_id', $pesanan_utama->id)->count();}?>
                                <a class="nav-link" href="{{ url('cart') }}">
                                    <i class="fa fa-shopping-cart">Cart </i>
                                    @if(!empty($notif))
                                    <span class="badge badge-danger">{{ $notif }}</span>
                                    @endif
                                </a>
            </li>
            <!-- <li><a href="#"><i class="fa fa-shopping-cart"></i>Cart</a></li> -->
        </ul>
    </header>
    <section class="banner" id="banner">
        <div class="content">
            
            <h2>Give Away,</h2>
            <h2>Coming Soon!! Stay Tuned!!</h2>
        </form>
        </div>
    </section>
    <!-- end header -->
    @foreach($barangs as $barang)
<div class="row row-cols-1 row-cols-md-3 g-4">
<section id="product">
        <div class="product-content">
            <div class="card">
                <div class="content">
                <div class="card">
                <div class="content">
                    <div class="imgBx"><img src="{{ url('image') }}/{{ $barang->gambar }}" alt=""></div>
                    <h3>{{ $barang->nama_barang }} <br> Rp. {{ number_format($barang->harga)}}<span><br>
                       </span> <a href="{{ url('detail') }}/{{ $barang->id }}" class="btn">Pesan</a></h3>
                </div>
            </div>
            
        </div>

    </section>
</div>
@endforeach
    <!-- @foreach($barangs as $barang)
    <section id="product">
        <div class="product-content">
            <div class="card">
                <div class="content">
                <div class="card">
                <div class="content">
                    <div class="imgBx"><img src="{{ url('image') }}/{{ $barang->gambar }}" alt=""></div>
                    <h3>{{ $barang->nama_barang }} <br> Rp. {{ number_format($barang->harga)}}<span><br>
                       </span> <a href="{{ url('detail') }}/{{ $barang->id }}" class="btn">Detail</a></h3>
                </div>
            </div>
            
        </div>

    </section>
    @endforeach -->
    <!-- end our Team -->
    <!-- footer -->
    <footer>
        <div class="footer-bottom">
            <p>Made by Nabila Sukma Abadi</p>
        </div>
    </footer>
    <!-- end footer -->


    <!-- JavaScript -->
    <script>
        window.addEventListener('scroll', function () {
            const header = document.querySelector('header');
            header.classList.toggle("sticky", window.scrollY > 0);
        });
    </script>

    </body>
</html>
