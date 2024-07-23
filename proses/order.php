<?php
include '../koneksi/koneksi.php';



$kd_cs = $_POST['kode_cs'];
$nama = $_POST['nama'];
$provinsi = $_POST['provinsi'];
$kota = $_POST['kota'];
$alamat = $_POST['alamat'];
$kode_pos = $_POST['kode_pos'];
$tanggal = date('Y-m-d');
$subtotal = $_POST['subtotal'];
$total = $_POST['total'];



// Mengambil invoice terbaru
$kode = mysqli_query($conn, "SELECT invoice FROM produksi ORDER BY invoice DESC LIMIT 1");
if (mysqli_num_rows($kode) > 0) {
	$data = mysqli_fetch_assoc($kode);
	$num = substr($data['invoice'], 3);
	$add = (int) $num + 1;
} else {
	$add = 1; // Jika tidak ada data sebelumnya, dimulai dari 1
}

// Format invoice
if ($add < 10) {
	$format = "INV000" . $add;
} else if ($add < 100) {
	$format = "INV00" . $add;
} else if ($add < 1000) {
	$format = "INV0" . $add;
} else {
	$format = "INV" . $add;
}

// Memindahkan barang dari keranjang ke produksi
$keranjang = mysqli_query($conn, "SELECT * FROM keranjang WHERE kode_customer = '$kd_cs'");
while ($row = mysqli_fetch_assoc($keranjang)) {
	$kd_produk = $row['kode_produk'];
	$nama_produk = $row['nama_produk'];
	$qty = $row['qty'];
	$harga = $row['harga'];
	$status = "Pending";

	// Query INSERT INTO dengan kolom yang sesuai
	$order = mysqli_query($conn, "INSERT INTO produksi (invoice, kode_customer, kode_produk, nama_produk, qty, harga,total, status, order_date, provinsi, kota, alamat, kode_pos, terima, tolak, cek) 
        VALUES ('$format', '$kd_cs', '$kd_produk', '$nama_produk', '$qty', '$harga','$total', '$status', '$tanggal', '$provinsi', '$kota', '$alamat', '$kode_pos', '0', '0', '0')");
}

// Menghapus barang dari keranjang setelah dipindahkan ke produksi
$del_keranjang = mysqli_query($conn, "DELETE FROM keranjang WHERE kode_customer = '$kd_cs'");

if ($del_keranjang) {
	header("location:../selesai.php");
} else {
	echo "Gagal menghapus keranjang: " . mysqli_error($conn);
}