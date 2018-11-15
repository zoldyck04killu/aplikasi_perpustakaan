<?php
$id = $_GET['kd_buku'];
$data = $objAdmin->editBuku($id);
$a = $data->fetch_object();
 ?>


<div class="header-hal">
    <h1>Edit BUKU</h1>
    <hr>
</div>

<div class="form">
    <form class="" action="" method="post">
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Kode Buku</label>
        <div class="col-sm-10">
            <input class="form-control" name="kd_buku" type="text" value="<?=$a->kd_buku ?>" readonly>
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Buku</label>
        <div class="col-sm-10">
            <input class="form-control" name="jdl_buku" type="text" value="<?=$a->jdl_buku; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Pengarang</label>
        <div class="col-sm-10">
            <input class="form-control" name="pengarang" type="text" value="<?=$a->pengarang; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Penerbit</label>
        <div class="col-sm-10">
            <input class="form-control" name="penerbit" type="text" value="<?=$a->penerbit; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Tahun Terbit</label>
        <div class="col-sm-10">
            <input class="form-control" name="thn_terbit" type="text" value="<?=$a->thn_terbit; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">ISBN</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="lsbn" value="<?=$a->lsbn; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Jumlah Buku</label>
        <div class="col-sm-10">
            <input class="form-control" name="jml_buku" type="text" value="<?=$a->jml_buku; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Klasifikasi</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="klasifikasi" value="<?=$a->klasifikasi; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Sinopsis</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="sinopsis" rows="3"><?=$a->sinopsis; ?></textarea>
      </div>


      <input class="btn btn-primary" type="submit" name="ubah" value="Ubah">
      <a class="btn btn-secondary" href="?view=data-buku">Batal</a>

    </form>
</div>


<?php
if (isset($_POST['ubah'])) {
    $kd_buku = $obj->conn->real_escape_string($_POST['kd_buku']);
    $buku = $obj->conn->real_escape_string($_POST['jdl_buku']);
    $pengarang = $obj->conn->real_escape_string($_POST['pengarang']);
    $penerbit = $obj->conn->real_escape_string($_POST['penerbit']);
    $thn_terbit = $obj->conn->real_escape_string($_POST['thn_terbit']);
    $lsbn = $obj->conn->real_escape_string($_POST['lsbn']);
    $jml_buku = $obj->conn->real_escape_string($_POST['jml_buku']);
    $klasifikasi = $obj->conn->real_escape_string($_POST['klasifikasi']);
    $sinopsis = $obj->conn->real_escape_string($_POST['sinopsis']);
    $entry = date("Y-m-d H:i:s");
      $update = $objAdmin->updateBUku($kd_buku, $buku, $pengarang, $penerbit, $thn_terbit, $lsbn, $jml_buku, $klasifikasi, $sinopsis, $entry);
        if ($update) {
          echo '<script>
          swal({
              title: "Alert",
              text: "Data berhasil dibuah",
              type: "success"
          }).then(function() {
              window.location = "?view=data-buku";
          });
  </script>';
        }
        else {
          echo '<script>alert("ERROR");</script>';
        }
}

 ?>
