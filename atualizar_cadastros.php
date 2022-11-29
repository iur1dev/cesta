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
    $rg = $_POST['rg'];
    $data_nasc = $_POST['data_nasc'];
    $celular = $_POST['celular'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $empresa = $_POST['empresa'];
    $cep_ = $_POST['cep_'];
    $cidade_ = $_POST['cidade_'];
    $bairro_ = $_POST['bairro_'];
    $rua_ = $_POST['rua_'];
    $numero_ = $_POST['numero_'];

    $sql_update = "update clientes set nome = '$nome', cpf = '$cpf', rg = '$rg', data_nasc = '$data_nasc', celular = '$celular', cep = '$cep', cidade = '$cidade',
    bairro = '$bairro', rua = '$rua', numero = '$numero', empresa = '$empresa', cep_ = '$cep_', cidade_ = '$cidade_',
    bairro_ = '$bairro_', rua_ = '$rua_', numero_ = '$numero_' where '$id' = id_clientes";
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
            <h1 class="fw-bold text-center my-3 col-6">Atualizar Cadastros</h1>
            <div class="col-3"></div>
        </div>
        <form method="POST">
            <?php
            while ($row = mysqli_fetch_array($query_select)) {
                echo "<h1 class='fw-bold text-center my-3'>Dados Pessoais</h1>";
                echo "<label for='nome' class='form-label'>Nome</label><input class='form-control mb-3' name='nome' id='nome' placeholder='Nome' type='text' value='" . $row['nome'] . "'>";
                echo "<label for='cpf' class='form-label'>CPF</label><input class='form-control mb-3' name='cpf' id='cpf' placeholder='Cpf' type='text' value='" . $row['cpf'] . "'>";
                echo "<label for='rg' class='form-label'>RG</label><input class='form-control mb-3' name='rg' id='rg' placeholder='RG' type='text' value='" . $row['rg'] . "'>";
                echo "<label for='data_nasc' class='form-label'>Data de Nascimento</label><input class='form-control mb-3' name='data_nasc' id='data_nascimento' placeholder='Data de Nascimento' type='text' value='" . $row['data_nasc'] . "'>";
                echo "<label for='celular' class='form-label'>Celular</label><input class='form-control mb-3' name='celular' id='celular' placeholder='Celular' type='text' value='" . $row['celular'] . "'>";
                echo "<h1 class='fw-bold text-center my-3'>Endereço Residencia</h1>";
                echo "<label for='cep' class='form-label'>Cep</label><input class='form-control mb-3' name='cep' id='cep' placeholder='CEP' type='text' value='" . $row['cep'] . "'>";
                echo "<label for='cidade' class='form-label'>Cidade</label><input class='form-control mb-3' name='cidade' id='cidade' placeholder='Cidade' type='text' value='" . $row['cidade'] . "'>";
                echo "<label for='bairro' class='form-label'>Bairro</label><input class='form-control mb-3' name='bairro' id='bairro' placeholder='Bairro' type='text' value='" . $row['bairro'] . "'>";
                echo "<label for='rua' class='form-label'>Rua</label><input class='form-control mb-3' name='rua' id='rua' placeholder='Rua' type='text' value='" . $row['rua'] . "'>";
                echo "<label for='numero' class='form-label'>Número</label><input class='form-control mb-3' name='numero' id='numero' placeholder='Número' type='text' value='" . $row['numero'] . "'>";
                echo "<h1 class='fw-bold text-center my-3'>Endereço do Trabalho</h1>";
                echo "<label for='empresa' class='form-label'>Empresa</label><input class='form-control mb-3' name='empresa' id='empresa' placeholder='Empresa' type='text' value='" . $row['empresa'] . "'>";
                echo "<label for='cep' class='form-label'>Cep</label><input class='form-control mb-3' name='cep_' id='cep' placeholder='CEP' type='text' value='" . $row['cep_'] . "'>";
                echo "<label for='cidade' class='form-label'>Cidade</label><input class='form-control mb-3' name='cidade_' id='cidade' placeholder='Cidade' type='text' value='" . $row['cidade_'] . "'>";
                echo "<label for='bairro' class='form-label'>Bairro</label><input class='form-control mb-3' name='bairro_' id='bairro' placeholder='Bairro' type='text' value='" . $row['bairro_'] . "'>";
                echo "<label for='rua' class='form-label'>Rua</label><input class='form-control mb-3' name='rua_' id='rua' placeholder='Rua' type='text' value='" . $row['rua_'] . "'>";
                echo "<label for='numero' class='form-label'>Número</label><input class='form-control mb-3' name='numero_' id='numero' placeholder='Número' type='text' value='" . $row['numero_'] . "'>";
            }
            ?>
            <div class="text-center">
                <button class="btn btn-success mb-5" type="submit">Atualizar</button>
            </div>
        </form>
    </div>
    <?php include_once("includes/scripts.php") ?>
</body>

</html>