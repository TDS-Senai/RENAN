<?php
    $conn = mysqli_connect("localhost","root","","revisao");
    mysqli_set_charset($conn, "utf8");
    if (!$conn) 
    {
        echo "Falha ao conectar-se ao Database, verifique!!".PHP_EOL;
        echo "Erro: ".mysqli_connect_error().PHP_EOL;
    }
?>