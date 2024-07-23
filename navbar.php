<?php
include 'koneksi/koneksi.php';
?>
<!-- Navbar Start -->
<nav class="navbar fixed-top shadow-sm navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5">
    <a href="index.php" class="navbar-brand d-block d-lg-none">
        LATINU.EO <span class="text-primary">BY</span> LATINUFUS
    </a>
    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav ml-auto py-0 align-items-center">
            <a href="index.php" class="nav-item nav-link active">
                <img src="asset/img/fix_logo.PNG" style="width: 80px;" alt="">
            </a>
            <a href="index.php" class="nav-item nav-link">Home</a>
            <a href="produk.php" class="nav-item nav-link">Layanan Kami</a>
            <a href="selesai.php" class="nav-item nav-link">Daftar Pembelian</a>
            <a href="manual.php" class="nav-item nav-link">Panduan Pembelian</a>
        </div>
        <!-- <a href="index.php" class="navbar-brand mx-5 d-none d-lg-block"> -->
        <!-- LATINU.EO <span class="text-primary">BY</span> LATINUFUS -->
        <!-- <img src="asset/img/fix_logos.PNG" style="width: 80px;" alt=""> -->
        <!-- </a> -->
        <div class="navbar-nav mr-auto py-0">
            <?php
            if (isset($_SESSION['kd_cs'])) {
                $kode_cs = $_SESSION['kd_cs'];
                $cek = mysqli_query($conn, "SELECT kode_produk from keranjang where kode_customer = '$kode_cs' ");
                $value = mysqli_num_rows($cek);
            ?>
            <a href="keranjang.php" class="text-white" style="font-size: 1.2rem;margin-top:1.6rem">
                <i class="fas fa-shopping-cart" style="font-size: 1.5rem;"></i> <b>[ <?= $value ?>
                    ]</b>
            </a>
            <?php
            } else {
                echo "
                    <a class='text-white' style='font-size: 1.2rem;margin-top:1.6rem' href='keranjang.php'><i class='fas fa-shopping-cart' style='font-size: 1.5rem;margin-top:5px'></i> [0]</a>
                    ";
            }
            if (!isset($_SESSION['user'])) {
            ?>
            <li class="nav-item dropdown ml-3 mt-2">
                <a href="#" class="nav-link dropdown-toggle text-white" data-toggle="dropdown" role="button"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i> Akun <span class="caret"></span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="user_login.php">Login</a>
                    <a class="dropdown-item" href="register.php">Register</a>
                </div>
            </li>
            <?php
            } else {
            ?>
            <li class="nav-item dropdown ml-3 mt-1">
                <a href="#" class="nav-link dropdown-toggle text-white" data-toggle="dropdown" role="button"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i> <?= $_SESSION['user']; ?> <span class="caret"></span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="proses/logout.php">Log Out</a>
                </div>
            </li>
            <?php
            }
            ?>
        </div>
    </div>
</nav>
<!-- Navbar End -->