<?php
require_once 'config/config.php';
require_once 'config/connection.php';
$obj = new Connection($host, $user, $pass, $db);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/home.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/DataTables/datatables.min.css"/>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="<?= base_url()?>assets/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/DataTables/datatables.min.js"></script>

  </head>
  <body>
    <!-- Image and text -->
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand">
        <img class="nameHeader" src="<?= base_url()?>assets/image/LOGOSTMIKINDONESIABANJARMASIN.png" width="60" height="60" class="d-inline-block align-top " alt="">
        <div class="nameHeader">
            Perpustakaan STMIK INDONESIA BANJARMASIN<br>
            <i>Jln. Pangeran Hidayatullah</i>
        </div>
      </a>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="?view=home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Cari Buku</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?view=login-admin">Login Admin</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Data Anggota
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="?view=input-anggota">Input Anggota</a>
                <a class="dropdown-item" href="?view=data-anggota">Data Anggota</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Data Petugas
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="?view=input-petugas">Input Petugas</a>
                <a class="dropdown-item" href="?view=data-petugas">Data Petugas</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Data Buku
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="?view=input-buku">Input Buku</a>
                <a class="dropdown-item" href="?view=data-buku">Data Buku</a>
                <a class="dropdown-item" href="?view=input-detail-buku">Input Detail Buku</a>
                <a class="dropdown-item" href="?view=detail-buku">Detail Buku</a>
                <a class="dropdown-item" href="?view=input-Klasifikasi-buku">Input Klasifikasi Buku</a>
                <a class="dropdown-item" href="?view=data-Klasifikasi-buku">Klasifikasi Buku</a>

              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Transaksi
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="?view=peminjaman1">Peminjaman</a>
                <a class="dropdown-item" href="?view=daftar-peminjam">Pengembalian</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Laporan
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Laporan Data Pengunjung</a>
                <a class="dropdown-item" href="#">Laporan Grafik Pengunjung</a>
                <a class="dropdown-item" href="#">Laporan Data Anggota</a>
                <a class="dropdown-item" href="#">Laporan Data Petugas</a>
                <a class="dropdown-item" href="#">Laporan Data Buku</a>
                <a class="dropdown-item" href="#">Laporan Detil Buku</a>
                <a class="dropdown-item" href="#">Laporan Klasifikasi Buku</a>
                <a class="dropdown-item" href="#">Laporan Peminjaman</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Konfigurasi
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="?view=tambah-admin">Tambah Admin</a>
                <a class="dropdown-item" href="?view=edit-pass">Ubah Password</a>
                <a class="dropdown-item" href="#">LogOut</a>

              </div>
            </li>

          </ul>
        </div>
      </nav>

    <?php include('page/page.php'); ?>

  </body>
</html>
