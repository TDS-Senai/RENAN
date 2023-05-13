<?php
    include 'conecta.php';
    $id = $_GET['id'];
    $pesquisa = mysqli_query($conn, "SELECT * FROM estaciona WHERE id=$id");
    $row = mysqli_num_rows($pesquisa);
    if ($row > 0) 
        {
            while ($cliente = $pesquisa->fetch_array()) 
                {
                    $hora_entrada = $cliente['hora_entrada'];
                }
    }
    $pesquisa2 = mysqli_query($conn, "SELECT timediff(hora_saida,hora_entrada) as tempo from estaciona WHERE id=$id");
    $row2 = mysqli_num_rows($pesquisa2);
    if ($row2 > 0) 
        {
            while ($cliente2 = $pesquisa2->fetch_array()) 
                {
                    $tempo = $cliente2['tempo'];
                }
    }

    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d');
    $hora = date('H:i:s');
    $valor = (15/60)/60;
    $tempo2 = $tempo;
    $partes = explode(':', $tempo2);
    $segundos = $partes[0] * 3600 + $partes[1] * 60 + $partes[2];
    $pagar = $valor * $segundos;
    $pagamento = number_format($pagar, 2, '.');
    if ($pagamento < 0) 
    {
        $pag = $pagamento * -1;
    }
    else 
    {
        $pag = $pagamento;
    }
    $sql = "UPDATE estaciona SET hora_saida='$hora', data_saida='$data', valor='$pag', situacao='OK' WHERE id=$id";
    if (mysqli_query($conn, $sql))
        {
            echo "<script language='javascript' type='text/javascript'>
            window.location.href='index.php'
            </script>";
        }
        else 
        {
            echo "Erro: ".mysqli_error($conn).PHP_EOL;
        }
    mysqli_close($conn);
?>