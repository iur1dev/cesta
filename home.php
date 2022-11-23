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
        <div class="bg-danger p-3 rounded-3">
            <a href="cadastrar_clientes.php" class="text-center text-decoration-none font_snow">
                <i class="fa-solid fa-address-card tamanho_icone_home"><span class="fs-2">&nbsp;&nbsp;Cadastrar Clientes</span></i><br>
            </a>
            <br>
            <a href="pesquisar_clientes.php" class="text-center text-decoration-none font_snow">
                <i class="fa-solid fa-magnifying-glass tamanho_icone_home"><span class="fs-2">&nbsp;&nbsp;Pesquisar Clientes</span></i><br>
            </a>
        </div>
    </div>

    <?php include_once("includes/scripts.php") ?>
</body>

</html>