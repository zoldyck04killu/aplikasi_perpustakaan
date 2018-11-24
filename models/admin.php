<?php

/**
 *
 */
class Admin
{

  private $mysqli;

  function __construct($mysqli)
  {
    $this->mysqli = $mysqli;
  }

  function register($username, $password_hash)
  {
    $db = $this->mysqli->conn;
    $db->query("INSERT INTO admin (admin, passadmin) VALUES ('$username','$password_hash')") or die ($db->error);
  }

  public function login($username, $password){
  $db = $this->mysqli->conn;
  $userdata = $db->query("SELECT * FROM admin WHERE admin = '$username' ") or die ($db->error);
  $cek = $userdata->num_rows;
  $cek_2 = $userdata->fetch_array();
          if (password_verify($password, $cek_2['passadmin'])) {
              $_SESSION['user'] = $cek_2['admin']; //session KTP
              return true;
          } else {
              return false; // password salah
          }
  }

  public function logout(){
    @$_SESSION['user'] == FALSE;
    unset($_SESSION);
    session_destroy();
  }

  function saveAnggota($nama, $jurusan, $jekel, $temp_lhr, $tl, $status)
  {
    $db = $this->mysqli->conn;
    $tgl_Entry = date('Y/m/d');
    $saveAnggota = $db->query("INSERT INTO anggota
                              (nama_anggota,jurusan, jenkel, tmp_lahir, tgl_lahir, status, tgl_entry)
                              VALUES
                              ('$nama', '$jurusan', '$jekel', '$temp_lhr', '$tl', '$status','$tgl_Entry')
                              ") or die ($db->error);
    if ($saveAnggota)
    {
      return true;
    }else{
      return false;
    }
  }

  public function showAnggota($id_anggota = null){
    $db = $this->mysqli->conn;
    if ($id_anggota == null) {
      $sql = "SELECT * FROM anggota";
    }else{
      $sql = "SELECT * FROM anggota WHERE id_anggota = '$id_anggota'";
    }
    $query = $db->query($sql);
    return $query;
  }

  function savePetugas($nip, $password_hash, $nama, $jekel, $jabatan, $alamat)
  {
    $db = $this->mysqli->conn;
    $savePetugas = $db->query("INSERT INTO petugas
                              (nip, password, nama_petugas, jabatan, jenkel, alamat)
                              VALUES
                              ('$nip', '$password_hash', '$nama', '$jabatan', '$jekel', '$alamat')
                              ") or die ($db->error);
    if ($savePetugas)
    {
      return true;
    }else{
      return false;
    }
  }

  public function showPetugas(){
    $db = $this->mysqli->conn;
    $sql = "SELECT * FROM petugas";
    $query = $db->query($sql);
    return $query;
  }

  function saveBuku($kdBuku, $buku, $pengarang, $penerbit, $thn_terbit, $isbn, $jlh_buku, $klasifikasi, $sinopsis, $entry)
  {
    $db = $this->mysqli->conn;
    $saveBuku = $db->query("INSERT INTO buku
                              (kd_buku, jdl_buku, pengarang, penerbit, thn_terbit, lsbn, jml_buku, klasifikasi, sinopsis, tgl_entry)
                              VALUES
                              ($kdBuku, '$buku', '$pengarang', '$penerbit', '$thn_terbit', $isbn, '$jlh_buku', '$klasifikasi', '$sinopsis', '$entry')
                              ")
                              or die ($db->error);
    if ($saveBuku)
    {
      return true;
    }else{
      return false;
    }
  }

  public function showBuku(){
    $db = $this->mysqli->conn;
    $sql = "SELECT * FROM buku";
    $query = $db->query($sql);
    return $query;
  }

  public function viewBuku($id){
    $db = $this->mysqli->conn;
    $sql = "SELECT * FROM buku WHERE kd_buku = $id";
    $query = $db->query($sql);
    return $query;
  }


  public function edit($id)
  {
    $db = $this->mysqli->conn;
    $query = $db->query("SELECT * FROM anggota WHERE id_anggota = '$id' ") or die ($db->error);
    return $query;
  }

  public function update($id, $nama, $jurusan, $jekel, $temp_lhr, $tl, $status, $entry)
  {
    $db = $this->mysqli->conn;
    $db->query("UPDATE anggota SET nama_anggota = '$nama', jurusan = '$jurusan', jenkel = '$jekel', tmp_lahir = '$temp_lhr', tgl_lahir = '$tl', status = '$status', tgl_entry = '$entry' WHERE id_anggota = '$id' ") or die ($db->error);
    return true;
  }

  public function hapus($id)
  {
    $db = $this->mysqli->conn;
    $db->query("DELETE FROM anggota WHERE id_anggota = '$id' ");
  }

  public function editPetugas($id)
  {
    $db = $this->mysqli->conn;
    $query = $db->query("SELECT * FROM petugas WHERE nip = '$id' ") or die ($db->error);
    return $query;
  }

  public function updatePetugas($nip, $password_hash, $nama, $jabatan, $jenkel, $alamat)
  {
    $db = $this->mysqli->conn;
    $db->query("UPDATE petugas SET nama_petugas = '$nama', password = '$password_hash', jabatan = '$jabatan', jenkel = '$jenkel', alamat = '$alamat' WHERE nip = '$nip' ") or die ($db->error);
    return true;
    //sengaja nip di disable di view, karna itu primary key tidak bisa di edit, kecuali membuat auto increment baru
  }

  public function hapusPetugas($id)
  {
    $db = $this->mysqli->conn;
    $db->query("DELETE FROM petugas WHERE nip = '$id' ") or die ($db->error);
  }

  public function editBuku($id)
  {
    $db = $this->mysqli->conn;
    $query = $db->query("SELECT * FROM buku WHERE kd_buku = '$id' ") or die ($db->error);
    return $query;
  }

  public function updateBUku($kdBuku, $buku, $pengarang, $penerbit, $thn_terbit, $lsbn, $jml_buku, $klasifikasi, $sinopsis, $entry)
  {
    $db = $this->mysqli->conn;
    $db->query("UPDATE buku SET jdl_buku = '$buku', pengarang = '$pengarang', penerbit = '$penerbit', thn_terbit = '$thn_terbit', lsbn = '$lsbn', jml_buku = '$jml_buku', klasifikasi = '$klasifikasi', sinopsis = '$sinopsis', tgl_entry = '$entry' WHERE kd_buku = '$kdBuku' ") or die ($db->error);
    return true;
  }

  public function kurangiBuku($id_buku)
  {
    $db = $this->mysqli->conn;
    $sql = "SELECT jml_buku FROM buku WHERE kd_buku = '$id_buku' ";
    $query = $db->query($sql);
    $a = $query->fetch_object();
    $jlh_baru =  $a->jml_buku - 1;
    $db->query("UPDATE buku SET jml_buku = $jlh_baru  WHERE kd_buku = '$id_buku' ") or die ($db->error);
    // return true;
  }

  public function hapusBuku($id)
  {
    $db = $this->mysqli->conn;
    $db->query("DELETE FROM buku WHERE kd_buku = '$id' ") or die ($db->error);
  }

  function saveKlasifikasi($klasifikasi, $kode)
  {
    $db = $this->mysqli->conn;
    $saveKlasifikasi = $db->query("INSERT INTO klasifikasi_buku
                              (klasifikasi, kode)
                              VALUES
                              ('$klasifikasi', '$kode')
                              ") or die ($db->error);
    if ($saveKlasifikasi)
    {
      return true;
    }else{
      return false;
    }
  }

  public function showKlasifikasi(){
    $db = $this->mysqli->conn;
    $sql = "SELECT * FROM klasifikasi_buku";
    $query = $db->query($sql);
    return $query;
  }

  public function editKlasifikasi($id)
  {
    $db = $this->mysqli->conn;
    $query = $db->query("SELECT * FROM klasifikasi_buku WHERE id = '$id' ") or die ($db->error);
    return $query;
  }

  public function updateKlasifikasi($id, $klasifikasi, $kode)
  {
    $db = $this->mysqli->conn;
    $db->query("UPDATE klasifikasi_buku SET  klasifikasi = '$klasifikasi', kode = '$kode' WHERE id = $id ") or die ($db->error);
    return true;
  }

  public function hapusKlasifikasi($id)
  {
    $db = $this->mysqli->conn;
    $db->query("DELETE FROM klasifikasi_buku WHERE id = '$id' ") or die ($db->error);
  }

  function savePeminjaman($id_anggota, $nama_anggota, $nip, $tgl_pinjam, $tgl_kembali, $kode)
  {

    $db = $this->mysqli->conn;
    $queryPetugas = $db->query("SELECT nama_petugas FROM petugas WHERE nip=$nip ");
    $Petugas = $queryPetugas->fetch_object();
    $namaPetugas = $Petugas->nama_petugas;

    $queryBuku = $db->query("SELECT jdl_buku FROM buku WHERE kd_buku=$kode ");
    $Buku = $queryBuku->fetch_object();
    $jdlBuku = $Buku->jdl_buku;

    $savePeminjaman = $db->query("INSERT INTO pinjaman
                              (nip, nama_petugas, id_anggota, nama_anggota, kd_buku, jdl_buku, tgl_pinjam, tgl_kembali)
                              VALUES
                              ($nip,'$namaPetugas', $id_anggota, '$nama_anggota', '$kode', '$jdlBuku' ,'$tgl_pinjam', '$tgl_kembali')
                              ") or die ($db->error);
    if ($savePeminjaman)
    {

$count = count($kode2);
  if ($count > 1) {
      for ($i=0; $i < $count ; $i++) {
        $a = $db->query("SELECT * FROM pinjaman WHERE kd_buku = '$kode[$i]' ") or die ($db->error);
        $b = $a->num_rows;


    $buku1 = $db->query("SELECT * FROM buku WHERE kd_buku = '$kode[$i]' ");
     $v = $buku1->fetch_array();
     $c = $v['jml_buku'];

       $hasil[] = $c - $b;

       $db->query("UPDATE buku SET jml_buku = '$hasil' WHERE kd_buku = '$kode[$i]'");

    }
  }


      return true;
    }else{
      return false;
    }
  }

  public function showPeminjaman($id = NULL){
    $db = $this->mysqli->conn;
    if ($id == NULL ) {
      $sql = "SELECT * FROM pinjaman";
    }else{
      $sql = "SELECT * FROM pinjaman WHERE no_pinjaman='$id'";
    }
    $query = $db->query($sql);
    return $query;
  }

  public function checkPeminjam($id){
    $db = $this->mysqli->conn;
    $sql = "SELECT * FROM pinjaman WHERE id_anggota='$id'";
    $query = $db->query($sql);
    return $query;
  }


  public function tambahAdmin($user, $password_hash, $tglLogin = NULL)
  {
    $db = $this->mysqli->conn;
    $a = $db->query("SELECT * FROM admin WHERE admin = '$user' ") or die ($db->error);
    $cekUser = $a->num_rows;
      if ($cekUser > 0) {
          echo '<script>alert("User sudah ada");</script>';
          die;
      }
      $db->query("INSERT INTO admin VALUES('', '$user', '$password_hash', '$tglLogin')") or die ($db->error);
  }

  public function cek_userpass($user, $pass_lama)
  {
    $db = $this->mysqli->conn;
    $userdata = $db->query("SELECT * FROM admin WHERE admin = '$user' ") or die ($db->error);
    $cek = $userdata->num_rows;
    $cek_2 = $userdata->fetch_array();
            if (password_verify($pass_lama, $cek_2['passadmin'])) {
                return true;
            } else {
                return false; // password salah
            }
  }

  function Kembalikan($id_pinjam, $id_anggota, $nama_anggota, $kodeBuku, $jdlBuku)
  {
    $db = $this->mysqli->conn;
    // die($nama_anggota);
    $tgl_kembali = date('Y/m/d');
    $deletePinjaman = $db->query("DELETE FROM pinjaman WHERE no_pinjaman=$id_pinjam ");

    $saveKemabalikan = $db->query("INSERT INTO pengembalian
                              (no_pinjam, id_anggota, nama_anggota, kd_buku, jdl_buku, tgl_kembali)
                              VALUES
                              ($id_pinjam, $id_anggota, '$nama_anggota', '$kodeBuku', '$jdlBuku', '$tgl_kembali')
                              ") or die ($db->error);

    $sql = "SELECT jml_buku FROM buku WHERE kd_buku = '$kodeBuku' ";
    $query = $db->query($sql);
    $a = $query->fetch_object();
    $jlh_baru =  $a->jml_buku + 1;
    $db->query("UPDATE buku SET jml_buku = $jlh_baru  WHERE kd_buku = '$kodeBuku' ") or die ($db->error);

    if ($saveKemabalikan && $deletePinjaman)
    {
      return true;
    }else{
      return false;
    }
  }


  // PETUGAS //

  public function loginPetugas($nip, $password){
  $db = $this->mysqli->conn;
  $userdata = $db->query("SELECT * FROM petugas WHERE nip = '$nip' ") or die ($db->error);
  $cek = $userdata->num_rows;
  $cek_2 = $userdata->fetch_array();
          if (password_verify($password, $cek_2['password'])) {
              $_SESSION['nip'] = $cek_2['nip'];
              return true;
          } else {
              return false; // password salah
          }
  }

} // end class

?>
