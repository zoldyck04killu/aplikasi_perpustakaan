<div class="header-hal">
    <h1>BUKU TAMU</h1>
    <hr>
</div>

<form class="" action="" method="post">
  <select class="" name="cari_a">
    <option value="1">MAHASISWA</option>
    <option value="2">DOSEN</option>
  </select>
  <input type="submit" name="cari" value="SHOW">
</form>

<?php
if (isset($_POST['cari'])) {
    $a = $_POST['cari_a'];
    if($a == 1){ ?>

      <div class="form">
          <form method="post" action="">
            <input type="hidden" name="kategori" value="1">
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                  <input class="form-control" type="text" placeholder="Nama" name="nama">
              </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Status Mahasiswa</label>
                <div class="col-sm-10">
                    <select class="form-control" id="exampleFormControlSelect1" name="status">
                      <option value="Aktif">Aktif</option>
                      <option value="Tidak">Tidak Aktif</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Nrp</label>
              <div class="col-sm-10">
                  <input class="form-control" type="text" placeholder="Nrp" name="nrp">
              </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-10">
                    <select class="form-control" id="exampleFormControlSelect1" name="jurusan">
                      <option value="Teknik Informatika">Teknik Informatika</option>
                      <option value="Sistem Informasi">Sistem Informasi</option>
                      <option value="Manajemen Informatika">Manajemen Informatika</option>
                      <option value="Komputer Akutansi">Komputer Akutansi</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select class="form-control" id="exampleFormControlSelect1" name="jekel">
                      <option value="pria">Pria</option>
                      <option value="wanita">Wanita</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" name="saveBukuTamu">Simpan</button>
          </form>
      </div>

    <?php
    }elseif ($a == 2 ) { ?>

      <div class="form">
          <form method="post" action="">
            <input type="hidden" name="kategori" value="2">

            <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                  <input class="form-control" type="text" placeholder="Nama" name="nama">
              </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Status Dosen</label>
                <div class="col-sm-10">
                    <select class="form-control" id="exampleFormControlSelect1" name="status">
                      <option value="Aktif">Aktif</option>
                      <option value="Tidak">Tidak Aktif</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Nip</label>
              <div class="col-sm-10">
                  <input class="form-control" type="text" placeholder="Nip" name="nrp">
              </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select class="form-control" id="exampleFormControlSelect1" name="jekel">
                      <option value="pria">Pria</option>
                      <option value="wanita">Wanita</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" name="saveBukuTamu">Simpan</button>
          </form>
      </div>

    <?php
    }
}
   ?>



<?php
if (isset($_POST['saveBukuTamu'])) {
    $kategori = $obj->conn->real_escape_string($_POST['kategori']);
    $nama = $obj->conn->real_escape_string($_POST['nama']);
    $nrp = $obj->conn->real_escape_string($_POST['nrp']);
    $status = $obj->conn->real_escape_string($_POST['status']);
    $jurusan = $obj->conn->real_escape_string($_POST['jurusan']);
    $jekel = $obj->conn->real_escape_string($_POST['jekel']);

    $save = $objPengunjung->saveBukuTamu($status, $kategori, $nrp, $nama, $jurusan, $jekel);
    if (!$save) {
      echo '<script>
      swal({
          title: "Alert",
          text: "Data berhasil disave",
          type: "success"
      }).then(function() {
          window.location = "?view=home";
      });
</script>';
    }else {
      echo "<script>
      swal({
            title: 'Error Save!',
            text: 'Do you want to continue',
            type: 'error'
          })
      </script>";
    }
}


?>
