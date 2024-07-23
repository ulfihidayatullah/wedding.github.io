<?php
session_start();
include 'koneksi/koneksi.php';
if (isset($_SESSION['kd_cs'])) {

    $kode_cs = $_SESSION['kd_cs'];
}
if (isset($_GET['invoice']) && isset($_GET['total'])) {
    $invoice = $_GET['invoice'];
    $total = $_GET['total'];

    $kode = mysqli_query($conn, "SELECT * FROM produksi WHERE invoice = '$invoice' AND total = '$total'");
    $data = mysqli_fetch_assoc($kode);

    if ($data) {
        // Periksa apakah pembayaran sudah dilakukan
        $pembayaran = mysqli_query($conn, "SELECT * FROM pembayaran WHERE invoice = '$invoice'");
        $data_pembayaran = mysqli_fetch_assoc($pembayaran);

        if ($data_pembayaran) {
            echo "<div style='text-align: center;'><h2 class='text-center'>Terimakasih, Anda sudah melakukan pembayaran</h2></div>";
            echo "<img src='image/home/buy.jpg' style='width: 400px; height: auto; display: block; margin: 0 auto; '>";
            echo "<div style='text-align: center; margin-top: 20px;'>
            <a href='prosesbayar/cetak.php?invoice=$invoice' style='
            display: inline-block; padding: 10px 20px; font-size: 16px;font-weight: bold;color: #fff;background-color: #007bff; border: none; border-radius: 5px; text-decoration: none; transition: background-color 0.3s ease;'>Cetak Bukti Pembayaran</a>
            </div>";
            echo "<div style='text-align: center; margin-top: 20px;'>
            <a href='index.php' style='
            display: inline-block; padding: 10px 20px; font-size: 16px;font-weight: bold;color: #fff;background-color: red; border: none; border-radius: 5px; text-decoration: none; transition: background-color 0.3s ease;'>Kembali</a>
            </div>";
        } else {
?>
<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Pembayaran</title>
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Customized Bootstrap Stylesheet -->
<link href="asset/css/style.css" rel="stylesheet" />
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="51">
    <!-- Navbar Start -->
    <?php include "navbar.php" ?>
    <!-- Navbar End -->

    <!-- Container -->
    <div class="container" style="padding-bottom: 20px; margin-top:130px">
        <h2 class="text-center">Pembayaran</h2>
        <form action="prosesbayar/create.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="invoice">Invoice:</label>
                <input type="text" class="form-control" id="invoice" name="invoice" value="<?= $data['invoice']; ?>"
                    readonly>
            </div>
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap:</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="total">Total Pembayaran:</label>
                <input type="text" class="form-control" id="total" name="total" value="<?= $data['total']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Pilih Gambar</label>
                <input type="file" id="exampleInputFile" name="files" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="metode">Metode Pembayaran:</label>
                <select class="form-control" id="metode" name="metode" required>
                    <option value="" disabled selected>Pilih Metode Pembayaran</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="E-Wallet">E-Wallet</option>
                </select>
            </div>

            <div id="transfer-bank" class="payment-detail" style="display: none;">
                <h5>Transfer Bank</h5>
                <p>Silakan transfer ke rekening berikut:</p>
                <p>Bank BNI</p>
                <p>No. Rekening: 0469097953</p>
                <p>Atas Nama: Latinufus Alawiah</p>
            </div>

            <div id="e-wallet" class="payment-detail" style="display: none;">
                <h5>E-Wallet</h5>
                <p>Silakan transfer ke nomor berikut:</p>
                <p>DANA: 088224616116</p>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Konfirmasi Pembayaran</button>
        </form>
    </div>
    <!-- End Container -->

    <!-- Footer Start -->
    <div class="footer bg-dark text-white py-4">
        <div class="container text-center">
            <p class="mb-0">&copy; 2024 LATINU.EO. All Rights Reserved.</p>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#metode').change(function() {
            var selectedMethod = $(this).val();
            $('.payment-detail').hide();
            if (selectedMethod === 'Transfer Bank') {
                $('#transfer-bank').show();
            } else if (selectedMethod === 'E-Wallet') {
                $('#e-wallet').show();
            }
        });
    });
    </script>
</body>

</html>
<?php
        }
    }
} else {
    echo "<div style='text-align: center;'><h2 class='text-center'>Terjadi Kesalahan</h2></div>";
}
?>