
<div class="header-hal">
    <h1>DATA PENGUNJUNG</h1>
    <hr>
</div>
<div class="left">
</div>
<a href="view/laporan/laporan-pengunjung.php" style="position: relative; left:1%;" class="btn btn-sm btn-primary">Cetak</a>
<div class="daftar-table">
    <table class="table table-striped text-center" id="table">
      <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Status</th>
        <th>Kategori</th>
        <th>NRP</th>
        <th>Jurusan</th>
        <th>Jenis Kelamin</th>
        <th>Tgl Masuk</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $data = $objAdmin->dataPengunjung();
      $no = 1;
      while ($a = $data->fetch_object()) {
      ?>
      <tr>
        <td><?= $no; ?></td>
        <td><?= $a->nama; ?></td>
        <td><?= $a->status; ?></td>
        <?php if ($a->kategori == 1): ?>
          <td>Mahasiswa</td>
        <?php elseif ($a->kategori == 2) : ?>
          <td>Dosen</td>
        <?php endif; ?>
        <td><?= $a->nrp; ?></td>
        <td><?= $a->jurusan; ?></td>
        <td><?= $a->jekel; ?></td>
        <td><?= $a->tgl_entry; ?></td>
        <td>
          <div class="btn-group" role="group">
          <a href="?view=hapus-pengunjung&kd=<?=$a->id_pengunjung; ?>" class="btn btn-sm btn-danger">Hapus</a>
          </div>
        </td>
      </tr>
      <?php
      $no++;
      }
      ?>
    </tbody>
      </table>
</div>
