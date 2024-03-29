<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?= $title ?></title>
    <meta name="description" content="Sistem Deteksi Autisme Usia Dini Umur 4-11 Tahun Online">
      <meta name="keywords" content="autisme, autis, deteksi autis, deteksi, online, gratis, deteksi autis gratis, autis anak,">
  <meta name="author" content="Fanny Vega Variant">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="<?= base_url('asset/css/bootstrap.min.css') ?>">
    <link href="<?= base_url('asset/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url('asset/css/hero-slider.css') ?>">
    <link rel="stylesheet" href="<?= base_url('asset/css/templatemo-main.css') ?>">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <script src="<?= base_url('asset/vendor/modernizr-2.8.3-respond-1.4.2.min.js') ?>"></script>
</head>
<!--
Vanilla Template
https://templatemo.com/tm-526-vanilla
-->

<body>

    <div class="fixed-side-navbar">
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="#home"><span>Intro</span></a></li>
            <li class="nav-item"><a class="nav-link" href="#services"><span>Info</span></a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="#portfolio"><span>Portfolio</span></a></li>
            <li class="nav-item"><a class="nav-link" href="#our-story"><span>Our Story</span></a></li>
            <li class="nav-item"><a class="nav-link" href="#contact-us"><span>Contact Us</span></a></li> -->
        </ul>
    </div>

    <div class="parallax-content baner-content d-flex justify-content-center align-items-center" id="home">
        <div class="container">
            <div class="first-content">
                <h1>Autism Spectrum Disorder</h1>
                <span><em>Deteksi</em> autis anak usia 4 - 11</span>
                <div class="primary-button">
                    <a href="<?= base_url('cek-asd') ?>">Deteksi Sekarang!</a>
                </div>
            </div>
        </div>
    </div>


    <div class="service-content" id="services">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <div class="left-text text-black">
                        <h4>Tentang Desitis</h4>
                        <div class="line-dec"></div>
                        <p>Desitis adalah website pendeteksi autisme anak usia 4 - 11 tahun dengan pendekatan metode Naive Bayes,
                            website ini dibangun oleh <a rel="nofollow" href="https://www.instagram.com/fannyvegant_/">Fanny Vega Variant</a> dengan tujuan untuk penyelesaian proyek tugas akhir
                            Implementasi Algoritma Clasifikasi Naive Bayes untuk Mendeteksi Gejala Autism Spektrum Disorder (ASD) Pada Anak Berbasis Website. Terima kasih.</p>
                        <ul>
                            <li>- Mudah digunakan</li>
                            <li>- Berbentuk input pertanyaan</li>
                            <li>- Menggunakan Metode Naive Bayes</li>
                        </ul>
                        <div class="primary-button">
                            <a href="#home">Coba Deteksi</a>
                        </div>
                    </div>
                </div>
                <!--<div class="col-md-8">-->
                <!--    <div class="row">-->
                <!--        <div class="col-md-6">-->
                <!--            <div class="service-item">-->
                <!--                <h4>Classic Modern Design</h4>-->
                <!--                <div class="line-dec"></div>-->
                <!--                <p>Sed lacinia ligula est, at venenatis ex iaculis quis. Morbi sollicitudin nulla eget odio pellentesque.</p>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col-md-6">-->
                <!--            <div class="service-item">-->
                <!--                <h4>Unique &amp; Creative Ideas</h4>-->
                <!--                <div class="line-dec"></div>-->
                <!--                <p>Sed lacinia ligula est, at venenatis ex iaculis quis. Morbi sollicitudin nulla eget odio pellentesque.</p>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col-md-6">-->
                <!--            <div class="service-item">-->
                <!--                <h4>Effective Team Work</h4>-->
                <!--                <div class="line-dec"></div>-->
                <!--                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lacinia ligula est, at venenatis ex iaculis quis.</p>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col-md-6">-->
                <!--            <div class="service-item">-->
                <!--                <h4>Fast Support 24/7</h4>-->
                <!--                <div class="line-dec"></div>-->
                <!--                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lacinia ligula est, at venenatis ex iaculis quis.</p>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="<?= base_url('asset/js/jquery-3.5.1.min') ?>"><\/script>')
    </script>
    <script src="<?= base_url('asset/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('asset/js/plugins.js') ?>"></script>
    <script src="<?= base_url('asset/js/main.js') ?>"></script>
    <script>
        function openCity(cityName) {
            var i;
            var x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(cityName).style.display = "block";
        }
    </script>

    <script>
        $(document).ready(function() {
            // Add smooth scrolling to all links
            $(".fixed-side-navbar a, .primary-button a").on('click', function(event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function() {

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });
        });
    </script>

</body>

</html>