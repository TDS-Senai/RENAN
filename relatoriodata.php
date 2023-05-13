<?php 
include 'conecta.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-language"  content="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
</head>
<body>

    <h1>Gerar Relatório - Busca por Placa</h1>

    <?php
        //receber os dados  do fomulário
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if((isset($dados['data_inicio'])) and (isset($dados['data_final']))){

            echo " <a href='gerarpdfdata.php?data_inicio=" . $dados['data_inicio']."&data_final=" .$dados['data_final'] . "'> PDF </a> <br><br>";
        } 
        
    ?>

    <form method="POST" action="">
        <?php
        $data_inicio = "";
        if(isset($dados['data_inicio'])){
            $data_inicio = $dados['data_inicio'];
        }
        ?>
        
        <label>Data de Inicio</label>
        <input type="date" name="data_inicio" value="<?php echo $data_inicio;?>">
        <br><br>

        <?php
        $data_final = "";
        if(isset($dados['data_final'])){
            $data_final = $dados['data_final'];

        }
        ?>
        
        <label>Data Final</label>
        <input type="date" name="data_final" value="<?php echo $data_final;?>">
        <br><br>
        <input type="submit" value="Pesquisar" name="PesqData"> <br><br>
         
    </form>    

    <?php
    if(!empty($dados['PesqData'])){

    // $query_datas = $conn->query("SELECT * FROM estacionaok WHERE data_entrada BETWEEN data_entrada AND data_saida ");
    $query_datas = $conn->query("SELECT * FROM estacionaok WHERE data_entrada and data_saida BETWEEN '$data_inicio' AND '$data_final' ");
    
     if (mysqli_num_rows($query_datas) > 0){

            while($row_data = $query_datas->fetch_object()) {
                // var_dump($row_placa);
                // current($row_data);

                // $data_entrada = date('d/m/Y', strtotime($row_data->data_entrada));
                // $data_saida = date('d/m/Y', strtotime($row_data->data_saida));
                echo "ID: $row_data->id <br>";
                echo "Placa: $row_data->placa <br>";
                echo "Hora Entrada: $row_data->hora_entrada <br>";
                // echo "Data Entrada: $data_entrada <br>";
                echo "Data Entrada: $row_data->data_entrada <br>";
                echo "Hora Saída: $row_data->hora_saida <br>";  
                // echo "Data Saída: $data_saida <br>";
                echo "Data Saída: $row_data->data_saida <br>";
                echo "Valor: $row_data->valor <br>";
                echo "<hr>";

                
                
            }
            
        }
            } else {
                echo "<p style='color:f00;'>Nenhum registro encontrado!</p>";
        }


    ?>

</body>
</html>