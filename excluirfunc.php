<?php
    include 'conecta.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM funcionarios WHERE id='$id'";
    if (mysqli_query($conn, $sql)) 
    {    
        echo "<script language='javascript' type='text/javascript'>
            alert('Funcionario excluido com sucesso!');
            window.location.href='index.php'
            </script>";
    }   
    else
    {
        echo "Erro : ".mysqli_connect_error().PHP_EOL;
    }
    mysqli_close($conn);
?>