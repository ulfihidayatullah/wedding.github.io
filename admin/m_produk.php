<?php
include 'header.php';
?>

<div class="container mt-5">
    <h2 class=" mb-4" style="border-bottom: 4px solid gray"><b>Master Produk</b></h2>
    <table class="table table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Produk</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Image</th>
                <th scope="col">Harga</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM produk");
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $row['kode_produk']; ?></td>
                <td><?= $row['nama'];  ?></td>
                <td><img src="../image/produk/<?= $row['image']; ?>" class="img-thumbnail" width="100"></td>
                <td>Rp.<?= number_format($row['harga']);  ?></td>
                <td>
                    <a href="edit_produk.php?kode=<?= $row['kode_produk']; ?>" class="btn btn-warning btn-sm"><i
                            class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="proses/del_produk.php?kode=<?= $row['kode_produk']; ?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin Ingin Menghapus Data ?')"><i
                            class="glyphicon glyphicon-trash"></i> Hapus</a>
                </td>
            </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
    </table>
    <div>
        <a href="tm_produk.php" class="btn btn-success btn-lg"><i class="glyphicon glyphicon-plus-sign"></i> Tambah
            Produk</a>
    </div>
</div>


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