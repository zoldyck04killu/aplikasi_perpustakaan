
<div class="header-hal">
    <h1>Cari Buku</h1>
    <hr>
</div>
<div class="daftar-table">
    <table class="table table-striped text-center" id="table">
      <thead>
      <tr>
        <th>No</th>
        <th>Kode Buku</th>
        <th>Judul Buku</th>
        <th>Pengarang</th>
        <th>Penerbit</th>
        <th>Tahun Terbit</th>
        <th>LSBN</th>
        <th>Jumlah Buku</th>
        <th>Klasifikasi</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $data = $objAdmin->showBuku();
      $no = 1;
      while ($a = $data->fetch_object()) {
      ?>
      <tr>
        <td><?= $no; ?></td>
        <td><?= $a->kd_buku; ?></td>
        <td><?= $a->jdl_buku; ?></td>
        <td><?= $a->pengarang; ?></td>
        <td><?= $a->penerbit; ?></td>
        <td><?= $a->thn_terbit; ?></td>
        <td><?= $a->lsbn; ?></td>
        <td><?= $a->jml_buku; ?></td>
        <td><?= $a->klasifikasi; ?></td>
        <td>
          <div class="btn-group" role="group">
            <a href="?view=view-buku&kd_buku=<?=$a->kd_buku; ?>" class="btn btn-sm btn-success">View</a>
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
