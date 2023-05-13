<?php
    include 'conecta.php';
    date_default_timezone_set('America/Sao_Paulo');
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];
    $placa = $_POST['placa'];
    $valor = 650;
    $data = date('Y-m-d');
    $data_final = date('Y-m-d', strtotime("+30 days", strtotime($data)));
    $query = $conn->query("SELECT * FROM mensalistas WHERE cpf='$cpf'");
    if (mysqli_num_rows($query) > 0) 
    {
        echo "<script language='javascript' type='text/javascript'>
             alert('Mensalista já está cadastrado em nossa base de dados!');
             window.location.href='index.php'
             </script>";
             exit(); 
    }
    else
    {
        $sql = "INSERT INTO mensalistas(nome,cpf,endereco,data_inicio,data_final,placa,valor) VALUES ('$nome','$cpf','$endereco','$data','$data_final','$placa','$valor')";
        if (mysqli_query($conn, $sql))
        {
            echo "<script language='javascript' type='text/javascript'>
             alert('Mensalista cadastrado com sucesso!');
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