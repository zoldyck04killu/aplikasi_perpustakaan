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

  function savePetugas($nip, $nama, $jekel, $jabatan, $alamat)
  {
    $db = $this->mysqli->conn;
    $savePetugas = $db->query("INSERT INTO petugas
                              (nip, nama_petugas, jabatan, jenkel, alamat)
                              VALUES
                              ('$nip', '$nama', '$jabatan', '$jekel', '$alamat')
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

  public function updatePetugas($nip, $nama, $jabatan, $jenkel, $alamat)
  {
    $db = $this->mysqli->conn;
    $db->query("UPDATE petugas SET nama_petugas = '$nama', jabatan = '$jabatan', jenkel = '$jenkel', alamat = '$alamat' WHERE nip = '$nip' ") or die ($db->error);
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
      return true;
    }else{
      return false;
    }
  }

  public function showPeminjaman(){
    $db = $this->mysqli->conn;
    $sql = "SELECT * FROM pinjaman";
    $query = $db->query($sql);
    return $query;
  }

} // end class



?>
