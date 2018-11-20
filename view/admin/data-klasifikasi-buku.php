<script type="text/javascript">
    $(document).ready( function () {
      $('#table').DataTable();
    } );
</script>


<div class="header-hal">
    <h1>DATA KLASIFIKASI BUKU</h1>
    <hr>
</div>
<div class="daftar-table">
    <table class="table table-striped text-center" id="table">
      <thead>
      <tr>
        <th>No</th>
        <th>Klasifikasi</th>
        <th>Kode</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <?php
    $data = $objAdmin->showKlasifikasi();
    $no = 1;
    while ($a = $data->fetch_object()) {
    ?>
    <tbody>
      <tr>
        <td style="text-align:center"><?= $no; ?></td>
        <td style="text-align:center"><?= $a->klasifikasi; ?></td>
        <td style="text-align:center"><?= $a->kode; ?></td>
        <td style="text-align:center">
          <a href="?view=edit-Klasifikasi-buku&kd=<?= $a->id; ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="?view=hapus-Klasifikasi-buku&kd=<?= $a->id; ?>" class="btn btn-sm btn-danger">Hapus</a>

        </td>
      </tr>
    </tbody>
    <?php
    $no++;
    }
    ?>
    </table>
</div>
