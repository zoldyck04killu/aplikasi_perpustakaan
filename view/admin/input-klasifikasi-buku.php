<div class="header-hal">
    <h1>INPUT KLASIFIKASI BUKU</h1>
    <hr>
</div>

<div class="form">
    <form method="post">
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Klasifikasi</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="Klasifikasi" placeholder="Klasifikasi">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Kode</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="Kode" placeholder="Kode">
        </div>
      </div>


      <button type="submit" class="btn btn-primary" name="saveKlasifikasi">Simpan</button>

    </form>
</div>
<?php

if (isset($_POST['saveKlasifikasi']))
{
  $klasifikasi = $obj->conn->real_escape_string($_POST['Klasifikasi']);
  $kode = $obj->conn->real_escape_string($_POST['Kode']);

  $saveBuku = $objAdmin->saveKlasifikasi($klasifikasi, $kode);
  if ($saveBuku) {
      echo "<script>
      swal(
        'Save Klasifikasi Buku Success!',
        'You clicked the button!',
        'success'
      )
      </script>";
  }else{
    echo "<script>
    swal({
          title: 'Error Save Klasifikasi Buku!',
          text: 'Do you want to continue',
          type: 'error'
        })
    </script>";
  }


}

?>
