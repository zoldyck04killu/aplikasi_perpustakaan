<?php
$date =  date('Y-m-d');
$monthNow = substr($date,5,2);
// echo $monthNow;

$data = $objAdmin->dataPengunjungBulanPria();
$pria = 0;
while ($a = $data->fetch_object()) {
  $monthNowDB = substr($a->tgl_entry,5,2);
  if ($monthNowDB == $monthNow ) {
      $pria++;
  }
}

$data = $objAdmin->dataPengunjungBulanWanita();
$wanita = 0;
while ($a = $data->fetch_object()) {
  $monthNowDB = substr($a->tgl_entry,5,2);
  if ($monthNowDB == $monthNow ) {
      $wanita++;
  }
}

$data = $objAdmin->dataPengunjungBulanDosen();
$dosen = 0;
while ($a = $data->fetch_object()) {
  $monthNowDB = substr($a->tgl_entry,5,2);
  if ($monthNowDB == $monthNow ) {
      $dosen++;
  }
}

$data = $objAdmin->dataPengunjungBulanMHS();
$mhs = 0;
while ($a = $data->fetch_object()) {
  $monthNowDB = substr($a->tgl_entry,5,2);
  if ($monthNowDB == $monthNow ) {
      $mhs++;
  }
}


$data = $objAdmin->dataPengunjungHariPria();
$no = 1;
$a = $data->fetch_object();
$perHariPria = $a->pria;


$data = $objAdmin->dataPengunjungHariWanita();
$no = 1;
$a = $data->fetch_object();
$perHariWanita = $a->wanita;


$data = $objAdmin->dataPengunjungHariDosen();
$no = 1;
$a = $data->fetch_object();
$perHariDosen = $a->dosen;

$data = $objAdmin->dataPengunjungHariMHS();
$no = 1;
$a = $data->fetch_object();
$perHariMhs = $a->mhs;

?>
<div class="header-hal">
    <h1>DATA GRAFIK PENGUNJUNG</h1>
    <hr>
</div>
<div class="left">
</div>
<a href="view/laporan/laporan-grafik-pengunjung.php" style="position: relative; left:1%;" class="btn btn-sm btn-primary">Cetak</a>

<div class="grafik-table">
    Pengunjung Hari Ini Per Jenis Kelamin
    <table class="table table-bordered">
      <thead>
      <tr>
        <th>Laki-Laki</th>
        <th>Perempuan</th>
        <th>Jumlah</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // $data = $objAdmin->dataPengunjung();
      // $no = 1;
      // while ($a = $data->fetch_object()) {
      ?>
      <tr>
        <td><?= $perHariPria ?></td>
        <td><?= $perHariWanita ?></td>
        <td><?= $perHariPria + $perHariWanita  ?></td>

      </tr>
      <?php
      // $no++;
      // }
      ?>
    </tbody>
      </table>
</div>


<div class="grafik-table">
    Pengunjung Hari Ini Per Jenis Pengunjung
    <table class="table table-bordered">
      <thead>
      <tr>
        <th>Mahasiswa</th>
        <th>Dosen</th>
        <th>Jumlah</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // $data = $objAdmin->dataPengunjung();
      // $no = 1;
      // while ($a = $data->fetch_object()) {
      ?>
        <tr>
          <td><?= $perHariMhs ?></td>
          <td><?= $perHariDosen ?></td>
          <td><?= $perHariMhs + $perHariDosen  ?></td>
        </tr>
      <?php
      // $no++;
      // }
      ?>
    </tbody>
      </table>
</div>

<div class="grafik-table">
    Pengunjung Bulan Ini Per Jenis Kelamin
    <table class="table table-bordered">
      <thead>
      <tr>
        <th>Laki-Laki</th>
        <th>Perempuan</th>
        <th>Jumlah</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // $data = $objAdmin->dataPengunjung();
      // $no = 1;
      // while ($a = $data->fetch_object()) {
      ?>
      <tr>
        <td><?= $pria ?></td>
        <td><?= $wanita ?></td>
        <td><?= $pria + $wanita ?></td>

      </tr>
      <?php
      // $no++;
      // }
      ?>
    </tbody>
      </table>
</div>

<div class="grafik-table">
    Pengunjung Bulan Ini Per Jenis Pengunjung
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Mahasiswa</th>
          <th>Dosen</th>
          <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
      <?php
      // $data = $objAdmin->dataPengunjung();
      // $no = 1;
      // while ($a = $data->fetch_object()) {
      ?>
      <tr>
        <td><?= $mhs ?></td>
        <td><?= $dosen ?></td>
        <td><?= $mhs + $dosen ?></td>

      </tr>
      <?php
      // $no++;
      // }
      ?>
    </tbody>
      </table>
</div>
