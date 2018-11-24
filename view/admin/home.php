<?php if (@$_SESSION['user']) {?>

  <div class="header-hal-admin">
      <h1>Selamat Datang DI Halaman Administrator</h1>
      <hr>
      <div class="text-center">
        <img src="<?= base_url()?>assets/image/LOGOSTMIKINDONESIABANJARMASIN.png" width="200" height="200" class="rounded" alt="...">
      </div>
  </div>


<?php } ?>

<?php if (@$_SESSION['nip']) {?>

  <div class="header-hal-admin">
      <h1>Selamat Datang DI Halaman Petugas</h1>
      <hr>
      <div class="text-center">
        <img src="<?= base_url()?>assets/image/LOGOSTMIKINDONESIABANJARMASIN.png" width="200" height="200" class="rounded" alt="...">
      </div>
  </div>


<?php } ?>
