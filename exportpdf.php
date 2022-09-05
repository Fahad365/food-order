<!-- Include MPDF library from  MPDF github Repositories  -->
<?php
require_once __DIR__ . '/vendor/autoload.php';

// Grab The variable
$html=$_POST['html'];
// library from  MPDF github Repositories

$mpdf = new \Mpdf\Mpdf();

$data='';
$data.='<h1>Your Details</h1>';
$data=''.$html;

// Write PDF
$mpdf->WriteHTML($data);
$mpdf->Output('My File.pdf','D');