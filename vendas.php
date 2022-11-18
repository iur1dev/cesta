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
   
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>att Pedido</title>
    <?php include_once("includes/head.php") ?>
</head>

<body>
    <div class="container">
        <h1 class="fw-bold text-center my-3">Vendas</h1>
        <div class="card mx-auto mb-3" style="width: 18rem;">
            <div class="card-body">
                <?php

                while ($row2 = mysqli_fetch_assoc($query_select2)) {
                ?>
                    <h5 class="card-title"><?php echo $row2['nome']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $row2['cpf']; ?></h6>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $row2['numero']; ?></h6>
                    <p class="card-text"><?php echo $row2['cidade']; ?></p>
                    <p class="card-text"><?php echo $row2['bairro']; ?></p>
                    <p class="card-text"><?php echo $row2['rua']; ?></p>
                    <p class="card-text"><?php echo $row2['numero']; ?></p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                <?php
                }
                ?>
            </div>
        </div>

        <form action="">
            <select class="form-select my-3" aria-label="Default select example">
                <?php

                while ($row = mysqli_fetch_assoc($query_select)) {
                    echo "<option>" . $row['nome'] . "</option>";
                }

                ?>
            </select>
            <div class="text-center">
                <button class="btn btn-primary" type="submit">Enviar</button>
            </div>
        </form>
    </div>
    <?php include_once("includes/btn_back.php"); ?>
    <?php include_once("includes/scripts.php") ?>
</body>

</html>