<?php

/**
 *
 */
class Pengunjung
{

  private $mysqli;

  function __construct($mysqli)
  {
    $this->mysqli = $mysqli;
  }

  function saveBukuTamu($status,$nrp,$nama,$jurusan,$jekel)
  {
    $db = $this->mysqli->conn;
    $tgl_Entry = date('Y/m/d');
    $db->query("INSERT INTO pengunjung (status,nrp,nama,jurusan,jekel,tgl_entry) VALUES('$status',$nrp,'$nama','$jurusan','$jekel','$tgl_Entry')") or die ($db->error);
  }

}



?>
