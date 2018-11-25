<?php
$id = $_GET['nip'];
$data = $objAdmin->editPetugas($id);
$a = $data->fetch_object();
 ?>

<div class="header-hal">
    <h1>EDIT PETUGAS</h1>
    <hr>
</div>

<div class="form">
    <form class="" action="" method="POST">
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nip</label>
        <div class="col-sm-10">
            <input class="form-control" name="nip" type="text" value="<?=$a->nip; ?>" readonly>
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input class="form-control" name="pass" type="text" value="" placeholder="Masukan Passowrd Baru">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input class="form-control" name="nama_petugas" type="text" value="<?=$a->nama_petugas; ?>">
        </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-10">
              <select class="form-control" name="jenkel" id="exampleFormControlSelect1">
                <option value="<?=$a->jenkel; ?>"><?=$a->jenkel; ?></option>
                <option value="pria">Pria</option>
                <option value="wanita">Wanita</option>
              </select>
          </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Jabatan</label>
        <div class="col-sm-10">
            <input class="form-control" name="jabatan" type="text" value="<?=$a->jabatan; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
            <input class="form-control" name="alamat" type="text" value="<?=$a->alamat; ?>">
        </div>
      </div>

      <input class="btn btn-primary" type="submit" name="ubah" value="Ubah">
      <a class="btn btn-secondary" href="?view=data-petugas">Batal</a>

    </form>
</div>

<?php
if (isset($_POST['ubah'])) {
    $nip = $obj->conn->real_escape_string($_POST['nip']);
    $pass = $obj->conn->real_escape_string($_POST['pass']);
    $password_hash = password_hash($pass, PASSWORD_DEFAULT);
    $nama = $obj->conn->real_escape_string($_POST['nama_petugas']);
    $jabatan = $obj->conn->real_escape_string($_POST['jabatan']);
    $jenkel = $obj->conn->real_escape_string($_POST['jenkel']);
    $alamat = $obj->conn->real_escape_string($_POST['alamat']);
    $update = $objAdmin->updatePetugas($nip, $password_hash, $nama, $jabatan, $jenkel, $alamat);

      if ($update) {
        echo '<script>
        swal({
            title: "Alert",
            text: "Data berhasil dibuah",
            type: "success"
        }).then(function() {
            window.location = "?view=data-petugas";
        });
</script>';
      }
      else {
        echo '<script>alert("ERROR");</script>';

      }
}

 ?>
