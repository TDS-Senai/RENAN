<?php
    include 'conecta.php';
    date_default_timezone_set('America/Sao_Paulo');
    $placa = $_POST['placa'];
    $data = date('Y-m-d');
    $hora = date('H:i:s');
    $query = $conn->query("SELECT * FROM estaciona WHERE placa='$placa'");
    if (mysqli_num_rows($query) > 0) 
    {
        echo "<script language='javascript' type='text/javascript'>
             alert('Veículo já está estacionado!');
             window.location.href='index.php'
             </script>";
             exit(); 
    }
    else
    {
        $sql = "INSERT INTO estaciona(placa,hora_entrada,data_entrada,hora_saida,data_saida,valor,situacao) VALUES ('$placa','$hora','$data','','','','Aberto')";
        if (mysqli_query($conn, $sql))
        {
            echo "<script language='javascript' type='text/javascript'>
             alert('Veículo cadastrado com sucesso!');
             window.location.href='index.php'
             </script>";
        }
        else 
        {
            echo "Erro: ".mysqli_error($conn).PHP_EOL;
        }
    }
    mysqli_close($conn);
?>