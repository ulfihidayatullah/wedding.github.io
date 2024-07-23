<?php
session_start();
include 'koneksi/koneksi.php';
if (isset($_SESSION['kd_cs'])) {
    $kode_cs = $_SESSION['kd_cs'];
}

$kode = mysqli_real_escape_string($conn, $_GET['produk']);
$result = mysqli_query($conn, "SELECT * FROM produk WHERE kode_produk = '$kode'");
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Wedding</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    <!-- Bootstrap CSS -->
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

    <!-- Customized Bootstrap Stylesheet -->
    <link href="asset/css/style.css" rel="stylesheet" />
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="51">
    <!-- Navbar Start -->
    <?php include "navbar.php" ?>
    <!-- Navbar End -->

    <!-- Container -->
    <div class="container mt-5 pt-5">
        <h2 class="mb-4" style="border-bottom: 4px solid #ff8680;"><b>Detail Produk</b></h2>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <img src="image/produk/<?= $row['image']; ?>" class="card-img-top" alt="Gambar Produk">
                </div>
            </div>

            <div class="col-md-6">
                <form action="proses/add.php" method="GET">
                    <input type="hidden" name="kd_cs" value="<?= $kode_cs; ?>">
                    <input type="hidden" name="produk" value="<?= $kode; ?>">
                    <input type="hidden" name="hal" value="2">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td><b>Nama</b></td>
                                <td><?= $row['nama']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Harga</b></td>
                                <td>Rp. <?= number_format($row['harga']); ?></td>
                            </tr>
                            <tr>
                                <td><b>Deskripsi</b></td>
                                <td><?= $row['deskripsi']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Jumlah</b></td>
                                <td><input class="form-control" type="number" min="1" name="jml" value="1"
                                        style="width: 100px;"></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php
                    if (isset($_SESSION['user'])) {
                    ?>
                    <button type="submit" class="btn btn-success btn-lg btn-block"><i
                            class="glyphicon glyphicon-shopping-cart"></i> Tambahkan ke Keranjang</button>
                    <?php
                    } else {
                    ?>
                    <a href="keranjang.php" class="btn btn-success btn-lg btn-block"><i
                            class="glyphicon glyphicon-shopping-cart"></i> Tambahkan ke Keranjang</a>
                    <?php
                    }
                    ?>
                    <a href="index.php" class="btn btn-warning btn-lg btn-block">Kembali Belanja</a>
                </form>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <!-- JavaScript Libraries -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="asset/lib/easing/easing.min.js"></script>
    <script src="asset/lib/waypoints/waypoints.min.js"></script>
    <script src="asset/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="asset/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="asset/lib/lightbox/js/lightbox.min.js"></script>
    <script src="asset/js/main.js"></script>
</body>
<!-- Footer Start -->
<?php
include 'footer.php';
?>
<!-- Footer End -->

</html>