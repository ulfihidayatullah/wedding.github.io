<?php
session_start();
include 'koneksi/koneksi.php';
if (isset($_SESSION['kd_cs'])) {
    $kode_cs = $_SESSION['kd_cs'];
}

$kd = mysqli_real_escape_string($conn, $_GET['kode_cs']);
$cs = mysqli_query($conn, "SELECT * FROM customer WHERE kode_customer = '$kd'");
$rows = mysqli_fetch_assoc($cs);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Wdding</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    <!-- Masukkan pustaka Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@400;600&display=swap" rel="stylesheet" />

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
    <div class="container" style="padding-bottom: 20px; margin-top:130px">
        <h2 style=" width: 100%; border-bottom: 4px solid #b89e14"><b>Checkout</b></h2>
        <div class="row">
            <div class="col-md-6">
                <h4>Daftar Pesanan</h4>
                <table class="table table-stripped text-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Sub Total</th>
                    </tr>
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM keranjang WHERE kode_customer = '$kd'");
                    $no = 1;
                    $hasil = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $subtotal = $row['harga'] * $row['qty'];
                        $hasil += $subtotal;
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $row['nama_produk']; ?></td>
                            <td>Rp.<?= number_format($row['harga']); ?></td>
                            <td><?= $row['qty']; ?></td>
                            <td>Rp.<?= number_format($subtotal); ?></td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                    <tr>
                        <th colspan="4" class="text-right">Total</th>
                        <th>Rp.<?= number_format($hasil); ?></th>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 bg-success">
                <h5>Pastikan Pesanan Anda Sudah Benar</h5>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6 bg-warning">
                <h5>Isi Form di bawah ini</h5>
            </div>
        </div>
        <br>
        <form action="proses/order.php" method="POST" class="text-dark">

            <input type="hidden" name="kode_cs" value="<?= $kd; ?>">
            <input type="hidden" name="subtotal" value="<?= $hasil; ?>">
            <input type="hidden" name="total" value="<?= $hasil; ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama" name="nama" style="width: 557px;" value="<?= $rows['username']; ?>" readonly>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Provinsi</label>
                    <select class="form-control" id="provinsi" name="provinsi" required>
                        <option value="">--Pilih Provinsi--</option>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM provinsi");
                        while ($prov = mysqli_fetch_assoc($query)) {
                        ?>
                            <option value="<?= $prov['id'] ?>"><?= $prov['nama_provinsi']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>Kabupaten/Kota</label>
                    <select class="form-control" id="kota" name="kota" required>
                        <option value="">--Pilih Kota/Kabupaten--</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class=" col-md-6 form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" style="width: 557px;" placeholder="Alamat Lengkap" required></textarea>
                </div>
                <div class="col-md-6 form-group">
                    <label for="exampleInputEmail1">Kode Pos</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Kode Pos" name="kode_pos" style="width: 557px;" required>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Pesan Sekarang</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </div>
        </form>
    </div>


    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="asset/lib/easing/easing.min.js"></script>
    <script src="asset/lib/waypoints/waypoints.min.js"></script>
    <script src="asset/lib/counterup/counterup.min.js"></script>
    <script src="asset/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="asset/lib/lightbox/js/lightbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script src="asset/js/main.js"></script>

    <!-- Script tambahan -->
    <script>
        $(document).ready(function() {
            $('#provinsi').on('change', function() {
                var provinsi_id = $(this).val();
                if (provinsi_id) {
                    $.ajax({
                        type: 'POST',
                        url: 'get_kota.php',
                        data: 'provinsi_id=' + provinsi_id,
                        success: function(html) {
                            $('#kota').html(html);
                        }
                    });
                } else {
                    $('#kota').html('<option value="">--Pilih Kota/Kabupaten--</option>');
                }
            });
        });
    </script>
</body>
<!-- Footer Start -->
<?php
include 'footer.php';
?>
<!-- Footer End -->

</html>