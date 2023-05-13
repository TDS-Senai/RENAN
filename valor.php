<?php
  include 'conecta.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="content-language" content="pt-br">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Estacionamento</title>
        <link href="scripts/bootstrap5/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="scripts/bootstrap5/js/bootstrap.min.js"></script>
        <script type="text/javascript">
          window.onload = function () {
            OpenBootstrapPopup();
          };
            function OpenBootstrapPopup() {
              $("#exampleModal").modal('show');
            }
        </script>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Total a pagar (R$)</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <?php
                  $id = $_GET['id'];
                  $pesquisa = mysqli_query($conn, "SELECT * FROM estaciona WHERE id=$id");
                  while ($cliente = $pesquisa->fetch_array()) 
                    {
                      $placa = $cliente['placa'];
                      $hora_entrada = $cliente['hora_entrada'];
                      $data_entrada = $cliente['data_entrada'];
                      $hora_saida = $cliente['hora_saida'];
                      $data_saida = $cliente['data_saida'];
                      $valor = $cliente['valor'];
                      $situacao = $cliente['situacao'];                                                    
                    }
                    $sql = "INSERT INTO estacionaOK(placa,hora_entrada,data_entrada,hora_saida,data_saida,valor,situacao) VALUES ('$placa','$hora_entrada','$data_entrada','$hora_saida','$data_saida','$valor','$situacao')";
                    mysqli_query($conn, $sql);
                    echo "<form action='index.php'>";
                    echo "<h3>Valor Total</h3><br/>";
                    echo "<center><h1>R$ ".$valor."</h1></center>";
                    echo "<br/>";
                    mysqli_query($conn, "DELETE FROM estaciona WHERE id=$id");
                    echo "<button type='submit' class='btn btn-outline-success'>Pagamento realizado</button>";
                    echo "</form>";
                ?>
              </div>
            </div>
          </div>
        </div>
    </body>
</html>