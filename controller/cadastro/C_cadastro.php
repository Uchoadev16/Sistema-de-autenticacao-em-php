<!--Controle para cadastrar-->
<?php

if (isset($_POST['cadastrar']) && !empty($_POST['nNome']) && !empty($_POST['nEmail']) && !empty($_POST['nTelefone']) && !empty($_POST['nSenha']) && !empty($_POST['nConfirma'])) {

    $nome = $_POST['nNome'];
    $email = $_POST['nEmail'];
    $telefone = $_POST['nTelefone'];
    $senha = $_POST['nSenha'];
    $confirma = $_POST['nConfirma'];

    if ($senha != $confirma) {

        header('location:../../view/cadastro/cadastrar.php?erroSenha');
    } else {
        require('../../model/model.php');

        cadastrar($nome, $email, $telefone, $senha);
    }
} else {

    header('location:../../view/cadastro/cadastrar.php');
}

if (isset($_GET['erro'])) {

    header('location:../../view/cadastro/cadastrar.php?erro');
}
if (isset($_GET['resposta'])) {

    $resposta = $_GET['resposta'];
    header('location:../../view/cadastro/cadastrado.php?resposta=' . $resposta);
}
