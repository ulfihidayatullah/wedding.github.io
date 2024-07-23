<?php
include '../koneksi/koneksi.php';

$invoice = $_POST['invoice'];
$nama_lengkap = $_POST['nama_lengkap'];
$email = $_POST['email'];
$total = $_POST['total'];
$metode = $_POST['metode'];
$total = $_POST['order_date'];
$nama_gambar = $_FILES['files']['name'];
$size_gambar = $_FILES['files']['size'];
$tmp_file = $_FILES['files']['tmp_name'];
$error = $_FILES['files']['error'];
$type = $_FILES['files']['type'];

$ekstensiGambar = array('jpg', 'jpeg', 'png');
$ekstensiGambarValid = explode(".", $nama_gambar);
$ekstensiGambarValid = strtolower(end($ekstensiGambarValid));

if (!in_array($ekstensiGambarValid, $ekstensiGambar)) {
    echo "
    <script>
    alert('EKSTENSI GAMBAR HARUS JPG, JPEG, PNG');
    window.location = '../pembayaran.php?invoice=$invoice&total=$total';
    </script>
    ";
    die;
}

if ($size_gambar > 1000000) {
    echo "
    <script>
    alert('UKURAN GAMBAR TERLALU BESAR');
    window.location = '../pembayaran.php?invoice=$invoice&total=$total';
    </script>
    ";
    die;
}

$namaGambarBaru = uniqid();
$namaGambarBaru .= ".";
$namaGambarBaru .= $ekstensiGambarValid;

if (move_uploaded_file($tmp_file, "../image/bayar/" . $namaGambarBaru)) {
    $result = mysqli_query($conn, "INSERT INTO pembayaran (invoice, nama_lengkap, email,image, total, metode,order_date) VALUES ('$invoice', '$nama_lengkap', '$email','$namaGambarBaru', '$total', '$metode','$order_date')");

    if ($result) {
        header("Location: cetak.php?invoice=$invoice");
    } else {
        echo "
        <script>
        alert('PEMBAYARAN GAGAL');
        window.location = '../pembayaran.php?invoice=$invoice&total=$total';
        </script>
        ";
    }
} else {
    echo "
    <script>
    alert('UPLOAD GAMBAR GAGAL');
    window.location = '../pembayaran.php?invoice=$invoice&total=$total';
    </script>
    ";
    die;
}