<?php
include 'header.php';
include '../koneksi/koneksi.php';
?>

<div class="container">
    <h2 style=" width: 100%; border-bottom: 4px solid gray"><b>Pembayaran</b></h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Invoice</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Email</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Bukti Pembayaran</th>
                <th scope="col">Metode Pembayaran</th>
                <th scope="col">Tanggal Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Sesuaikan query dengan join tabel pembayaran dan produksi
            $query = "
                SELECT 
                    p.invoice, 
                    p.nama_lengkap, 
                    p.email, 
                    pr.total AS total_pembayaran, 
                    p.image, 
                    p.metode, 
                    pr.order_date 
                FROM pembayaran p
                JOIN produksi pr ON p.invoice = pr.invoice
            ";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?= htmlspecialchars($row['invoice']); ?></td>
                <td><?= htmlspecialchars($row['nama_lengkap']); ?></td>
                <td><?= htmlspecialchars($row['email']); ?></td>
                <td>Rp.<?= number_format($row['total_pembayaran']); ?></td>
                <td><img src="../image/bayar/<?= htmlspecialchars($row['image']); ?>" width="100"></td>
                <td><?= htmlspecialchars($row['metode']); ?></td>
                <td><?= htmlspecialchars($row['order_date']); ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<!-- Button trigger modal -->

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php
include 'footer.php';
?>