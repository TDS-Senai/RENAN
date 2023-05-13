<?php 
include 'conecta.php';

$res = $conn->query("SELECT * FROM estaciona");
    if (mysqli_num_rows($res) > 0) 

if ($res->num_rows > 0 ){

    // $html  = "<!DOCTYPE html>";
    // $html  .= "<html lang='pt-br'>";
    // $html  .= "<head>";
    // $html  .= " <meta charset='UTF-8'>";
    // $html  .= "<title> ParkWheel - Gerar PDF</title>";
    // $html  .= "<head>";
    // $html  .= "<body>";
    // $html  .= "<center><h1 style='color:blue'> ParkWheel - Gerenciador de estacionamento </h1> </center>";
    // $html  .= "";
    // $html  .= "";
    // $html  .= "";
    // $html  .= "<body>";

        $html  = "<center><h1 style='padding:0px'> ParkWheel - Gerenciador de estacionamento </h1> </center> ";
        $html .= "<center><p style='font-size: 9px'> Rua 1001 nº 100 Zona 10 Maringá (44) 3228-7070 Email: parkwheel@parkwheel.com </p></center> ";
        $html .= "<h2 style='font-size: 16px'>Relatório Geral</h2>";
        $html .= "<table style='width:100%' border='3''";
        $html .= "<tr>";
        $html .= "<th style='background:pink; text-align:center'>Id</th>";
        $html .= "<th style='background:pink; text-align:center' >Placa</th>";
        $html .= "<th style='background:pink; text-align:center' >Hora Entrada</th>";
        $html .= "<th style='background:pink; text-align:center' >Data Entrada</th>";
        $html .= "<th style='background:pink; text-align:center'>Hora Saída</th>";
        $html .= "<th style='background:pink; text-align:center'>Data Saída </th>";
        $html .= "<th style='background:pink; text-align:center'>Valor </th>";
        $html .= "</tr>";

    while($row = $res->fetch_object()){
        $html  .= "<tr>";
        $html  .= "<td style='text-align:center'>" .$row->id."</td>";
        $html  .= "<td style='text-align:center'>".$row->placa."</td>";
        $html  .= "<td style='text-align:center'>".$row->hora_entrada."</td>";
        $html  .= "<td style='text-align:center'>".$row->data_entrada."</td>";
        $html  .= "<td style='text-align:center'>".$row->hora_saida."</td>";
        $html  .= "<td style='text-align:center'>".$row->data_saida."</td>";
        $html  .= "<td style='text-align:center'>".$row->valor."</td>";

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

$dompdf->stream('relatorio.pdf', array('Attachment'=>false));  

?>

