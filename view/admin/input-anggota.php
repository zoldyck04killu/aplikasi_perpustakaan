<div class="header-hal">
    <h1>INPUT ANGGOTA</h1>
    <hr>
</div>

<div class="form">
    <form method="post" action="">
      <!-- <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Id Anggota</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Id Anggota">
        </div>
      </div> -->
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Nama" name="nama">
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
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Tempat Lahir</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Tempat Lahir" name="tempat_lhr">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal Lahir</label>
        <div class="col-sm-10">
            <input class="form-control" type="date" placeholder="" name="tl">
        </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label">Status</label>
          <div class="col-sm-10">
              <select class="form-control" id="exampleFormControlSelect1" name="status">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
          </div>
      </div>

      <button type="submit" class="btn btn-primary" name="saveAnggota">Simpan</button>

    </form>
</div>
<?php
if (isset($_POST['saveAnggota']))
{
  $nama = $obj->conn->real_escape_string($_POST['nama']);
  $jurusan = $obj->conn->real_escape_string($_POST['jurusan']);
  $jekel = $obj->conn->real_escape_string($_POST['jekel']);
  $temp_lhr = $obj->conn->real_escape_string($_POST['tempat_lhr']);
  $tl = $obj->conn->real_escape_string($_POST['tl']);
  $status = $obj->conn->real_escape_string($_POST['status']);

  $saveAnggota = $objAdmin->saveAnggota($nama, $jurusan, $jekel, $temp_lhr, $tl, $status);
  if ($saveAnggota) {
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
