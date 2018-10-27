<script type="text/javascript">
    $(document).ready( function () {
      $('#table').DataTable();
    } );
</script>


<div class="header-hal">
    <h1>DATA BUKU</h1>
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
        <th>ISBN</th>
        <th>Jumlah Buku</th>
        <th>Klasifikasi</th>
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
        <td></td>
        <td>
          <a href="" class="btn btn-sm btn-success">View</a>
          <a href="?view=edit-buku" class="btn btn-sm btn-warning">Edit</a>
          <a href="" class="btn btn-sm btn-danger">Hapus</a>
        </td>
      </tr>
    </tbody>
    </table>
</div>
