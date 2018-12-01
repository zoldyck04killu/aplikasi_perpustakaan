<?php
$html = 'ok';
ob_clean();
require './vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
$html2pdf = new Html2Pdf('P','A4','en');
$html2pdf->writeHTML($html);
$html2pdf->output('l.pdf');
?>
