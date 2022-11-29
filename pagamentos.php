<?php
include_once("includes/conn.php");
session_start();
session_destroy();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 0;
}

$sql_select = "SELECT vendas.`create`, clientes.id_clientes, clientes.nome, produtos.nome, produtos.valor FROM vendas
INNER JOIN clientes ON clientes.id_clientes = vendas.id_clientes
INNER JOIN produtos ON produtos.id_produtos = vendas.id_produtos
WHERE clientes.id_clientes = '$id'";
$query_select = $conn->query($sql_select) or die('erro select ' . $conn->error);

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
        <div class="row bg-danger">
            <a href="home.php" class="col-3">
                <i class="fa-regular fa-circle-left mt-3" style="font-size: 3.5rem;color: snow;">
                </i>
            </a>
            <h1 class="fw-bold text-center my-3 col-6">Pagamentos</h1>
            <div class="col-3"></div>
        </div>

        <form class="text-center">
            <input class="form-control mt-3 text-center" placeholder="Valor Pagamento" type="text" name="pagamento">
            <button class="btn btn-primary my-3">Pagar</button>
        </form>

        <table class="table text-white">
            <thead>
                <tr>
                    <th>Cesta</th>
                    <th>Valor</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($query_select)) {
                    echo '<tr>';
                    echo '<td>' . $row['nome'] . '</td>';
                    echo '<td>' . number_format($row['valor'], 2) . '</td>';
                    echo '<td>' . $row['create'] . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>

    </div>


    <?php include_once("includes/scripts.php") ?>
</body>

</html>