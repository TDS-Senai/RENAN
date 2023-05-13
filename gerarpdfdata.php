<?php 
include 'conecta.php';

//Receber da url o termo para pequisa.
$data_inicio = filter_input(INPUT_GET, 'data_inicio', FILTER_DEFAULT);

$data_final = filter_input(INPUT_GET, 'data_final', FILTER_DEFAULT);

// // QUERY registro do banco de dados

$res = $conn->query("SELECT * FROM estacionaok WHERE data_entrada and data_saida BETWEEN '$data_inicio' AND '$data_final' ");
    if (mysqli_num_rows($res) > 0) 

if ($res->num_rows > 0 ){
    
        $html  = "<center><h1 style='padding:0px'> ParkWheel - Gerenciador de estacionamento </h1> </center> ";
        $html .= "<center><p style='font-size: 9px'> Rua 1001 nº 100 Zona 10 Maringá (44) 3228-7070 Email: parkwheel@parkwheel.com </p></center> ";
        $html .= "<h2 style='font-size: 16px'>Relatório Geral</h2>";
        $html .= "<table style='width:100%' border='3''";
        $html .= "<tr>";
        $html .= "<th style='background:green; text-align:center'>Id</th>";
        $html .= "<th style='background:green; text-align:center' >Placa</th>";
        $html .= "<th style='background:green; text-align:center' >Hora Entrada</th>";
        $html .= "<th style='background:green; text-align:center' >Data Entrada</th>";
        $html .= "<th style='background:green; text-align:center'>Hora Saída</th>";
        $html .= "<th style='background:green; text-align:center'>Data Saída </th>";
        $html .= "<th style='background:green; text-align:center'>Valor </th>";
        $html .= "</tr>";

    while($row = $res->fetch_object()){
        $html  .= "<tr>";
        $html  .= "<td>" .$row->id."</td>";
        $html  .= "<td>".$row->placa."</td>";
        $html  .= "<td>".$row->hora_entrada."</td>";
        $html  .= "<td>".$row->data_entrada."</td>";
        $html  .= "<td>".$row->hora_saida."</td>";
        $html  .= "<td>".$row->data_saida."</td>";
        $html  .= "<td>".$row->valor."</td>";

        $html  .= "</tr>";
    }
    $html  .= "</table>";
}else {
    $html  .= "Nenhum registro!";
}
// print $html;

use Dompdf\Dompdf;
require_once 'dompdf/autoload.inc.php';

$dompdf = new Dompdf();

$dompdf->loadHtml($html);

//Config das info.
$dompdf->set_option('defaultFont', 'Arial');

$dompdf->set_option('A4', 'landscape');

$dompdf->render();

$dompdf->stream('relatoriodata.pdf', array('Attachment'=>false));  

?>