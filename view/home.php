<div class="header-hal">
    <h1>BUKU TAMU</h1>
    <hr>
</div>

<div class="form">
    <form method="post" action="">
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Nama" name="nama">
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
if (isset($_POST['saveBukuTamu'])) {

    $nama = $obj->conn->real_escape_string($_POST['nama']);
    $nrp = $obj->conn->real_escape_string($_POST['nrp']);
    $status = $obj->conn->real_escape_string($_POST['status']);
    $jurusan = $obj->conn->real_escape_string($_POST['jurusan']);
    $jekel = $obj->conn->real_escape_string($_POST['jekel']);

    $objPengunjung->saveBukuTamu($status,$nrp,$nama,$jurusan,$jekel);
}


?>
