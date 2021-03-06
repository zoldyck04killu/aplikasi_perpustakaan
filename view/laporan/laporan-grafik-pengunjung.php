<?php
require_once '../../config/autoload.php';
require_once '../../config/config.php';
require_once '../../config/connection.php';
include('../../models/admin.php');

$obj = new Connection($host, $user, $pass, $db);
$objAdmin = new Admin($obj);

$date =  date('Y-m-d');
$monthNow = substr($date,5,2);
// echo $monthNow;

$data = $objAdmin->dataPengunjungBulanPria();
$pria = 0;
while ($a = $data->fetch_object()) {
  $monthNowDB = substr($a->tgl_entry,5,2);
  if ($monthNowDB == $monthNow ) {
      $pria++;
  }
}

$data = $objAdmin->dataPengunjungBulanWanita();
$wanita = 0;
while ($a = $data->fetch_object()) {
  $monthNowDB = substr($a->tgl_entry,5,2);
  if ($monthNowDB == $monthNow ) {
      $wanita++;
  }
}

$data = $objAdmin->dataPengunjungBulanDosen();
$dosen = 0;
while ($a = $data->fetch_object()) {
  $monthNowDB = substr($a->tgl_entry,5,2);
  if ($monthNowDB == $monthNow ) {
      $dosen++;
  }
}

$data = $objAdmin->dataPengunjungBulanMHS();
$mhs = 0;
while ($a = $data->fetch_object()) {
  $monthNowDB = substr($a->tgl_entry,5,2);
  if ($monthNowDB == $monthNow ) {
      $mhs++;
  }
}


$data = $objAdmin->dataPengunjungHariPria();
$no = 1;
$a = $data->fetch_object();
$perHariPria = $a->pria;


$data = $objAdmin->dataPengunjungHariWanita();
$no = 1;
$a = $data->fetch_object();
$perHariWanita = $a->wanita;


$data = $objAdmin->dataPengunjungHariDosen();
$no = 1;
$a = $data->fetch_object();
$perHariDosen = $a->dosen;

$data = $objAdmin->dataPengunjungHariMHS();
$no = 1;
$a = $data->fetch_object();
$perHariMhs = $a->mhs;

ob_start();
define('K_PATH_IMAGES', '../../assets/image/');

// create new PDF document
$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, True, 'UTF-8', false);

// document information
// $pdf->SetCreator('Kwitansi Penjualan');
// $pdf->SetTitle('Kwitansi Penjualan');
// $pdf->SetSubject('Kwitansi Penjualan');

// header & footer data
$pdf->SetHeaderData('LOGOSTMIKINDONESIABANJARMASIN.png', 20, 'Perpustakaan STMIK INDONESIA BANJARMASIN',
            "Alamat : Jl. Pangeran Hidayatullah (Banua Hanyar) Banjarmasin \nTelp. (0511) 4315530 - 4315531", array(48,89,112), array(48,89,112));

// $pdf->SetHeaderData('logo.png', 30, 'BIDAN PRAKTEK MANDIRI (BPM)', PDF_HEADER_STRING);
$pdf->SetFooterData( array(0, 0, 0), array(0, 0, 0));
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margin
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP + 10, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set page break
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set scaling image
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// font subsetting
$pdf->setFontSubsetting(true);

$pdf->SetFont('helvetica', '', 14, '', true);

$pdf->AddPage();

// $pdf->writeHTMLCell(0, 0, '', '', '<H2>NOTA PEMBELIAN</H2>' , 0, 2, 0, true, 'C', true);

$html=<<<EOD
    <center> <h1> Pengunjung Hari Ini Per Jenis Kelamin  </h1> </center>
    <table border="1">
      <tr align="center" style="font-weight: bold;">
          <th>Laki-Laki</th>
          <th>Perempuan</th>
          <th>Jumlah</th>
      </tr>
    </table>
EOD;

$html2=<<<EOD
  <table border="1" cellpadding="4">
      <tr>
        <td>
EOD;

$html5=<<<EOD
        </td>
      </tr>
    </table>
EOD;

// $pdf->Ln(0);
$pdf->SetX(10);
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, 'C', true);

$pdf->SetX(10);
$totalJekelPerHari = $perHariPria + $perHariWanita;
$pdf->writeHTMLCell(0, 0, '', '', $html2.''.$perHariPria.'</td><td>'.$perHariWanita.'</td><td>'.$totalJekelPerHari.''.$html5 , 0, 1, 0, true, '', true);

$html=<<<EOD
    <center> <h1> Pengunjung Hari Ini Per Jenis Pengunjung   </h1> </center>
    <table border="1">
      <tr align="center" style="font-weight: bold;">
          <th>Mahasiswa</th>
          <th>Dosen</th>
          <th>Jumlah</th>
      </tr>
    </table>
EOD;

$pdf->Ln(10);
$pdf->SetX(10);
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, 'C', true);
$pdf->SetX(10);
$totalKategoriPerHari = $perHariMhs + $perHariDosen;
$pdf->writeHTMLCell(0, 0, '', '', $html2.''.$perHariMhs.'</td><td>'.$perHariDosen.'</td><td>'.$totalKategoriPerHari.''.$html5 , 0, 1, 0, true, '', true);


$html=<<<EOD
    <center> <h1> Pengunjung Bulan Ini Per Jenis Kelamin  </h1> </center>
    <table border="1">
      <tr align="center" style="font-weight: bold;">
          <th>Laki-Laki</th>
          <th>Perempuan</th>
          <th>Jumlah</th>
      </tr>
    </table>
EOD;

$pdf->Ln(10);
$pdf->SetX(10);
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, 'C', true);
$pdf->SetX(10);
$totalJekelPerBulan = $pria + $wanita ;
$pdf->writeHTMLCell(0, 0, '', '', $html2.''.$pria.'</td><td>'.$wanita.'</td><td>'.$totalJekelPerBulan.''.$html5 , 0, 1, 0, true, '', true);

$html=<<<EOD
    <center> <h1> Pengunjung Bulan Ini Per Jenis Pengunjung   </h1> </center>
    <table border="1">
      <tr align="center" style="font-weight: bold;">
          <th>Mahasiswa</th>
          <th>Dosen</th>
          <th>Jumlah</th>
      </tr>
    </table>
EOD;

$pdf->Ln(10);
$pdf->SetX(10);
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, 'C', true);
$pdf->SetX(10);
$totalKategoriPerBulan = $mhs + $dosen;
$pdf->writeHTMLCell(0, 0, '', '', $html2.''.$mhs.'</td><td>'.$dosen.'</td><td>'.$totalKategoriPerBulan.''.$html5 , 0, 1, 0, true, '', true);


// $pdf->Cell(60,0, 'Laporan dari Tanggal '.$a.' Sampai '.$b, 0, 1, 'L', 0, '', 0);

ob_end_clean();
$pdf->Output('tes.pdf', 'I');
