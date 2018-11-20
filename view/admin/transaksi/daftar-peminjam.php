<script type="text/javascript">
    $(document).ready( function () {
      $('#table').DataTable();
    } );
</script>


<div class="header-hal">
    <h1>DAFTAR PEMINJAM</h1>
    <hr>
</div>
<div class="daftar-table">
    <table class="table table-striped text-center" id="table" class="display">
      <thead>
      <tr>
        <th>No</th>
        <th>Id Anggota</th>
        <th>Nama</th>
        <th>Kode Buku</th>
        <th>Judul BUku</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Denda</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <?php
    $data = $objAdmin->showPeminjaman();
    $no = 1;
    $b = $data->fetch_array();
    // var_dump(array_unique($data->fetch_array()));
    // echo count($a);
    // $a = $data->fetch_object();
    // var_dump($b);
    // var_dump(unique($b));
    // var_dump($b);
    while ($a = $data->fetch_array()) {
    ?>
    <tbody>
      <tr>
        <td><?= $no; ?></td>
        <td><?= $a['id_anggota']; ?></td>
        <td><?= $a['nama_anggota']; ?></td>
        <td><?= $a['kd_buku']; ?></td>
        <td><?= $a['jdl_buku']; ?></td>
        <td><?= $a['tgl_pinjam']; ?></td>
        <td><?= $a['tgl_kembali']; ?></td>
        <td>denda</td>

        <td>
          <a href="?view=pengembalian&no=<?= $a['no_pinjaman'] ?>" class="btn btn-sm btn-success">Dikembalikan</a>

        </td>
      </tr>
    </tbody>
    <?php
    $no++;
    }
    ?>
    </table>
</div>
