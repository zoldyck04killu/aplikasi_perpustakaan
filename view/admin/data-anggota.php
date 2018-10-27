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
        <th>Id Anggota</th>
        <th>Nama</th>
        <th>Jurusan</th>
        <th>Jenis Kelamin</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Status</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
          <a href="?view=edit-anggota" class="btn btn-sm btn-warning">Edit</a>
          <a href="" class="btn btn-sm btn-danger">Hapus</a>

        </td>
      </tr>
    </tbody>
    </table>
</div>
