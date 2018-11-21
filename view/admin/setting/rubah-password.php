<div class="header-hal">
    <h1>RUBAH PASSWORD</h1>
    <hr>
</div>

<div class="form">
    <form class="" action="" method="post">
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
            <input class="form-control" name="user" type="text" placeholder="masukan username yang akan dirubah">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Password Lama</label>
        <div class="col-sm-10">
            <input class="form-control" name="pass_lama" type="password" placeholder="Password Lama">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Password Baru</label>
        <div class="col-sm-10">
            <input class="form-control" name="pass_baru" type="password" placeholder="Password Baru">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
        <div class="col-sm-10">
            <input class="form-control" name="pass_baru1" type="password" placeholder="Konfirmasi Password Baru">
        </div>
      </div>


      <input class="btn btn-md btn-info" type="submit" name="ubah" value="Simpan">
    </form>
</div>

<?php
if (isset($_POST['ubah'])) {
  $user = $obj->conn->real_escape_string($_POST['user']);
  $pass_lama = $obj->conn->real_escape_string($_POST['pass_lama']);
  $pass_baru = $obj->conn->real_escape_string($_POST['pass_baru']);
  $pass_baru1 = $obj->conn->real_escape_string($_POST['pass_baru1']);
    $cek = $objAdmin->cek_userpass($user,$pass_lama);
      if ($cek) {
          if ($pass_baru != $pass_baru1) {
              echo '<script>alert("Password tidak cocok");</script>';
              die;
          }
          else {
            $password_hash = password_hash($pass_baru, PASSWORD_DEFAULT);
            $objAdmin->changeUserPass($user, $password_hash);
            echo '<script>alert("Berhasil diubah!!!!");</script>';
          }
      }
      else {
        echo '<script>alert("user atau password error!!!");</script>';
      }
}


 ?>
