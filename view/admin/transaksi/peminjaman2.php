<div class="header-hal">
    <h1>PEMINJAMAN</h1>
    <hr>
</div>

<?php
$data = $objAdmin->showAnggota($_POST['id_anggota']);
$no = 1;
$a = $data->fetch_object();
?>
<div class="form" >
    <form method="post">
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Id Anggota</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Id Anggota" value="<?= $a->id_anggota; ?>" disabled >
            <input class="form-control" type="hidden" placeholder="Id Anggota" name="id_anggota" value="<?= $a->id_anggota; ?>" >
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nama Anggota</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Nama Anggota"  value="<?= $a->nama_anggota; ?>" disabled>
            <input class="form-control" type="hidden" placeholder="Nama Anggota" name="nama_anggota" value="<?= $a->nama_anggota; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">NIP Petugas</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Nip" name="nip" value="<?= $_SESSION['nip']; ?>" readonly>
        </div>
      </div>

      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
        <div class="col-sm-10">
            <input class="form-control" type="date" placeholder="" id="tanggal_pinjam" name="tgl_pinjam" value="<?=date('Y-m-d')?>">
        </div>
      </div>
      <?php
      $dayToday = date('Y-m-d');
      $tanggal_kembali = date('Y-m-d', strtotime('+8 days', strtotime($dayToday))); //operasi penjumlahan tanggal sebanyak 6 hari
      ?>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal Kembali</label>
        <div class="col-sm-10">
            <input class="form-control" type="date" placeholder="" name="tgl_kembali" id="tanggal_kembali" value="<?= $tanggal_kembali ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Jumlah Pinjam</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Jumlah Pinjam" id="jlh_pinjam">
        </div>
      </div>
      <script type="text/javascript">
      $(document).ready(function(){
          $("#jlh_pinjam").focusout(function(){
            var jlh_pinjam = document.getElementById('jlh_pinjam').value;
            var input_kode_buku = '<div class="form-group row"><label for="staticEmail" class="col-sm-2 col-form-label">Kode Buku</label><div class="col-sm-10"><input name="kode[i]" class="form-control" type="text" placeholder="Kode Detail Buku"></div></div>'
            for (var i = 0; i < jlh_pinjam; i++) {
              $("#input_kode_buku").append('<div class="form-group row"><label for="staticEmail" class="col-sm-2 col-form-label">Kode Buku</label><div class="col-sm-10"><input name="kode['+i+']" class="form-control" type="text" placeholder="Kode Detail Buku"></div></div>');
            }
          });
      });
      </script>
      <div id="input_kode_buku"></div>
      <!-- <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Kode Detail Buku</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Kode Detail Buku">
        </div>
      </div> -->



      <button type="submit" class="btn btn-primary" name="savePeminjaman">Simpan</button>

    </form>
    <br>
    <hr class="for-table">
    <h3>Daftar Buku DiPinjam</h3>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Kode Buku</th>
            <th scope="col">Judul Buku</th>
            <th scope="col">Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $data = $objAdmin->showPeminjaman();
          $no = 1;
          while ($a = $data->fetch_object()) {
          ?>
          <tr>
            <th scope="row">1</th>
            <td><?= $a->kd_buku; ?></td>
            <td><?= $a->jdl_buku; ?></td>
            <td>
              <a href="" class="btn btn-sm btn-danger">Hapus</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
    </table>
</div>

<?php
if (isset($_POST['savePeminjaman'])) {
    $id_anggota = $_POST['id_anggota'];
    $nama_anggota = $_POST['nama_anggota'];
    $nip = $_POST['nip'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $kode = $_POST['kode'];

    $jlh_kode = count($kode);
    // var_dump($kode);
    // die();
    if ($jlh_kode > 1) {
      for ($i=0; $i < $jlh_kode ; $i++) {
        $id_buku = $kode[$i];
        $objAdmin->kurangiBuku($id_buku);
        $savePeminjaman = $objAdmin->savePeminjaman($id_anggota, $nama_anggota, $nip, $tgl_pinjam, $tgl_kembali, $kode[$i]);
      }
    }else{
      $objAdmin->kurangiBuku($kode);
      $savePeminjaman = $objAdmin->savePeminjaman($id_anggota, $nama_anggota, $nip, $tgl_pinjam, $tgl_kembali, $kode);
    }

    if ($savePeminjaman) {
        echo "<script>
        swal(
          'Save Anggota Success!',
          'You clicked the button!',
          'success'
        )
        </script>";
    }else{
      echo "<script>
      swal({
            title: 'Error Save Anggota!',
            text: 'Do you want to continue',
            type: 'error'
          })
      </script>";
    }
}

?>
