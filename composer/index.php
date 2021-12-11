<?php

require_once './vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHTML("<h1>Meu HTML</h1>");
$dompdf->render();
$dompdf->stream("arquivo.pdf", ["Attachment" => false]);
