<?php include_once("includes/conn.php") ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php include_once("includes/head.php") ?>
</head>

<body>
    <div class="container_principal">
        <a href="cadastrar_clientes.php" class="text-center text-decoration-none fontBlack mb-3 fs-2">
            <i class="fa-solid fa-address-card"> Cadastrar Clientes</i><br>
        </a>

        <a href="fazer_pedidos.php" class="text-center text-decoration-none fontBlack mb-3 fs-2">
            <i class="fa-solid fa-address-card"> Fazer Pedidos</i><br>
        </a>

        <a href="" class="text-center text-decoration-none fontBlack mb-3 fs-2">
            <i class="fa-solid fa-clipboard-question"> Consultas</i><br>
        </a>

        <a href="" class="text-center text-decoration-none fontBlack mb-3 fs-2">
            <i class="fa-sharp fa-solid fa-warehouse"> Estoque</i><br>
        </a>

        <a href="" class="text-center text-decoration-none fontBlack mb-3 fs-2">
            <i class="fa-solid fa-coins"> Controle Financeiro</i><br>
        </a>
    </div>

    <?php include_once("includes/scripts.php") ?>
</body>

</html>