<?php
include_once("includes/conn.php");

$nome = "";
$celular = "";

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
    $cep_ = $_POST['cep_'];
    $cidade_ = $_POST['cidade_'];
    $bairro_ = $_POST['bairro_'];
    $rua_ = $_POST['rua_'];
    $numero_ = $_POST['numero_'];

    if (empty($nome)) {
        echo '<div class="alert alert-danger text-center" role="alert">Preencha o Nome</div>';
    } elseif (empty($celular)) {
        echo '<div class="alert alert-danger text-center" role="alert">Preencha o Celular</div>';
    } else {
        $sql = "insert into clientes (nome, cpf, rg, data_nasc, celular, cep, cidade, bairro, rua, numero, cep_, cidade_, bairro_, rua_, numero_)
    values ('$nome', '$cpf', '$rg', '$data_nasc', '$celular', '$cep', '$cidade', '$bairro', '$rua', '$numero', '$cep_', '$cidade_', '$bairro_', '$rua_', '$numero_')";
        $query = $conn->query($sql) or die('erro sql ' . $conn->error);

        header('Location: home.php');
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
        <div class="row bg-danger">
            <a href="home.php" class="col-3">
                <i class="fa-regular fa-circle-left mt-3" style="font-size: 3.5rem;color: snow;">
                </i>
            </a>
            <h1 class="fw-bold text-center my-3 col-6">Cadastrar Clientes</h1>
            <div class="col-3"></div>
        </div>
        <h1 class="fw-bold text-center my-3">Dados Pessoais</h1>
        <form method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Nome" name="nome" value="<?php echo $nome ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control cpf" placeholder="CPF" name="cpf">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="RG" name="rg">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control date" placeholder="Data de Nascimento" name="data_nasc">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control phone_with_ddd" placeholder="Celular" name="celular" value="<?php echo $celular ?>">
            </div>
            <h1 class="fw-bold text-center my-3">Endereço Residencia</h1>
            <div class="mb-3">
                <input type="text" class="form-control cep" id="cep" placeholder="Cep" name="cep">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="cidade" placeholder="Cidade" name="cidade">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="bairro" placeholder="Bairro" name="bairro">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="rua" placeholder="Rua" name="rua">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Número" name="numero">
            </div>
            <h1 class="fw-bold text-center my-3">Endereço do Trabalho</h1>
            <div class="mb-3">
                <input type="text" class="form-control cep" id="cep_" placeholder="Cep" name="cep_">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="cidade_" placeholder="Cidade" name="cidade_">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="bairro_" placeholder="Bairro" name="bairro_">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="rua_" placeholder="Rua" name="rua_">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Número" name="numero_">
            </div>
            <button type="submit" class="btn btn-primary col-12 mb-5 mt-3">Cadastrar</button>
        </form>
    </div>
    <?php
    include_once('includes/scripts.php');
    ?>
</body>

<script>
    $(document).ready(function() {

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#cidade").val("");
            $("#bairro").val("");
            $("#rua").val("");
        }

        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#cidade").val("...");
                    $("#bairro").val("...");
                    $("#rua").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#cidade").val(dados.localidade);
                            $("#bairro").val(dados.bairro);
                            $("#rua").val(dados.logradouro);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });

        // 

        function limpa_formulário_cep2() {
            // Limpa valores do formulário de cep.
            $("#cidade_").val("");
            $("#bairro_").val("");
            $("#rua_").val("");
        }

        //Quando o campo cep perde o foco.
        $("#cep_").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#cidade_").val("...");
                    $("#bairro_").val("...");
                    $("#rua_").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#cidade_").val(dados.localidade);
                            $("#bairro_").val(dados.bairro);
                            $("#rua_").val(dados.logradouro);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep2();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep2();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep2();
            }
        });
    });
</script>

</html>