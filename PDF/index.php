<?php

require_once __DIR__ . '/vendor/autoload.php';
//Inicia o buffer, qualquer HTML que for sair agora será capturado para o buffer
ob_start(); 
include('conteudo.php');
//Limpa o buffer jogando todo o HTML em uma variável.
$html = ob_get_clean();
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->SetFooter('{DATE j/m/Y  H:i}||Pagina {PAGENO}/{nb}');
$mpdf->Output();