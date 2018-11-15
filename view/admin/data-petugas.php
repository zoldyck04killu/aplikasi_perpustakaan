<script type="text/javascript">
    $(document).ready( function () {
      $('#table').DataTable();
    } );
</script>


<div class="header-hal">
    <h1>DATA PETUGAS</h1>
    <hr>
</div>
<div class="daftar-table">
    <table class="table table-striped text-center" id="table">
      <thead>
      <tr>
        <th>No</th>
        <th>Nip</th>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Alamat</th>
        <th>jenis Kelamin</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <?php
    $data = $objAdmin->showPetugas();
    $no = 1;
    while ($a = $data->fetch_object()) {
    ?>
    <tbody>
      <tr>
        <td><?= $no; ?></td>
        <td><?= $a->nip; ?></td>
        <td><?= $a->nama_petugas; ?></td>
        <td><?= $a->jabatan; ?></td>
        <td><?= $a->alamat; ?></td>
        <td><?= $a->jenkel; ?></td>

        <td>
          <a href="?view=edit-petugas&nip=<?=$a->nip; ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="?view=hapus-petugas&nip=<?=$a->nip; ?>" class="btn btn-sm btn-danger">Hapus</a>

        </td>
      </tr>
    </tbody>
    <?php
    $no++;
    }
    ?>
    </table>
</div>
