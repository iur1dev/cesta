<?php
include_once("includes/conn.php");

$sql_select = "select * from clientes";
$query_select = $conn->query($sql_select) or die("erro sql" . $conn->error);

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $pesquisar = $_POST['pesquisar'];
    $result_clientes = "select * from clientes where nome like '%$pesquisar%'";
    $resultado_clientes = $conn->query($result_clientes) or die('erro sql' . $conn->error);

    while ($row = mysqli_fetch_array($resultado_clientes)) {
        echo "nome cliente: " . $row['nome'] . "<br>";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazer Pedido</title>
    <?php include_once("includes/head.php") ?>
</head>

<body>
    <div class="container">
        <h1>Pesquisar Cliente</h1>
        <form method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" name="pesquisar" placeholder="Pesquisar Cliente">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </div>
        </form>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Celular</th>
                    <th>Cidade</th>
                    <th>Bairro</th>
                    <th>Rua</th>
                    <th>Número</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($query_select)) {
                    echo "<tr>";
                    echo "<th>" . $row['nome'] . "</th>";
                    echo "<th>" . $row['cpf'] . "</th>";
                    echo "<th>" . $row['celular'] . "</th>";
                    echo "<th>" . $row['cidade'] . "</th>";
                    echo "<th>" . $row['bairro'] . "</th>";
                    echo "<th>" . $row['rua'] . "</th>";
                    echo "<th>" . $row['numero'] . "</th>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include_once("includes/btn_back.php"); ?>
    <?php include_once("includes/scripts.php") ?>
</body>

</html>