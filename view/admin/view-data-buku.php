<?php

  $id = $_GET['kd_buku'];
  $data = $objAdmin->viewBuku($id);
  $a = $data->fetch_object();
?>
<center>
  <div class="view-buku">
    <div class="isi-buku">
      <center>
      <h2>
        <?= $a->jdl_buku ?>
      </h2>
      </center>
      <h5>Sinopsis</h5>
      <p>
        <?= $a->sinopsis ?>
      </p>
    </div>

<hr>

      <table>
        <tr>
          <td style="color:#d27141">Deskripsi</td>
        </tr>
        <tr>
          <td>Judul</td>
          <td>:</td>
          <td><?= $a->jdl_buku ?></td>
        </tr>
        <tr>
          <td>Pengarang</td>
          <td>:</td>
          <td><?= $a->pengarang ?></td>
        </tr>
        <tr>
          <td>Penerbit</td>
          <td>:</td>
          <td><?= $a->penerbit ?></td>
        </tr>
        <tr>
          <td>Tahun Terbit</td>
          <td>:</td>
          <td><?= $a->thn_terbit ?></td>
        </tr>
        <tr>
          <td>ISBN</td>
          <td>:</td>
          <td><?= $a->lsbn ?></td>
        </tr>
        <tr>
          <td>Jumlah Buku</td>
          <td>:</td>
          <td><?= $a->jml_buku ?></td>
        </tr>
        <tr>
          <td>Klasifikasi</td>
          <td>:</td>
          <td><?= $a->klasifikasi ?></td>
        </tr>
        <tr>
          <td>Tanggal Entry</td>
          <td>:</td>
          <td><?= $a->tgl_entry ?></td>
        </tr>
      </table>
  </div>
</center>
