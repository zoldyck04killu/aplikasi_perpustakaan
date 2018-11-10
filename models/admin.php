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

  public function showAnggota(){
    $db = $this->mysqli->conn;
    $sql = "SELECT * FROM anggota";
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

  function saveBuku($kdBuku, $buku, $pengarang, $penerbit, $thn_terbit, $isbn, $jlh_buku, $klasifikasi, $sinopsis)
  {
    $db = $this->mysqli->conn;
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $tgl_Entry = date('Y/m/d');
    $saveBuku = $db->query("INSERT INTO buku
                              (kd_buku, jdl_buku, pengarang, penerbit, thn_terbit, lsbn, jml_buku, klasifikasi, sinopsis, tgl_entry)
                              VALUES
                              ($kdBuku, '$buku', '$pengarang', '$penerbit', '$thn_terbit', $isbn, '$jlh_buku', '$klasifikasi', '$sinopsis', $tgl_Entry)
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

}



?>
