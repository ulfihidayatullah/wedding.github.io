<?php
session_start();
include 'koneksi/koneksi.php';
if (isset($_SESSION['kd_cs'])) {

    $kode_cs = $_SESSION['kd_cs'];
}
?>
<!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Wdding</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta content="Free HTML Templates" name="keywords" />
<meta content="Free HTML Templates" name="description" />

<!-- Masukkan pustaka Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com" />
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@400;600&display=swap"
    rel="stylesheet" />

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />

<!-- Libraries Stylesheet -->
<link href="asset/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
<link href="asset/lib/lightbox/css/lightbox.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" />

<!-- Customized Bootstrap Stylesheet -->
<link href="asset/css/style.css" rel="stylesheet" />
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="51">
    <!-- Navbar Start -->
    <?php include "navbar.php" ?>
    <!-- Navbar End -->

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 pb-5" id="home">
        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item position-relative active" style="height: 100vh; min-height: 400px">
                    <img class="position-absolute w-100 h-100" src="asset/img/carousel-1.png"
                        style="object-fit: cover" />
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px">
                            <h1 class="display-1 font-weigh-normal text-white mt-n3 mb-md-4">
                                LATINU.EO BY LATINUFUS
                            </h1>
                            <div class="d-inline-block border-top border-bottom border-light py-3 px-4">
                                <h3 class="text-uppercase font-weight-normal text-white m-0"
                                    style="letter-spacing: 2px">
                                    Wedding Planner & Wedding Organizer
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item position-relative" style="height: 100vh; min-height: 400px">
                    <img class="position-absolute w-100 h-100" src="asset/img/carousel-2.jpg"
                        style="object-fit: cover" />
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px">
                            <h1 class="display-1 font-weigh-normal text-white mt-n3 mb-md-4">
                                LATINU.EO BY LATINUFUS
                            </h1>
                            <div class="d-inline-block border-top border-bottom border-light py-3 px-4">
                                <h3 class="text-uppercase font-weight-normal text-white m-0"
                                    style="letter-spacing: 2px">
                                    Wedding Planner & Edding Organizer
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev justify-content-start" href="#header-carousel" data-slide="prev">
                <div class="btn btn-primary px-0" style="width: 68px; height: 68px">
                    <span class="carousel-control-prev-icon mt-3"></span>
                </div>
            </a>
            <a class="carousel-control-next justify-content-end" href="#header-carousel" data-slide="next">
                <div class="btn btn-primary px-0" style="width: 68px; height: 68px">
                    <span class="carousel-control-next-icon mt-3"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-fluid py-2" id="about">
        <div class="container py-5">
            <div class="section-title position-relative text-center">
                <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px">
                    About
                </h6>
                <i class="far fa-heart text-dark"></i>
            </div>
            <div class="row m-0 mb-4 mb-md-0 pb-2 pb-md-0">
                <div class="col-md-6 p-0 text-center text-md-right">
                    <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-5">
                        <h3 class="mb-3">YOUR WEDDING DREAM</h3>
                        <p>
                            "Your Wedding Dream offers bespoke planning and exquisite details, ensuring your special
                            day is a reflection of your unique love story."
                        </p>

                    </div>
                </div>
                <div class="col-md-6 p-0" style="min-height: 400px">
                    <img class="position-absolute w-100 h-100" src="asset/img/about-1.png" style="object-fit: cover" />
                </div>
            </div>
            <div class="row m-0">
                <div class="col-md-6 p-0" style="min-height: 400px">
                    <img class="position-absolute w-100 h-100" src="asset/img/about-2.jpg" style="object-fit: cover" />
                </div>
                <div class="col-md-6 p-0 text-center text-md-left">
                    <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-5">
                        <h3 class="mb-3">MAKE YOUR DAY HAPPY</h3>
                        <p>
                            "Make Your Day Happy specializes in creating joyous and memorable weddings tailored to
                            reflect your unique love story."
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Story Start -->
    <div class="container-fluid py-5" id="story">
        <div class="container pt-5 pb-3">
            <div class="section-title position-relative text-center">
                <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px">
                    CATEGORI
                </h6>
                <i class="far fa-heart text-dark"></i>
            </div>
            <div class="container timeline position-relative p-0">
                <div class="row">
                    <div class="col-md-6 text-center text-md-right">
                        <img class="img-fluid mr-md-3" src="asset/img/story-1.jpg" alt="" />
                    </div>
                    <div class="col-md-6 text-center text-md-left">
                        <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-4 ml-md-3">
                            <h4 class="mb-2">Wedding Planner</h4>
                            <p class="text-uppercase mb-2">Apa itu wedding planner ?</p>
                            <p class="m-0">
                                Wedding planner merencanakan pesta pernikahan Anda mulai dari awal, mengorganisir semua,
                                mulai dari pertemuan keluarga, membuat janji temu dengan vendor dan menemani saat
                                meeting, memberi masukan vendor mana yang sesuai, hingga mengingatkan pengantin untuk
                                melakukan perawatan sebelum hari pernikahan tiba.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 text-center text-md-right">
                        <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-4 mr-md-3">
                            <h4 class="mb-2">Wedding Organizer</h4>
                            <p class="text-uppercase mb-2">Apa itu wedding organizer ?</p>
                            <p class="m-0">
                                Wedding organizer adalah tim wedding coordinator yang bekerja bersama untuk membantu
                                pelaksanaan acara pernikahan Anda. Mereka bertugas kurang lebih sama dengan wedding
                                planner tetapi pada garis waktu yang lebih singkat.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 text-center text-md-left">
                        <img class="img-fluid ml-md-3" src="asset/img/story-2.jpg" alt="" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 text-center text-md-right">
                        <img class="img-fluid mr-md-3" src="asset/img/story-3.png" alt="" />
                    </div>
                    <div class="col-md-6 text-center text-md-left">
                        <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-4 ml-md-3">
                            <h4 class="mb-2">Rekomendasi Gedung & Catering</h4>
                            <p class="text-uppercase mb-2"></p>
                            <p class="m-0">
                                GEDUNG
                                GEDUNG KECIL : TAMAN KOPI, BAITUSOLIHIN SERANG, PKPRI, PGRI.
                                GEDUNG SEDANG : PURI KAYANA, DUCE.
                                GEDUNG BESAR : SAGARA LUGINA, HOTEL RATU, LEDIAN HOTEL, CATTERING, PANDEGLANG
                                CATTERING
                                SARI-SARI CATTERING SERANG : POETRY CATTERING, DIAZ CATTERING, ANDIKA SARI CATTERING,
                                ULTAMA CATTERING, NISUNI CATTERING
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Story End -->

    <!-- Gallery Start -->
    <div class="container-fluid bg-gallery" id="gallery" style="padding: 120px 0; margin: 90px 0">
        <div class="section-title position-relative text-center" style="margin-bottom: 120px">
            <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px">
                Gallery
            </h6>
            <h1 class="font-secondary display-4 text-white">Our Photo Gallery</h1>
            <i class="far fa-heart text-white"></i>
        </div>
        <div class="owl-carousel gallery-carousel">
            <div class="gallery-item">
                <img class="img-fluid w-100" src="asset/img/gallery-1.png" alt="" />
                <a href="asset/img/gallery-1.png" data-lightbox="gallery">
                    <i class="fa fa-2x fa-plus text-white"></i>
                </a>
            </div>
            <div class="gallery-item">
                <img class="img-fluid w-100" src="asset/img/gallery-2.jpg" alt="" />
                <a href="asset/img/gallery-2.jpg" data-lightbox=" gallery">
                    <i class="fa fa-2x fa-plus text-white"></i>
                </a>
            </div>
            <div class="gallery-item">
                <img class="img-fluid w-100" src="asset/img/gallery-3.jpg" alt="" />
                <a href="asset/img/gallery-3.jpg" data-lightbox="gallery">
                    <i class="fa fa-2x fa-plus text-white"></i>
                </a>
            </div>
            <div class="gallery-item">
                <img class="img-fluid w-100" src="asset/img/gallery-4.jpg" alt="" />
                <a href="asset/img/gallery-4.jpg" data-lightbox="gallery">
                    <i class="fa fa-2x fa-plus text-white"></i>
                </a>
            </div>
            <div class="gallery-item">
                <img class="img-fluid w-100" src="asset/img/gallery-5.jpg" alt="" />
                <a href="asset/img/gallery-5.jpg" data-lightbox="gallery">
                    <i class="fa fa-2x fa-plus text-white"></i>
                </a>
            </div>
            <div class="gallery-item">
                <img class="img-fluid w-100" src="asset/img/gallery-6.jpg" alt="" />
                <a href="asset/img/gallery-6.jpg" data-lightbox="gallery">
                    <i class="fa fa-2x fa-plus text-white"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- Gallery End -->

    <!-- JavaScript Libraries -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- Masukkan pustaka Bootstrap JavaScript (diletakkan di bagian bawah sebelum </body>) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="asset/lib/easing/easing.min.js"></script>
    <script src="asset/lib/waypoints/waypoints.min.js"></script>
    <script src="asset/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="asset/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="asset/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="asset/js/main.js"></script>
</body>
<!-- Footer Start -->
<?php
include 'footer.php';
?>
<!-- Footer End -->

</html>