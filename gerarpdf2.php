<?php 
include 'conecta.php';

//Receber da url o termo para pequisa.

$placa_pesquisar = filter_input(INPUT_GET, 'placa_pesquisar', FILTER_DEFAULT);
$placa = "%" . $placa_pesquisar . "%";

//  QUERY recuperar registro do banco de dados

$res = $conn->query("SELECT * FROM  estaciona WHERE placa LIKE '$placa' ORDER BY id DESC");
    if (mysqli_num_rows($res) > 0) 

if ($res->num_rows > 0 ){
    
        $html  = "<center><h1> ParkWheel - Gerenciador de estacionamento </h1> </center> ";
        $html .= "<h3>Relatório de Cadastro</h3>";
        $html .= "<table style='width:80%' border='7''";
        $html .= "<tr>";
        $html .= "<th>Id</th>";
        $html .= "<th>Placa</th>";
        $html .= "<th>Hora Entrada</th>";
        $html .= "<th>Data Entrada</th>";
        $html .= "<th>Hora Saída</th>";
        $html .= "<th>Data Saída </th>";
        $html .= "<th>Valor </th>";
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
$dompdf->set_option('defaultFont', 'Courier');

$dompdf->set_option('A4', 'landscape');

$dompdf->render();

$dompdf->stream('relatorio.pdf', array('Attachment'=>false));  

?>