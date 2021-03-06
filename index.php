<?php
// require_once 'config/autoload.php';

require_once 'config/config.php';
require_once 'config/connection.php';
include('models/pengunjung.php');
include('models/admin.php');
$obj = new Connection($host, $user, $pass, $db);
$objPengunjung = new Pengunjung($obj);
$objAdmin = new Admin($obj);
?>

<html lang="en" dir="ltr">
  <head>

    <title></title>

    <link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/home.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/DataTables/datatables.min.css"/>

    <script src="<?php echo base_url(); ?>assets/jquery-3.1.1.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> -->

    <script src="<?=base_url();?>assets/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/DataTables/datatables.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
  </head>
  <body>
    <!-- Image and text -->
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand">
        <img class="nameHeader" src="<?=base_url();?>assets/image/LOGOSTMIKINDONESIABANJARMASIN.png" width="60" height="60" class="d-inline-block align-top " alt="">
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
              <a class="nav-link" href="?view=cari-buku">Cari Buku</a>
            </li>
            <?php if (@$_SESSION['user'] || @$_SESSION['nip']) { ?>
            <li class="nav-item">
                <a class="nav-link" href="?view=logout-admin">Log Out</a>
              <?php } else { ?>
                <a class="nav-link" href="?view=login-admin">Login Admin</a>
                <li class="nav-item">
                  <a class="nav-link" href="?view=login-petugas">Login Petugas</a>
                </li>
            </li>
          <?php } ?>

            <?php if (@$_SESSION['nip'] || @$_SESSION['user']) { ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Data Anggota
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="?view=input-anggota">Input Anggota</a>
                    <a class="dropdown-item" href="?view=data-anggota">Data Anggota</a>
                  </div>
                </li>
        <?php if (@$_SESSION['user']) { ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Data Petugas
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="?view=input-petugas">Input Petugas</a>
                    <a class="dropdown-item" href="?view=data-petugas">Data Petugas</a>
                  </div>
                </li>
        <?php } ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Data Buku
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="?view=input-buku">Input Buku</a>
                    <a class="dropdown-item" href="?view=data-buku">Data Buku</a>
                    <!-- <a class="dropdown-item" href="?view=input-Klasifikasi-buku">Input Klasifikasi Buku</a> -->
                    <!-- <a class="dropdown-item" href="?view=data-Klasifikasi-buku">Klasifikasi Buku</a> -->
                  </div>
                </li>
            <?php if (@$_SESSION['nip']) { ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Transaksi
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="?view=peminjaman1">Peminjaman</a>
                    <a class="dropdown-item" href="?view=daftar-peminjam">Pengembalian</a>
                  </div>
                </li>
              <?php } ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Laporan
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="?view=data-pengunjung">Laporan Data Pengunjung</a>
                    <a class="dropdown-item" href="?view=grafik-pengunjung">Laporan Grafik Pengunjung</a>
                    <a class="dropdown-item" href="view/laporan/laporan-data-anggota.php">Laporan Data Anggota</a>
                    <a class="dropdown-item" href="view/laporan/laporan-data-petugas.php">Laporan Data Petugas</a>
                    <a class="dropdown-item" href="view/laporan/laporan-data-buku.php">Laporan Data Buku</a>
                    <!-- <a class="dropdown-item" href="view/laporan/laporan-klasifikasi-anggota.php">Laporan Klasifikasi Buku</a> -->
                    <a class="dropdown-item" href="view/laporan/laporan-peminjaman.php">Laporan Peminjaman</a>
                  </div>
                </li>
        <?php if (@$_SESSION['user']) { ?>
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
              <?php } ?>
            <?php } ?>
          </ul>
        </div>
      </nav>

    <?php include('page/page.php'); ?>

  </body>
  <script type="text/javascript">
      $(document).ready( function () {
        $('#table').DataTable();
      } );
  </script>
</html>
