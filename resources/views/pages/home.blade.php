<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sekolah muhammadiyah</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="{{ secure_asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('frontend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('frontend/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('frontend/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('frontend/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('frontend/css/style2.css') }}" rel="stylesheet">
    
    <body>

    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
        <a href="/" class="logo"><img src="{{ secure_asset('frontend/img/aaaa.png') }}" style="width: auto;"></a>
        <nav id="navbar" class="navbar">
            <ul>
            <a href="#">Home</a>
            <a href="#tentang">Tentang</a>
            <a href="{{ route('login') }}">Masuk</a>
        </nav>
        </div>
    </header>

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
        <div class="row">
            <div class="order-2 pt-4 col-lg-6 pt-lg-0 order-lg-1 d-flex flex-column justify-content-center">
            <h1 class="text-body">E-RPP</h1>
            <h2 class="text-body">Rencana Pelaksanaan Pembelajaran.</h2><h2 class="text-success">Sekolah Muhammadiyah</h2> <br>
            <div><a href="{{ route('index.rpp') }}" class="rounded btn btn-success rounded-pill">Buat RPP</a></div>
            </div>
            <div class="order-1 col-lg-6 order-lg-2 hero-img">
            <img src="{{ secure_asset('frontend/img/hero-img.png') }}" class="img-fluid" alt="">
            </div>
        </div>
        </div>
    </section>
    <!-- Main -->
    <main id="main">
        <section id="about" class="about">
        <div class="container">

            <div class="row">
            <div class="col-xl-5 col-lg-6 d-flex justify-content-center video-box align-items-stretch position-relative">
                
            </div>

            <div class="py-5 col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center px-lg-5" id="tentang">
                <h3>PENGUMUMAN</h3>
                <p>Rencana pelaksanaan pembelajaran, atau disingkat RPP, adalah pegangan seorang guru dalam mengajar di dalam  kelas. RPP dibuat oleh guru untuk membantunya dalam  mengajar agar sesuai dengan Standar Kompetensi dan  Kompetensi  Dasar pada hari tersebut.</p>
            </div>
            </div>

        </div>
        </section>

        <section id="services" class="services section-bg" >
        <div class="container">
            <div class="row" >
            <div class="col-lg-4 col-md-6">
                <div class="icon-box" class="center">
                <div class="icon"><i class="bi bi-chat-text" style="color: #ff689b;"></i></div>
                <h4 class="title"><a href="">Langkah Buat RPP </a></h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-wow-delay="3s">
                <div class="icon-box" class="center">
                <div class="icon"><i class="bi bi-chat-text" style="color: #3fcdc7;"></i></div>
                <h4 class="title"><a href="">Langkah Buat Akun</a></h4>
                </div>
            </div>
            </div>
        </div>
        </section>
    </main>
    <!--End Main-->

    <footer id="footer">
        <div class="footer-top">
        <div class="container">
            <div class="row">
            <div class="gambar">
            <img src="{{ secure_asset('frontend/img/logo2.png') }}" class="mx-auto d-block" style="width:3%">
            <h3 align="center">STYLEWEB</h3>
            <p align="center">Hak cipta &copy; 2021 E - RPP Sekolah Muhammadiyah.Semua Hak Dilindungi.</p>
            <p align="center">Dikelola oleh tim StyleWeb Universitas Ahmad Dahlan</p>
            </div>
            </div>
        </div>
        </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ secure_asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ secure_asset('frontend/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ secure_asset('frontend/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ secure_asset('frontend/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ secure_asset('frontend/vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ secure_asset('frontend/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ secure_asset('frontend/js/main.js') }}"></script>

    </body>

</html>