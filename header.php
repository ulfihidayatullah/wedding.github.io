<?php
session_start();
include 'koneksi/koneksi.php';
if (isset($_SESSION['kd_cs'])) {

    $kode_cs = $_SESSION['kd_cs'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Rapi-Cake Backery</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>


</head>

<body>


    <nav class="navbar navbar-default" style="padding: 10px;">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="image/home/Logo Latinu.EO.PNG" alt="" width="50px">
                <a class="navbar-brand" href="#" style="color: #b89e14"><b>LATINU.EO BY LATINUFUS_</b></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="produk.php">Produk</a></li>
                    <li><a href="selesai.php">Daftar Pembelian</a></li>
                    <li><a href="manual.php">Cara Belanja</a></li>
                    <?php
                    if (isset($_SESSION['kd_cs'])) {
                        $kode_cs = $_SESSION['kd_cs'];
                        $cek = mysqli_query($conn, "SELECT kode_produk from keranjang where kode_customer = '$kode_cs' ");
                        $value = mysqli_num_rows($cek);

                    ?>
                    <li><a href="keranjang.php"><i class="glyphicon glyphicon-shopping-cart"></i> <b>[ <?= $value ?>
                                ]</b></a></li>

                    <?php
                    } else {
                        echo "
						<li><a href='keranjang.php'><i class='glyphicon glyphicon-shopping-cart'></i> [0]</a></li>

						";
                    }
                    if (!isset($_SESSION['user'])) {
                    ?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false"><i class="glyphicon glyphicon-user"></i> Akun <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="user_login.php">login</a></li>
                            <li><a href="register.php">Register</a></li>
                        </ul>
                    </li>
                    <?php
                    } else {
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false"><i class="glyphicon glyphicon-user"></i> <?= $_SESSION['user']; ?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="proses/logout.php">Log Out</a></li>
                        </ul>
                    </li>

                    <?php
                    }
                    ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Layanan Kami
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="produk.php">Product Catalog</a></li>
                        <li><a class="dropdown-item" href="selesai.php">WO Package</a></li>
                        <li><a class="dropdown-item" href="manual.php">Product Package </a></li>
                    </ul>
                </div> -->
</body>

</html>