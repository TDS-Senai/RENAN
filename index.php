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
        <style>
            body {
                background-color: #DCDCDC;
                 }
            .header {
                float: right;
            }
        </style>
    </head>
    <body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="scripts/bootstrap5/js/bootstrap.min.js"></script>
        <div class="container-fluid">
            <img src="imagens/fig1.png" width="3%" height="3%">
            <hr>
        </div>
        <center>
            <h1><p style="font-weight: bold;">AVULSO</p></h1>
        </center>
        <nav></nav>
        <main>
            <div class="container">
                <div class="row justify-content-center row-cols-2 row-cols-4 mb-4 text-center">
                    <div class="col-md-9">
                        <div class="card mb-4 rounded-3 shadow-sm">
                            <div class="card-reader py-3">
                                <b>CLIENTES</b>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            
                                            <th scope="col">Placa</th>
                                            <th scope="col">Entrada</th>
                                            <th scope="col">Data da Entrada</th>
                                            <th scope="col">Saída</th>
                                            <th scope="col">Data da Saída</th>
                                            <th scope="col">Valor </th>
                                            <th scope="col">Ações</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $pesquisa = mysqli_query($conn, "SELECT * FROM estaciona WHERE data_entrada = curdate()");
                                            $row = mysqli_num_rows($pesquisa);
                                            if ($row > 0) 
                                            {
                                                while ($cliente = $pesquisa->fetch_array()) 
                                                {
                                                    $id = $cliente['id'];
                                                    $data_entrada = date('d/m/Y', strtotime($cliente['data_entrada']));
                                                    $data_saida = date('d/m/Y', strtotime($cliente['data_saida']));
                                                    echo "<tr>";
                                                    echo "<td>".$cliente['id']."</td>";
                                                    echo "<td>".$cliente['placa']."</td>";
                                                    echo "<td>".$cliente['hora_entrada']."</td>";
                                                    echo "<td>".$data_entrada."</td>";
                                                    echo "<td>".$cliente['hora_saida']."</td>";
                                                    echo "<td>".$data_saida."</td>";
                                                    echo "<td>".$cliente['valor']."</td>";
                                                    echo "<td><a href='saida.php?id=$id' class='btn btn-outline-danger' role='button'>Saída</a>  | <a href='valor.php?id=$id' class='btn btn-outline-success' role='button'>Pagar</a></td>";
                                        ?>
                                        <?php
                                                    echo "</tr>";
                                                }
                                            }
                                            else 
                                            {
                                                echo "Não há nenhum cliente estacionado!";
                                                mysqli_close($conn);
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <button type="button" class="w-100 btn btn-lg btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>Novo Veículo</b></button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Cadastro de Veículo</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="cadastro.php" method="post">
                                            <div class="form-group" style="text-align: left;">
                                                <label class="form-label">Placa</label>
                                                <input type="text" class="form-control" name="placa"/>
                                                <br>
                                                <button type="submit" class="btn btn-outline-success mb-3">Cadastrar</button>
                                            </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <center>
            <h1><p style="font-weight: bold;">MENSALISTAS</p></h1>
        </center>

        <main>
            <div class="container">
                <div class="row justify-content-center row-cols-2 row-cols-4 mb-4 text-center">
                    <div class="col-md-9">
                        <div class="card mb-4 rounded-3 shadow-sm">
                            <div class="card-reader py-3">
                                <b>MENSALISTAS</b>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">NOME</th>
                                            <th scope="col">CPF</th>
                                            <th scope="col">ENDEREÇO</th>
                                            <th scope="col">DATA INICIAL</th>
                                            <th scope="col">DATA FINAL</th>
                                            <th scope="col">PLACA</th>
                                            <th scope="col">VALOR </th>
                                            <th scope="col">AÇÕES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $pesquisa = mysqli_query($conn, "SELECT * FROM mensalistas");
                                            $row = mysqli_num_rows($pesquisa);
                                            if ($row > 0) 
                                            {
                                                while ($cliente = $pesquisa->fetch_array()) 
                                                {
                                                    $id = $cliente['id_mensalista'];
                                                    $data_inicio = date('d/m/Y', strtotime($cliente['data_inicio']));
                                                    $data_final = date('d/m/Y', strtotime($cliente['data_final']));
                                                    echo "<tr>";
                                                    echo "<td>".$cliente['id_mensalista']."</td>";
                                                    echo "<td>".$cliente['nome']."</td>";
                                                    echo "<td>".$cliente['cpf']."</td>";
                                                    echo "<td>".$cliente['endereco']."</td>";
                                                    echo "<td>".$data_inicio."</td>";
                                                    echo "<td>".$data_final."</td>";
                                                    echo "<td>".$cliente['placa']."</td>";
                                                    echo "<td>".$cliente['Valor']."</td>";
                                                    echo "<td><a href='saida.php?id=$id' class='btn btn-outline-danger' role='button'>Saída</a></td>";
                                        ?>
                                        <?php
                                                    echo "</tr>";
                                                }
                                            }
                                            else 
                                            {
                                                echo "Não há nenhum cliente estacionado!";
                                                mysqli_close($conn);
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <button type="button" class="w-100 btn btn-lg btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal2"><b>Novo Mensalista</b></button>
                                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Cadastro de Mensalista</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="cadastromensalista.php" method="post">
                                            <div class="form-group" style="text-align: left;">
                                                <label class="form-label">Nome</label>
                                                <input type="text" class="form-control" name="nome"/>
                                                <br>
                                                <label class="form-label">Cpf</label>
                                                <input type="text" class="form-control" name="cpf"/>
                                                <br>
                                                <label class="form-label">Endereço</label>
                                                <input type="text" class="form-control" name="endereco"/>
                                                <br>
                                                <label class="form-label">Placa</label>
                                                <input type="text" class="form-control" name="placa"/>
                                                <br>
                                                <button type="submit" class="btn btn-outline-success mb-3">Cadastrar</button>
                                            </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>