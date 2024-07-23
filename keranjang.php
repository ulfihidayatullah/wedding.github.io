<?php
session_start();
include 'koneksi/koneksi.php';
if (isset($_SESSION['kd_cs'])) {

    $kode_cs = $_SESSION['kd_cs'];
}

if (isset($_POST['submit1'])) {
    $id_keranjang = $_POST['id'];
    $qty = $_POST['qty'];;

    $edit = mysqli_query($conn, "UPDATE keranjang SET qty = '$qty' where id_keranjang = '$id_keranjang'");
    if ($edit) {
        echo "
		<script>
		alert('KERANJANG BERHASIL DIPERBARUI');
		window.location = 'keranjang.php';
		</script>
		";
    }
} else if (isset($_GET['del'])) {
    $id_keranjang = $_GET['id'];
    $del = mysqli_query($conn, "DELETE FROM keranjang WHERE id_keranjang = '$id_keranjang'");
    if ($del) {
        echo "
		<script>
		alert('1 PRODUK DIHAPUS');
		window.location = 'keranjang.php';
		</script>
		";
    }
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
    <div class="container" style="padding-bottom: 150px; margin-top:130px">
        <h2 style=" width: 100%; border-bottom: 4px solid #b89e14"><b>Keranjang</b></h2>
        <table class="table table-striped text-dark">
            <?php
            if (isset($_SESSION['user'])) {
                $kode_cs = $_SESSION['kd_cs'];
                // CEK JUMLAH KERANJANG
                $cek = mysqli_query($conn, "SELECT * FROM keranjang WHERE kode_customer = '$kode_cs'");
                $jml = mysqli_num_rows($cek);

                if ($jml > 0) {
            ?>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Image</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Qty</th>
                            <th scope="col">SubTotal</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <?php
                    if (isset($_SESSION['kd_cs'])) {
                        $kode_cs = $_SESSION['kd_cs'];

                        $result = mysqli_query($conn, "SELECT k.id_keranjang as keranjang, k.kode_produk as kd, k.nama_produk as nama, k.qty as jml, p.image as gambar, p.harga as hrg FROM keranjang k join produk p on k.kode_produk=p.kode_produk WHERE kode_customer = '$kode_cs'");
                        $no = 1;
                        $hasil = 0;

                        while ($row = mysqli_fetch_assoc($result)) {
                            $total = $row['hrg'] * $row['jml'];
                    ?>
                            <tbody>
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row['keranjang']; ?>">
                                    <input type="hidden" name="total" value="<?php echo $total; ?>">
                                    <tr>
                                        <th scope="row"><?= $no; ?></th>
                                        <td><img src="image/produk/<?= $row['gambar']; ?>" width="100"></td>
                                        <td><?= $row['nama']; ?></td>
                                        <td>Rp.<?= number_format($row['hrg']); ?></td>
                                        <td><input type="number" name="qty" class="form-control" style="text-align: center;" value="<?= $row['jml']; ?>"></td>
                                        <td>Rp.<?= number_format($total); ?></td>

                                        <td>
                                            <button type="submit" name="submit1" class="btn btn-warning">Update</button>
                                        </td>
                                        <td>
                                            <a href="keranjang.php?del=1&id=<?= $row['keranjang']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin dihapus ?')">Delete</a>
                                        </td>
                                    </tr>
                                </form>
                        <?php
                            $sub = $row['hrg'] * $row['jml'];
                            $hasil += $sub;
                            $no++;
                        }
                    }
                        ?>
                        <tr>
                            <td colspan="8" style="text-align: right; font-weight: bold;">Grand Total =
                                Rp.<?= number_format($hasil); ?></td>
                        </tr>
                        <tr>
                            <td colspan="8" style="text-align: right; font-weight: bold;"><a href="index.php" class="btn btn-success">Lanjutkan Belanja</a> <a href="checkout.php?kode_cs=<?= $kode_cs; ?>" class="btn btn-primary">Checkout</a>
                            </td>
                        </tr>
                <?php
                } else {
                    echo "
                    <tr>
                    <th scope='col'>No</th>
                    <th scope='col'>Image</th>
                    <th scope='col'>Nama</th>
                    <th scope='col'>Harga</th>
                    <th scope='col'>Qty</th>
                    <th scope='col'>SubTotal</th>
                    <th scope='col'>Action</th>
                    </tr>
                    <tr>
                    <td colspan='7' class='text-center bg-warning'><h5><b>KERANJANG BELANJA ANDA KOSONG </b></h5></td>
                    </tr>
                    ";
                }
            } else {
                echo "<tr>
                <td colspan='7' class='text-center bg-danger'><h5><b>SILAHKAN LOGIN TERLEBIH DAHULU SEBELUM BERBELANJA</b></h5></td>
                </tr>";
            }
                ?>
                            </tbody>
        </table>
    </div>

    <?php
    if (isset($_POST['submit1'])) {
        $id_keranjang = $_POST['id'];
        $qty = $_POST['qty'];
        $total = $_POST['total'];

        $update = mysqli_query($conn, "UPDATE keranjang SET qty = '$qty', total = '$total' WHERE id_keranjang = '$id_keranjang'");

        if ($update) {
            echo "<script>alert('Keranjang berhasil diperbarui');window.location='keranjang.php';</script>";
        } else {
            echo "<script>alert('Keranjang gagal diperbarui');</script>";
        }
    }
    ?>


    <!-- End Container -->

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