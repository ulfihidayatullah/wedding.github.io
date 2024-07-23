<?php
session_start();
include 'koneksi/koneksi.php';
if (isset($_SESSION['kd_cs'])) {

    $kode_cs = $_SESSION['kd_cs'];
}
?>


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


    <!-- Container -->
    <div class="container" style="padding-bottom: 30px; margin-top:130px">
        <?php
        // Periksa apakah pengguna sudah login
        if (isset($_SESSION['user'])) {
            $kode_cs = $_SESSION['kd_cs'];

            // Query untuk mengambil daftar pembelian jika pengguna sudah login
            $result = mysqli_query($conn, "SELECT DISTINCT invoice, kode_customer, total, status, order_date, kode_produk, terima, tolak, cek FROM produksi WHERE kode_customer = '$kode_cs' GROUP BY invoice");

            $num_rows = mysqli_num_rows($result);

            if ($num_rows > 0) {
        ?>
        <h2 style="width: 100%; border-bottom: 4px solid gray"><b>Daftar Pembelian</b></h2>
        <br>
        <h5 class="bg-success" style="padding: 7px; width: 710px; font-weight: bold;">
            <marquee>1x24 jam Status Pembayaran akan berubah jika sudah melakukan pembayaran</marquee>
        </h5>
        <a href="produksi.php" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i> Reload</a>
        <br>
        <table class="table table-striped text-dark">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Invoice</th>
                    <th scope="col">Kode Customer</th>
                    <th scope="col">Total Pembayaran</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Bayar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $kodep = $row['kode_produk'];
                            $inv = $row['invoice'];
                        ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row['invoice']; ?></td>
                    <td><?= $row['kode_customer']; ?></td>
                    <td>Rp. <?= number_format($row['total']); ?></td>
                    <?php if ($row['terima'] == 1) { ?>
                    <td style="color: green;font-weight: bold;">Pesanan Diterima</td>
                    <?php } else if ($row['tolak'] == 1) { ?>
                    <td style="color: red;font-weight: bold;">Pesanan Ditolak</td>
                    <?php } else { ?>
                    <td style="color: orange;font-weight: bold;"><?= $row['status']; ?></td>
                    <?php } ?>
                    <td><?= $row['order_date']; ?></td>

                    <td><a href="pembayaran.php?invoice=<?= $row['invoice']; ?>&total=<?= $row['total']; ?>"
                            class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i> Bayar</a></td>
                </tr>
                <?php
                            $no++;
                        }
                        ?>
            </tbody>
        </table>
        <?php
            } else {
                echo "<h4 class='text-center' style='font-weight: bold;'>Belum ada pembelian yang dapat ditampilkan, silahkan melakukan pembelian terlebih dahulu.</h4>";
            }
        } else {
            // Jika pengguna belum login
            echo "<h4 class='text-center' style='font-weight: bold; color:red;'>Silahkan login terlebih dahulu untuk melihat daftar pembelian!!</h4>";
        }
        ?>
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