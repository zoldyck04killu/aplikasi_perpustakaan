<div class="header-hal">
    <h1>INPUT BUKU</h1>
    <hr>
</div>

<div class="form">
    <form method="post" action="">
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Kode Buku</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Kode Buku" name="kdBuku">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Buku</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Buku" name="buku">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Pengarang</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Pengarang" name="pengarang">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Penerbit</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Penerbit" name="penerbit">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Tahun Terbit</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Tahun Terbit" name="thn_terbit">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">ISBN</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="ISBN" name="isbn">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Jumlah Buku</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Jumlah Buku" name="jlh_buku">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Klasifikasi</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Klasifikasi" name="klasifikasi">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Sinopsis</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="sinopsis"></textarea>
      </div>


      <button type="submit" class="btn btn-primary" name="saveBuku">Simpan</button>

    </form>
</div>
<?php

if (isset($_POST['saveBuku']))
{
  $kdBuku = $obj->conn->real_escape_string($_POST['kdBuku']);
  $buku = $obj->conn->real_escape_string($_POST['buku']);
  $pengarang = $obj->conn->real_escape_string($_POST['pengarang']);
  $penerbit = $obj->conn->real_escape_string($_POST['penerbit']);
  $thn_terbit = $obj->conn->real_escape_string($_POST['thn_terbit']);
  $isbn = $obj->conn->real_escape_string($_POST['isbn']);
  $jlh_buku = $obj->conn->real_escape_string($_POST['jlh_buku']);
  $klasifikasi = $obj->conn->real_escape_string($_POST['klasifikasi']);
  $sinopsis = $obj->conn->real_escape_string($_POST['sinopsis']);
  $entry = date("Y-m-d H:i:s");
  $saveBuku = $objAdmin->saveBuku($kdBuku, $buku, $pengarang, $penerbit, $thn_terbit, $isbn, $jlh_buku, $klasifikasi, $sinopsis, $entry);
  if ($saveBuku) {
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
