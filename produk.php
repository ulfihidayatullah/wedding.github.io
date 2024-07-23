<?php
session_start();
include 'koneksi/koneksi.php';

// Define the number of results per page
$results_per_page = 6;

// Find out the number of results stored in database
$sql = "SELECT * FROM produk";
$result = mysqli_query($conn, $sql);
$number_of_results = mysqli_num_rows($result);

// Determine the number of total pages available
$number_of_pages = ceil($number_of_results / $results_per_page);

// Determine which page number visitor is currently on
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

// Determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page - 1) * $results_per_page;

// Retrieve selected results from database and display them on page
$sql = "SELECT * FROM produk LIMIT " . $this_page_first_result . ',' . $results_per_page;
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Wdding</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="asset/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="asset/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="asset/css/style.css" rel="stylesheet">

    <style>
        .product-card {
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            overflow: hidden;
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .product-card img {
            border-radius: 10px 10px 0 0;
            width: 100%;
            height: auto;
        }

        .product-card .card-body {
            padding: 15px;
        }

        .product-card h3,
        .product-card h4 {
            color: #343a40;
            margin-bottom: 15px;
        }

        .product-card .btn {
            border-radius: 20px;
        }

        .pagination .page-item .page-link {
            margin: 0 5px;
        }
    </style>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="51">
    <!-- Navbar Start -->

    <?php include "navbar.php" ?>
    <!-- Navbar End -->

    <!-- Container -->
    <div class="container" style="margin-top: 130px;">
        <h2 class="text-center" style="width: 100%; border-bottom: 4px solid #b89e14"><b>Produk Kami</b></h2>

        <div class="row mt-5">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="col-sm-6 col-md-4 mb-4">
                    <div class="card product-card">
                        <img src="image/produk/<?= $row['image']; ?>" class="img-fluid" alt="<?= $row['nama']; ?>">
                        <div class="card-body">
                            <h3 class="h5"><?= $row['nama']; ?></h3>
                            <h4 class="h6 text-muted">Rp.<?= number_format($row['harga']); ?></h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="detail_produk.php?produk=<?= $row['kode_produk']; ?>" class="btn btn-warning btn-block">Detail</a>
                                </div>
                                <?php if (isset($_SESSION['kd_cs'])) { ?>
                                    <div class="col-md-6">
                                        <a href="proses/add.php?produk=<?= $row['kode_produk']; ?>&kd_cs=<?= $kode_cs; ?>&hal=1" class="btn btn-success btn-block" role="button">
                                            <i class="glyphicon glyphicon-shopping-cart"></i> Tambah
                                        </a>
                                    </div>
                                <?php } else { ?>
                                    <div class="col-md-6">
                                        <a href="keranjang.php" class="btn btn-success btn-block" role="button">
                                            <i class="glyphicon glyphicon-shopping-cart"></i> Tambah
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- Pagination -->
        <nav>
            <ul class="pagination justify-content-center">
                <?php if ($page > 1) { ?>
                    <li class="page-item"><a class="page-link" href="produk.php?page=<?= $page - 1; ?>">&laquo;</a></li>
                <?php } ?>

                <?php for ($i = 1; $i <= $number_of_pages; $i++) { ?>
                    <li class="page-item <?= ($i == $page) ? 'active' : ''; ?>"><a class="page-link" href="produk.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                <?php } ?>

                <?php if ($page < $number_of_pages) { ?>
                    <li class="page-item"><a class="page-link" href="produk.php?page=<?= $page + 1; ?>">&raquo;</a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
<!-- Footer Start -->
<?php
include 'footer.php';
?>
<!-- Footer End -->

</html>