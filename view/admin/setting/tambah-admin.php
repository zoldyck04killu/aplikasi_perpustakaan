<div class="header-hal">
    <h1>TAMBAH ADMIN</h1>
    <hr>
</div>

<div class="form">
    <form class="" action="" method="post">
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
            <input class="form-control" name="user" type="text" placeholder="Username">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input class="form-control" name="pass" type="password" placeholder="Password">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Ulangin Password</label>
        <div class="col-sm-10">
            <input class="form-control" name="pass2" type="password" placeholder="Ulangin Password">
        </div>
      </div>

      <input class="btn btn-md btn-info" type="submit" name="simpan" value="Simpan">

    </form>
</div>

<?php
if (isset($_POST['simpan'])) {
    $user = $obj->conn->real_escape_string($_POST['user']);
    $pass = $obj->conn->real_escape_string($_POST['pass']);
    $pass2 = $obj->conn->real_escape_string($_POST['pass2']);
      if ($pass != $pass2) {
          echo '<script>alert("Password tidak cocok");</script>';
          die;
      }
      $password_hash = password_hash($pass, PASSWORD_DEFAULT);
      $objAdmin->tambahAdmin($user, $password_hash);
      echo '<script>alert("Berhasil");</script>';
}

 ?>
