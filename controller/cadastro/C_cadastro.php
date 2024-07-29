<!--Controle para cadastrar-->
<?php

/*Se existe um POST['cadastrar'] e não estiver vazio o nome, email, telefone, senha e o confirma senha ele cria as variáveis*/
if (isset($_POST['cadastrar']) && !empty($_POST['nNome']) && !empty($_POST['nEmail']) && !empty($_POST['nTelefone']) && !empty($_POST['nSenha']) && !empty($_POST['nConfirma'])) {

    $nome = $_POST['nNome'];
    $email = $_POST['nEmail'];
    $telefone = $_POST['nTelefone'];
    $senha = $_POST['nSenha'];
    $confirma = $_POST['nConfirma'];

    /*se a variável senha for diferente da variável confirma*/
    if ($senha != $confirma) {

        /*Ele manda o usuario novamente para o cadastrar com o GET['erroSenha']*/
        header('location:../../view/cadastro/cadastrar.php?erroSenha');
    } else {

        /*Se não ele manda requerir o arquivo model para chamar a função cadastrar com os parametros nome, email, telefone, senha. */
        require('../../model/model.php');

        cadastrar($nome, $email, $telefone, $senha);
    }

/*Se não, ele manda o usuario novamente para o cadastrar*/
} else {

    header('location:../../view/cadastro/cadastrar.php');
}

/*se existe um GET['ERRO'] ele redireciona para o cadastrar*/
if (isset($_GET['erro'])) {

    header('location:../../view/cadastro/cadastrar.php?erro');
}

/*Se existe GET['resposta'] ele manda para o cadastrado.php*/
if (isset($_GET['resposta'])) {

    $resposta = $_GET['resposta'];
    header('location:../../view/cadastro/cadastrado.php?resposta=' . $resposta);
}
