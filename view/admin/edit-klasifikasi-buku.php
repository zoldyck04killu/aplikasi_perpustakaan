<div class="header-hal">
    <h1>EDIT KLASIFIKASI BUKU</h1>
    <hr>
</div>
<?php
$data = $objAdmin->editKlasifikasi($_GET['kd']);
$a = $data->fetch_object();
?>
<div class="form">
    <form method="post">
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Klasifikasi</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="klasifikasi" placeholder="Klasifikasi" value="<?= $a->klasifikasi ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Kode</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="kode" placeholder="Kode" value="<?= $a->kode; ?>">
        </div>
      </div>


      <button type="submit" class="btn btn-primary" name="updateKlasifikasi">Edit</button>

    </form>
</div>

<?php

if (isset($_POST['updateKlasifikasi'])) {

  $id = $_GET['kd'];
  $klasifikasi = $obj->conn->real_escape_string($_POST['klasifikasi']);
  $kode = $obj->conn->real_escape_string($_POST['kode']);

  $updateKlasifikasi = $objAdmin->updateKlasifikasi($id, $klasifikasi, $kode);

  if ($updateKlasifikasi) {
      echo "<script>
      swal(
        'Update Klasifikasi Buku Success!',
        'You clicked the button!',
        'success'
      )
      window.location='?view=data-Klasifikasi-buku';
      </script>";
  }else{
    echo "<script>
    swal({
          title: 'Error Update Klasifikasi Buku!',
          text: 'Do you want to continue',
          type: 'error'
        })
    </script>";
  }

}

?>
