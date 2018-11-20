<?php
$id = $_GET['id'];
$data = $objAdmin->edit($id);
$a = $data->fetch_object();
 ?>

<div class="header-hal">
    <h1>EDIT ANGGOTA</h1>
    <hr>
</div>

<div class="form">
    <form class="" action="" method="post">
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Id Anggota</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" value="<?=$a->id_anggota; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="hidden" name="id" value="<?=$a->id_anggota; ?>">
            <input class="form-control" name="nama" type="text" value="<?=$a->nama_anggota; ?>">
        </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label">Jurusan</label>
          <div class="col-sm-10">
              <select class="form-control" name="jurusan" id="exampleFormControlSelect1">
                <option value="<?=$a->jurusan; ?>"><?=$a->jurusan; ?></option>
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
              <select class="form-control" name="jekel" id="exampleFormControlSelect1">
                <option value="<?=$a->jenkel; ?>"><?=$a->jenkel; ?></option>
                <option value="pria">Pria</option>
                <option value="wanita">Wanita</option>
              </select>
          </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Tempat Lahir</label>
        <div class="col-sm-10">
            <input class="form-control" name="tempat_lhr" type="text" value="<?=$a->tmp_lahir; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal Lahir</label>
        <div class="col-sm-10">
            <input class="form-control" name="tl" type="date" value="<?=$a->tgl_lahir; ?>">
        </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label">Status Mahasiswa</label>
          <div class="col-sm-10">
              <select class="form-control" name="status" id="exampleFormControlSelect1">
                <option value="Aktif">Aktif</option>
                <option value="Tidak">Tidak Aktif</option>
              </select>
          </div>
      </div>

      <input type="submit" class="btn btn-primary" name="ubah" value="Ubah">
      <a href="?view=data-anggota" class="btn btn-primary">Batal</a>

    </form>
</div>

<?php
if (isset($_POST['ubah'])) {
  $id = $_POST['id'];
  $nama = $obj->conn->real_escape_string($_POST['nama']);
  $jurusan = $obj->conn->real_escape_string($_POST['jurusan']);
  $jekel = $obj->conn->real_escape_string($_POST['jekel']);
  $temp_lhr = $obj->conn->real_escape_string($_POST['tempat_lhr']);
  $tl = $obj->conn->real_escape_string($_POST['tl']);
  $status = $obj->conn->real_escape_string($_POST['status']);
  $entry = date("Y-m-d");
  $update = $objAdmin->update($id, $nama, $jurusan, $jekel, $temp_lhr, $tl, $status, $entry);
    if ($update) {
        echo '<script>
        swal({
            title: "Alert",
            text: "Data berhasil dibuah",
            type: "success"
        }).then(function() {
            window.location = "?view=data-anggota";
        });
</script>';
    }else {
      echo '<script>alert("ERROR");</script>';
    }
}

 ?>
