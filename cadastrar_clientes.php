<?php
include_once("includes/conn.php");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $celular = $_POST['celular'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];

    $sql = "insert into clientes (nome, cpf, celular, cidade, bairro, rua, numero)
    values ('$nome', '$cpf', '$celular', '$cidade', '$bairro', '$rua', '$numero')";
    $query = $conn->query($sql) or die('erro sql ' . $conn->error);

    if ($query === true) {
        echo '<div class="alert alert-success fw-bold text-center" role="alert">Cadastrado</div>';
    } else {
        echo '<div class="alert alert-danger fw-bold text-center" role="alert">Erro ao Cadastrar</div>';
    }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Clientes</title>
    <?php include_once("includes/head.php") ?>
</head>

<body>

    <div class="container">
        <h1 class="fw-bold text-center my-3">Cadastrar Clientes</h1>
        <form method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Nome" name="nome">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control cpf" placeholder="CPF" name="cpf">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control phone_with_ddd" placeholder="Celular" name="celular">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Cidade" name="cidade">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Bairro" name="bairro">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Rua" name="rua">
            </div>
            <div class="mb-3">
                <input type="number" class="form-control" placeholder="Número" name="numero">
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
    <?php include_once("includes/btn_back.php"); ?>
</body>

</html>