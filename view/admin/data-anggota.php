<script type="text/javascript">
    $(document).ready( function () {
      $('#table').DataTable();
    } );
</script>


<div class="header-hal">
    <h1>DATA ANGGOTA</h1>
    <hr>
</div>
<div class="daftar-table">
    <table class="table table-striped text-center" id="table">
      <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Jurusan</th>
        <th>Jenis Kelamin</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Status</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <?php
    $data = $objAdmin->showAnggota();
    $no = 1;
    while ($a = $data->fetch_object()) {
    ?>
    <tbody>
      <tr>
        <td><?= $no ?></td>
        <td><?= $a->nama_anggota; ?></td>
        <td><?= $a->jurusan; ?></td>
        <td><?= $a->jenkel; ?></td>
        <td><?= $a->tmp_lahir; ?></td>
        <td><?= $a->tgl_lahir; ?></td>
        <td><?= $a->status; ?></td>
        <td>
          <a href="?view=edit-anggota" class="btn btn-sm btn-warning">Edit</a>
          <a href="" class="btn btn-sm btn-danger">Hapus</a>

        </td>
      </tr>
    </tbody>
    <?php
    $no++;
    }
    ?>
    </table>
</div>
