<?php
session_start();
include '../koneksi/koneksi.php';
if (!isset($_SESSION['admin'])) {
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>LATINU.EO BY LATINUFUS</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <style>

    </style>
</head>

<body>
    <nav class="navbar navbar-default navbar-expand-lg">
        <div class="container-nav">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbarNavDropdown" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">LATINU.EO BY LATINUFUS</a>
            </div>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false"><i class="glyphicon glyphicon-folder-close"></i> Data Master <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="m_produk.php">Master Produk</a></li>
                            <li><a href="m_customer.php">Master Customer</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false"><i class="glyphicon glyphicon-retweet"></i> Data Transaksi <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="produksi.php">Produksi</a></li>
                            <li><a href="detailpembayaran.php">Pembayaran</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false"><i class="glyphicon glyphicon-stats"></i> Laporan <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="laporan_penjualan.php">Laporan Penjualan</a></li>
                            <li><a href="laporan_profit.php">Laporan Profit</a></li>
                            <li><a href="laporan_omset.php">Laporan Omset</a></li>
                            <li><a href="laporan_pembatalan.php">Laporan Pembatalan </a></li>
                        </ul>
                    </li>
                    <li><a href="halaman_utama.php">Dashboard</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false"><i class="glyphicon glyphicon-cog"></i> Pemeliharaan <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="../DATABASE/backup.php">Backup Database</a></li>
                            <li><a href="../DATABASE/retrieve.php">Retrieve Database</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false"><i class="glyphicon glyphicon-user"></i> Admin <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="proses/logout.php">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>