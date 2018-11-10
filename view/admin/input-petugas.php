<div class="header-hal">
    <h1>INPUT PETUGAS</h1>
    <hr>
</div>

<div class="form">
    <form method="post" action="">
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nip</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Nip" name="nip">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Nama" name="nama">
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
        <label for="staticEmail" class="col-sm-2 col-form-label">Jabatan</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Jabatan" name="jabatan">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Alamat" name="alamat">
        </div>
      </div>

      <button type="submit" class="btn btn-primary" name="savePetugas">Simpan</button>

    </form>
</div>
<?php
if (isset($_POST['savePetugas']))
{
  $nip = $obj->conn->real_escape_string($_POST['nip']);
  $nama = $obj->conn->real_escape_string($_POST['nama']);
  $jekel = $obj->conn->real_escape_string($_POST['jekel']);
  $jabatan = $obj->conn->real_escape_string($_POST['jabatan']);
  $alamat = $obj->conn->real_escape_string($_POST['alamat']);

  $savePetugas = $objAdmin->savePetugas($nip, $nama, $jekel, $jabatan, $alamat);
  if ($savePetugas) {
      echo "<script>
      swal(
        'Save Petugas Success!',
        'You clicked the button!',
        'success'
      )
      </script>";
  }else{
    echo "<script>
    swal({
          title: 'Error Save Petugas!',
          text: 'Do you want to continue',
          type: 'error'
        })
    </script>";
  }

}

?>
