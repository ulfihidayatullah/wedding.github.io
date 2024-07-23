<?php
include '../koneksi/koneksi.php';
if (isset($_GET['invoice'])) {
    $invoice = $_GET['invoice'];

    // Ambil data pembayaran berdasarkan invoice
    $query = mysqli_query($conn, "SELECT * FROM pembayaran WHERE invoice = '$invoice'");
    $data = mysqli_fetch_assoc($query);

    if ($data) {
        // Ambil data dari tabel produksi untuk total dan tanggal
        $produksi_query = mysqli_query($conn, "SELECT * FROM produksi WHERE invoice = '$invoice'");
        $produksi_data = mysqli_fetch_assoc($produksi_query);

        if ($produksi_data) {
            $total = $produksi_data['total'];
            $tanggal_pembayaran = $produksi_data['order_date'];
        } else {
            $total = 'Tidak Ditemukan';
            $tanggal_pembayaran = 'Tidak Ditemukan';
        }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Bukti Pembayaran</title>
    <style>
    /* Styling */
    </style>
</head>

<body>
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        width: 80%;
        margin: auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background: #f9f9f9;
    }

    .header,
    .footer {
        text-align: center;
        margin-bottom: 20px;
    }

    .details {
        margin-bottom: 20px;
    }

    .details table {
        width: 100%;
        border-collapse: collapse;
    }

    .details table,
    .details th,
    .details td {
        border: 1px solid #ddd;
    }

    .details th,
    .details td {
        padding: 10px;
        text-align: left;
    }
    </style>
    <div class="container">
        <div class="header">
            <div class="row"></div>
            <div class="col-md-6">
                <img style="width: 50px; height:50px" src="../image/home/Logo Latinu.EO.PNG" alt="">
                <h1>LATINU.EO BY LATINUFUS</h1>
            </div>
            <h1>Bukti Pembayaran</h1>
            <p>Invoice: <?= htmlspecialchars($data['invoice']); ?></p>
        </div>

        <div class="details">
            <table>
                <tr>
                    <th>Nama Lengkap</th>
                    <td><?= htmlspecialchars($data['nama_lengkap']); ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= htmlspecialchars($data['email']); ?></td>
                </tr>
                <tr>
                    <th>Total Pembayaran</th>
                    <td>Rp. <?= number_format($total); ?></td>
                </tr>
                <tr>
                    <th>Metode Pembayaran</th>
                    <td><?= htmlspecialchars($data['metode']); ?></td>
                </tr>
                <tr>
                    <th>Tanggal Pembayaran</th>
                    <td><?= htmlspecialchars($tanggal_pembayaran); ?></td>
                </tr>
            </table>
        </div>

        <div class="footer">
            <button onclick="window.print()">Cetak Bukti Pembayaran</button>
        </div>
    </div>
</body>

</html>
<?php
    } else {
        echo "<h2>Data tidak ditemukan</h2>";
    }
} else {
    echo "<h2>Parameter tidak lengkap</h2>";
}
?>