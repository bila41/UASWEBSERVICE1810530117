<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIPOOLAR Home</title>
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
        <a href="" class="logo">BIPO<span>OLAR</span></a>
        <ul class="navigation">
            <li><a href="#about">ABOUT</a></li>
            <li>@if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">LOGIN</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">REGISTER</a>
                        @endif
                    @endauth
                </div>
            @endif</li>
            <li><a href="#ourTeam">OUR TEAM</a></li>
        </ul>
    </header>
    <section class="banner" id="banner">
        <div class="content">
            <h2>WELCOME</h2>
            <p>I Hope U Always Find a Reason to Smile</p>
            <a href="{{ route('login') }}" class="btn">LOGIN</a>
        </div>
    </section>
    <!-- end header -->

    <!-- about Us -->
    <Section id="about">
        <div class="about-tittle">
            <h1>About Us</h1>
        </div>
        <div class="about-content">
            <div class="about-img">
                <img src="image/About.jpeg" alt="">
            </div>
            <div class="about-text">
               
                <p>Bipoolar adalah salah satu merek fashion lokal yang ada didaerah Mataram NTB.
                Kaos Bipoolar atau yang biasa disebut sebagai t-shirt hadir untuk pria maupun wanita. Karakteristik 
                dari t-shirt Bipoolar sendiri adalah sebagai casual wear yang nyaman bagi anak muda. <br> <br>
                Nama dan tema brand Bipoolar sendiri terinspirasi dari arti kata Bipolar dimana kita terkadang mengalami 
                perubahan suasana hati yang ekstrem. Kita bisa tiba-tiba sangat bahagia, namun tiba-tiba suasana hati bisa 
                berbalik 180 derajat jadi sangat marah atau sangat sedih.<br></p>
            </div>
        </div>
    </Section>
    <!-- end about Us -->
    
    <!-- our Team -->
    <section id="ourTeam">
        <div class="ourTeam-tittle">
            <h1>Bipoolar <span>Team</span></h1>
        </div>
        <div class="ourTeam-content">
            <div class="card">
                <div class="content">
                    <div class="imgBx"><img src="image/wire.jpeg" alt=""></div>
                    <h3>Wire <br><span>@Tolangkomak_</span></h3>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <div class="imgBx"><img src="image/rafly.jpeg" alt=""></div>
                    <h3>Rafly <br><span>@Raflynaufall_</span></h3>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <div class="imgBx"><img src="image/alvian.jpeg" alt=""></div>
                    <h3>Alvian<br><span>@Alvian._.z</span></h3>
                </div>
            </div>
        </div>
    </section>
    <!-- end our Team -->
    <!-- footer -->
    <footer>
        <div class="footer-content">
            <h3>BIPOOLAR</h3>
            <p>for more information, please follow me on Instagram
            </p>
            <ul class="socials">
                
                <li><a href=""><i class="fab fa-instagram"></i> @BPLR.</a></li>
                
            </ul>
        </div>
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
