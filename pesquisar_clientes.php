<?php
include_once("includes/conn.php");
session_start();
session_destroy();

if (isset($_SESSION['atualizado'])) {
    echo '<div class="alert alert-success fw-bold text-center" role="alert">Atualizado</div>';
}

$sql_select = "select * from clientes";
$query_select = $conn->query($sql_select) or die("erro sql" . $conn->error);

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $pesquisar = $_POST['pesquisar'];
    $result_clientes = "select * from clientes where nome like '%$pesquisar%'";
    $resultado_clientes = $conn->query($result_clientes) or die('erro sql' . $conn->error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 0;
}

if ($id > 0) {
    $sql_delete = "delete from clientes where '$id' = id_clientes";
    $query_delete = $conn->query($sql_delete) or die('erro sql ' . $conn->error);
    header('Location: pesquisar_clientes.php');
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
        <h1 class="my-3 text-center fw-bold">Pesquisar Cliente</h1>
        <form method="POST">
            <div class="mb-3">
                <input type="text" class="form-control text-center" name="pesquisar" placeholder="Pesquise por nome">
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </div>
        </form>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Nome</th>
                    <th>Cidade</th>
                    <th>Bairro</th>
                    <th>Rua</th>
                    <th>Número</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php

                if (isset($pesquisar)) {
                    while ($row = mysqli_fetch_array($resultado_clientes)) {
                        echo "<tr>";
                        echo "<th><a href='atualizar_cadastros.php?id=" . $row['id_clientes'] . "'><i class='fa-solid fa-clipboard fs-4'></i></a></th>";
                        echo "<th><a href='vendas.php?id=" . $row['id_clientes'] . "'><i class='fa-sharp fa-solid fa-coins fs-4 text-warning'></i></a></th>";
                        echo "<th>" . $row['nome'] . "</th>";
                        echo "<th>" . $row['cidade'] . "</th>";
                        echo "<th>" . $row['bairro'] . "</th>";
                        echo "<th>" . $row['rua'] . "</th>";
                        echo "<th>" . $row['numero'] . "</th>";
                        echo "<th><a href='pesquisar_clientes.php?id=" . $row['id_clientes'] . "'><i class='fa-solid fa-trash fs-4 text-danger'></i></a></th>";
                        echo "</tr>";
                    }
                } else {
                    while ($row = mysqli_fetch_assoc($query_select)) {
                        echo "<tr>";
                        echo "<th><a href='atualizar_cadastros.php?id=" . $row['id_clientes'] . "'><i class='fa-solid fa-clipboard fs-4'></i></a></th>";
                        echo "<th><a href='vendas.php?id=" . $row['id_clientes'] . "'><i class='fa-sharp fa-solid fa-coins fs-4 text-warning'></i></a></th>";
                        echo "<th>" . $row['nome'] . "</th>";
                        echo "<th>" . $row['cidade'] . "</th>";
                        echo "<th>" . $row['bairro'] . "</th>";
                        echo "<th>" . $row['rua'] . "</th>";
                        echo "<th>" . $row['numero'] . "</th>";
                        echo "<th><a href='pesquisar_clientes.php?id=" . $row['id_clientes'] . "'><i class='fa-solid fa-trash fs-4 text-danger'></i></a></th>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include_once("includes/btn_back.php"); ?>
    <?php include_once("includes/scripts.php") ?>
</body>

</html>