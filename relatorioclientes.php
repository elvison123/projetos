<?php
error_reporting(E_ERROR);

require_once __DIR__ . '/vendor/autoload.php';

ob_start();
require_once __DIR__ . '/projetos/view/clientes/listar-cliente.php';
$conteudo = ob_get_contents();
ob_end_flush();

var_dump($conteudo);
die;

$mpdf = new mPDF;
$mpdf->WriteHTML($conteudo);
$mpdf->Output();
