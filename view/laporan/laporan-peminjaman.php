<?php
require_once '../../config/autoload.php';
require_once '../../config/config.php';
require_once '../../config/connection.php';
include('../../models/admin.php');

$obj = new Connection($host, $user, $pass, $db);
$objAdmin = new Admin($obj);

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
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP + 20, PDF_MARGIN_RIGHT);
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
    <center> <h1> Laporan Peminjaman </h1> </center>
    <table border="1">
      <tr align="center" style="font-weight: bold;">
          <th>No Peminjaman</th>
          <th>Nip</th>
          <th>Nama Petugas</th>
          <th>Id Petugas</th>
          <th>Nama Anggota</th>
          <th>Kode Buku</th>
          <th>Jumlah Buku</th>
          <th>Tanggal Pinjam</th>
          <th>Tanggal kembali</th>
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
$pdf->SetX(10);
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, 'C', true);

$no = 1;
  $sql = $objAdmin->showPeminjaman();
	while ($data = $sql->fetch_object()) {
      $pdf->SetX(10);
      $pdf->writeHTMLCell(0, 0, '', '', $html2.''.
            $data->no_pinjaman.'</td>
            <td>'.$data->nip.'</td>
            <td>'.$data->nama_petugas.'</td>
            <td>'.$data->id_anggota.'</td>
            <td>'.$data->nama_anggota.'</td>
            <td>'.$data->kd_buku.'</td>
            <td>'.$data->jdl_buku.'</td>
            <td>'.$data->tgl_pinjam.'</td>
            <td>'.$data->tgl_kembali.'
            '.$html5 , 0, 1, 0, true, '', true);
    $no++;
  }


// $pdf->Ln(10);
// $pdf->SetX(20);
// $pdf->Cell(60,0, 'Laporan dari Tanggal '.$a.' Sampai '.$b, 0, 1, 'L', 0, '', 0);

ob_end_clean();
$pdf->Output('tes.pdf', 'I');
