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

<hea<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
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



        <!-- Container -->
        <div class="container" style="padding-bottom: 150px; margin-top:130px">
            <h2 style=" width: 100%; border-bottom: 4px solid #b89e14"><b>Login</b></h2>

            <form action="proses/login.php" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">username</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Username"
                        name="username" style="width: 500px;">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Password"
                        name="pass" style="width: 500px;">
                </div>
                <button type="submit" class="btn btn-success">Login</button>
                <a href="register.php" class="btn btn-primary">Daftar</a>
            </form>
        </div>
        <!-- End Container -->













        <!-- Scroll to Bottom -->
        <i class="fa fa-2x fa-angle-down text-white scroll-to-bottom"></i>

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-outline-primary btn-lg-square back-to-top"><i
                class="fa fa-angle-double-up"></i></a>

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