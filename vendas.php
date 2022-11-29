<?php
include_once("includes/conn.php");
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 0;
}

$sql_select = "select * from produtos";
$query_select = $conn->query($sql_select) or die("erro sql " . $conn->error);

$sql_select2 = "select * from clientes where '$id' = id_clientes";
$query_select2 = $conn->query($sql_select2) or die("erro sql " . $conn->error);

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $sql = "insert into vendas (id_clientes, id_produtos)
    values ('$id', 1)";
    $query = $conn->query($sql) or die('erro sql ' . $conn->error);

    header('Location: home.php');
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Pedidos</title>
    <?php include_once("includes/head.php") ?>
</head>

<body>
    <div class="container">
        <div class="row bg-danger">
            <a href="home.php" class="col-3">
                <i class="fa-regular fa-circle-left mt-3" style="font-size: 3.5rem;color: snow;">
                </i>
            </a>
            <h1 class="fw-bold text-center my-3 col-6">Venda</h1>
            <div class="col-3"></div>
        </div>
        <div class="card mx-auto my-3 text-dark" style="width: 18rem;">
            <div class="card-body">
                <?php
                while ($row2 = mysqli_fetch_assoc($query_select2)) {
                ?>
                    <h5 class="card-title">Nome: <?php echo $row2['nome']; ?></h5>
                    <p class="card-text">ID: <?php echo $row2['id_clientes']; ?></p>
                    <p class="card-text">CEP: <?php echo $row2['cep']; ?></p>
                    <p class="card-text">Cidade: <?php echo $row2['cidade']; ?></p>
                    <p class="card-text">Bairro: <?php echo $row2['bairro']; ?></p>
                    <p class="card-text">Rua: <?php echo $row2['rua']; ?></p>
                    <p class="card-text">Número: <?php echo $row2['numero']; ?></p>
                <?php
                }
                ?>
            </div>
        </div>

        <form method="POST">
            <select class="form-select my-3 mx-auto" aria-label="Default select example" style="width:18rem;" name="id_vendas">
                <?php
                while ($row = mysqli_fetch_assoc($query_select)) {
                    echo "<option value='" . $row['id_produtos'] . "'>" . $row['nome'] . "</option>";
                }
                ?>
            </select>
            <div class="text-center">
                <button class="btn btn-primary" type="submit">Concluir</button>
            </div>
        </form>
    </div>
    <?php include_once("includes/scripts.php"); ?>
</body>

</html>