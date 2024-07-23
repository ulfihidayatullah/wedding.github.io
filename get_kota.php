<?php
include 'koneksi/koneksi.php';

if (isset($_POST['provinsi_id'])) {
    $provinsi_id = $_POST['provinsi_id'];
    $query = mysqli_query($conn, "SELECT * FROM kota WHERE provinsi_id = '$provinsi_id'");
    echo '<option value="">Pilih Kota/Kabupaten</option>';
    while ($row = mysqli_fetch_assoc($query)) {
        echo '<option value="' . $row['id'] . '">' . $row['nama_kota'] . '</option>';
    }
}
