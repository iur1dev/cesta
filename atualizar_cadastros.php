<?php
include_once("includes/conn.php");
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 0;
}

$sql_select = "select * from clientes where '$id' = id_clientes";
$query_select = $conn->query($sql_select) or die("erro sql " . $conn->error);

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $celular = $_POST['celular'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];

    $sql_update = "update clientes set nome = '$nome', cpf = '$cpf', celular = '$celular', cidade = '$cidade',
    bairro = '$bairro', rua = '$rua', numero = '$numero' where '$id' = id_clientes";
    $query_update = $conn->query($sql_update) or die('erro sql ' .  $conn->error);

    $_SESSION['atualizado'] = $query_update;

    header('Location: pesquisar_clientes.php');
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
        <h1 class="text-center fw-bold my-3">Atualizar Cadastro</h1>
        <form method="POST">
            <?php
            while ($row = mysqli_fetch_array($query_select)) {
                echo "<label for='nome' class='form-label'>Nome</label><input class='form-control mb-3' name='nome' id='nome' placeholder='Nome' type='text' value='" . $row['nome'] . "'>";
                echo "<label for='cpf' class='form-label'>CPF</label><input class='form-control mb-3' name='cpf' id='cpf' placeholder='Cpf' type='text' value='" . $row['cpf'] . "'>";
                echo "<label for='celular' class='form-label'>Celular</label><input class='form-control mb-3' name='celular' id='celular' placeholder='Celular' type='text' value='" . $row['celular'] . "'>";
                echo "<label for='cidade' class='form-label'>Cidade</label><input class='form-control mb-3' name='cidade' id='cidade' placeholder='Cidade' type='text' value='" . $row['cidade'] . "'>";
                echo "<label for='bairro' class='form-label'>Bairro</label><input class='form-control mb-3' name='bairro' id='bairro' placeholder='Bairro' type='text' value='" . $row['bairro'] . "'>";
                echo "<label for='rua' class='form-label'>Rua</label><input class='form-control mb-3' name='rua' id='rua' placeholder='Rua' type='text' value='" . $row['rua'] . "'>";
                echo "<label for='numero' class='form-label'>Número</label><input class='form-control mb-3' name='numero' id='numero' placeholder='Número' type='text' value='" . $row['numero'] . "'>";
            }
            ?>
            <div class="text-center">
                <button class="btn btn-primary mb-5" type="submit">Atualizar</button>
            </div>
        </form>
    </div>
    <?php include_once("includes/btn_back.php"); ?>
    <?php include_once("includes/scripts.php") ?>
</body>

</html>