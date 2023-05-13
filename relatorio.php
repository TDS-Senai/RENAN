<?php 
include 'conecta.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-language"  content="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
</head>
<body>

    <h1>Gerar Relatório - Busca por Placa</h1>

    <?php
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    ?>

    <?php //Mantem o termo da pesquisa (colocado após o place holder no input abaixo).
        $placa_pesquisar = "";
        if(isset($dados['placa_pesquisar'])){ //se existir o campo pesquisar...
            $placa_pesquisar = $dados['placa_pesquisar'];
        }

       echo " <a href='gerarpdf2.php?placa_pesquisar=$placa_pesquisar'>Gerar PDF</a> <br><br>";
    ?>

     <form method="POST" action="">
        
        <label>Pesquisar</label>
        <input type="text" name="placa_pesquisar" placeholder="Pesquisa pela placa?" value="<?php echo $placa_pesquisar; ?>"><br><br>

        <input type="submit" value="Pesquisar" name="PesqPlaca"> <br><br>
    </form>    

    <?php
    if(!empty($dados['PesqPlaca'])){
        $placa = "%" . $dados['placa_pesquisar'] . "%";
        // $query_placas = $conn->query("SELECT * FROM estaciona WHERE placa LIKE :placa ORDER BY id DESC");

    $query_placas = $conn->query("SELECT * FROM  estaciona WHERE placa LIKE '$placa' ORDER BY id DESC");
    if (mysqli_num_rows($query_placas) > 0){

        // $res_placas = $conn->prepare($query_placas);
        // $res_placas->bindParam(':placa', $placa);  
        // $res_placas->execute();
        //    if(($query_placas) and ($query_placas->rowCount()) !=0){
        if($query_placas->num_rows > 0 ){

            while($row_placa = $query_placas->fetch_object())
            {
                // var_dump($row_placa);
                current($row_placa);
                echo "ID: $row_placa->id <br>";
                echo "Placa: $row_placa->placa <br>";
                echo "Hora Entrada: $row_placa->hora_entrada <br>";
                echo "Data Entrada: $row_placa->data_entrada <br>";
                echo "Hora Saída: $row_placa->hora_saida <br>";
                echo "Data Saída: $row_placa->data_saida <br>";
                echo "Valor: $row_placa->valor <br>";
                echo "<hr>";
                
            }
            
        }
            } else {
                echo "<p style='color:red;'>Nenhum registro encontrado!</p>";
        }

    
    }

    ?>

<h1> Gerar Relatório Geral </h1>
<a href=gerarpdf.php?>Gerar PDF com todos os registros</a> <br><br>;


</body>
</html>