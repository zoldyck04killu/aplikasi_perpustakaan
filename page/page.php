<?php

if (@$_GET['view'] == '' || @$_GET['view'] == 'home')
{
    include 'view/home.php';
}
elseif (@$_GET['view'] == 'home-admin')
{
    include 'view/admin/home.php';
}
elseif (@$_GET['view'] == 'login-admin')
{
    include 'view/login.php';
}
elseif (@$_GET['view'] == 'logout-admin')
{
    $objAdmin->logout();
    echo '<script>
    window.location="?view=login-admin";
     </script>';
}
elseif (@$_GET['view'] == 'input-anggota')
{
    include 'view/admin/input-anggota.php';
}
elseif (@$_GET['view'] == 'data-anggota')
{
    include 'view/admin/data-anggota.php';
}
elseif (@$_GET['view'] == 'edit-anggota')
{
    include 'view/admin/edit-anggota.php';
}
elseif (@$_GET['view'] == 'input-petugas')
{
    include 'view/admin/input-petugas.php';
}
elseif (@$_GET['view'] == 'data-petugas')
{
    include 'view/admin/data-petugas.php';
}
elseif (@$_GET['view'] == 'edit-petugas')
{
    include 'view/admin/edit-petugas.php';
}
elseif (@$_GET['view'] == 'input-buku')
{
    include 'view/admin/input-buku.php';
}
elseif (@$_GET['view'] == 'data-buku')
{
    include 'view/admin/data-buku.php';
}
elseif (@$_GET['view'] == 'view-buku')
{
    include 'view/admin/view-data-buku.php';
}
elseif (@$_GET['view'] == 'edit-buku')
{
    include 'view/admin/edit-buku.php';
}
elseif (@$_GET['view'] == 'input-detail-buku')
{
    include 'view/admin/input-detail-buku.php';
}
elseif (@$_GET['view'] == 'detail-buku')
{
    include 'view/admin/data-detail-buku.php';
}
elseif (@$_GET['view'] == 'input-Klasifikasi-buku')
{
    include 'view/admin/input-klasifikasi-buku.php';
}
elseif (@$_GET['view'] == 'data-Klasifikasi-buku')
{
    include 'view/admin/data-klasifikasi-buku.php';
}
elseif (@$_GET['view'] == 'edit-Klasifikasi-buku')
{
    include 'view/admin/edit-klasifikasi-buku.php';
}
elseif (@$_GET['view'] == 'hapus-Klasifikasi-buku')
{
  $id = $_GET['kd'];
  $objAdmin->hapusKlasifikasi($id);
  echo '<script>
  swal({
      title: "Alert",
      text: "Data berhasil dihapus",
      type: "success"
  }).then(function() {
      window.location = "?view=data-Klasifikasi-buku";
  });
</script>';
}
elseif (@$_GET['view'] == 'peminjaman1')
{
    include 'view/admin/transaksi/peminjaman1.php';
}
elseif (@$_GET['view'] == 'peminjaman2')
{
  $id = $_POST['id_anggota'];
  $data = $objAdmin->checkPeminjam($id);
  if ($data->num_rows > 0) {
    echo '<script>
    swal(
      "Maaf", "Anda Sudah Melakukan Peminjaman, Silahkan Kembalikan Buku Dulu."
    ).then(function() {
        window.location = "?view=peminjaman1";
    });
  </script>';
  }else{
    include 'view/admin/transaksi/peminjaman2.php';
  }
}
elseif (@$_GET['view'] == 'daftar-peminjam')
{
    include 'view/admin/transaksi/daftar-peminjam.php';
}
elseif (@$_GET['view'] == 'pengembalian')
{
  $id = $_GET['no'];
  $data = $objAdmin->showPeminjaman($id);
  $b = $data->fetch_array();
  $objAdmin->Kembalikan($id, $b['id_anggota'], $b['nama_anggota'], $b['kd_buku'], $b['jdl_buku']);
  echo '<script>
  swal({
      title: "Alert",
      text: "Data berhasil dihapus",
      type: "success"
  }).then(function() {
      window.location = "?view=daftar-peminjam";
  });
</script>';
}
elseif (@$_GET['view'] == 'tambah-admin')
{
    include 'view/admin/setting/tambah-admin.php';
}
elseif (@$_GET['view'] == 'edit-pass')
{
    include 'view/admin/setting/rubah-password.php';
}
elseif (@$_GET['view'] == 'hapus')
{
    $id = $_GET['id'];
    $objAdmin->hapus($id);
    echo '<script>
    swal({
        title: "Alert",
        text: "Data berhasil dihapus",
        type: "success"
    }).then(function() {
        window.location = "?view=data-anggota";
    });
  </script>';
}
elseif (@$_GET['view'] == 'hapus-petugas') {
    $id = $_GET['nip'];
    $objAdmin->hapusPetugas($id);
    echo '<script>
    swal({
        title: "Alert",
        text: "Data berhasil dihapus",
        type: "success"
    }).then(function() {
        window.location = "?view=data-petugas";
    });
  </script>';
}
elseif (@$_GET['view'] == 'hapus-buku') {
  $id = $_GET['kd_buku'];
  $objAdmin->hapusBuku($id);
  echo '<script>
  swal({
      title: "Alert",
      text: "Data berhasil dihapus",
      type: "success"
  }).then(function() {
      window.location = "?view=data-buku";
  });
</script>';
}
elseif (@$_GET['view'] == 'cari-buku') {
    include 'view/cari-buku.php';
}
elseif (@$_GET['view'] == 'login-petugas') {
    include 'view/petugas/login.php';
}
else
{
  include 'view/404.php';

}
