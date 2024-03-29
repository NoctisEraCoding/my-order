<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title', 'My Order')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="//assetsFront/img/favicon.png" rel="icon">
    <link href="//assetsFront/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assetsFront/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="/assetsFront/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assetsFront/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assetsFront/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assetsFront/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assetsFront/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assetsFront/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Delicious - v4.7.1
    * Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
</svg>

<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex align-items-center fixed-top ">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-center justify-content-lg-start">
        <i class="bi bi-phone d-flex align-items-center"><span><a href="tel:{{config('shopData')->phone}}">{{config('shopData')->phone}}</a></span></i>
        <i class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span>{{config('shopData')->workDay}}: {{config('shopData')->workHour}}</span></i>
    </div>
</section>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <div class="logo me-auto">
            <h1>
                <img src="{{config('configurations.siteLogo')}}" width="40">
                <a href="/">{{ucfirst(config('configurations.siteName'))}}</a>
            </h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="/assetsFront/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>
        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto" href="/#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="/#about">About</a></li>
                <li><a class="nav-link scrollto" href="/#menu">Menu</a></li>
                <li><a class="nav-link scrollto" href="/#completemenu">Complete Menu</a></li>
                <li><a class="nav-link scrollto" href="/#gallery">Gallery</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <a href="{{route('frontend.showCart')}}" class="book-a-table-btn scrollto"><i class="bi bi-cart-check"></i> Checkout order</a>

    </div>
</header><!-- End Header -->

<main id="main">
    @yield('content')

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2><span>Contact</span> Us</h2>
                <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
            </div>
        </div>

        <div class="map">
            <iframe style="border:0; width: 100%; height: 350px;" src="{{config('shopData')->googleMap}}" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="container mt-5">

            <div class="info-wrap">
                <div class="row">
                    <div class="col-lg-3 col-md-6 info">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Location:</h4>
                        <p>{!! nl2br(e(config('shopData')->location)) !!}</p>
                    </div>

                    <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
                        <i class="bi bi-clock"></i>
                        <h4>Open Hours:</h4>
                        <p>{{config('shopData')->workDay}}:<br>{{config('shopData')->workHour}}</p>
                    </div>

                    <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
                        <i class="bi bi-envelope"></i>
                        <h4>Email:</h4>
                        <p><a href="mailto:{{config('shopData')->email}}">{{config('shopData')->email}}</a></p>
                    </div>

                    <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
                        <i class="bi bi-phone"></i>
                        <h4>Call:</h4>
                        <p><a href="tel:{{config('shopData')->phone}}">{{config('shopData')->phone}}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->
</main>
<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container">
        <h3>{{ucfirst(config('configurations.siteName'))}}</h3>
        <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
        <div class="social-links">
            <a href="{{config('shopData')->twitter}}" class="twitter" target="_blank"><i class="bx bxl-twitter"></i></a>
            <a href="{{config('shopData')->facebook}}" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="{{config('shopData')->instagram}}" class="instagram"><i class="bx bxl-instagram"></i></a>
        </div>
        <div class="copyright">
            &copy; Copyright <strong><span>{{ucfirst(config('configurations.siteName'))}}</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            <br>
            Developed by <a href="https://github.com/NoctisEraCoding/my-order">Noctis Era Coding</a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="/assetsFront/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assetsFront/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/assetsFront/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/assetsFront/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/assetsFront/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="/assetsFront/js/main.js"></script>
<script src="/assets/js/jquery-3.6.1.min.js"></script>

@yield('scriptPage')

</body>

</html>
