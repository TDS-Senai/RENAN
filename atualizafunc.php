<?php
    include 'conecta.php';
    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $celular = $_POST['celular'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $sql = "UPDATE funcionarios SET nome='$nome', cpf='$cpf', login='$login', senha='senha' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) 
    {    
        echo "<script language='javascript' type='text/javascript'>
        alert('Funcionario atualizado com sucesso!');
        window.location.href='index.php'
        </script>";
    }   
    else
    {
        echo "Erro : ".mysqli_connect_error().PHP_EOL;
    }
    mysqli_close($conn);
?>