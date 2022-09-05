<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="./css/admin.css">
<link rel="stylesheet" href="./css/style.css">
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