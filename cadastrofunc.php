<?php
    include 'conecta.php';
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $celular = $_POST['celular'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $query = $conn->query("SELECT * FROM funcionarios WHERE cpf='$cpf'");
    if (mysqli_num_rows($query) > 0) 
    {
        echo "<script language='javascript' type='text/javascript'>
             alert('Funcionário já existe em nossa base de dados!');
             window.location.href='funcionario.php'
             </script>";
             exit(); 
    }
    else
    {
        $sql = "INSERT INTO funcionarios(nome,cpf,celular,login,senha) VALUES ('$nome','$cpf','$celular','$login','$senha')";
        if (mysqli_query($conn, $sql))
        {
            echo "<script language='javascript' type='text/javascript'>
             alert('Funcionário cadastrado com sucesso!');
             window.location.href='funcionario.php'
             </script>";
        }
        else 
        {
            echo "Erro: ".mysqli_error($conn).PHP_EOL;
        }
    }
    mysqli_close($conn);
?>




