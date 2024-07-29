<!--Controle logar-->
<?php

/*Se existe um POST['logar'] e não estiver vasio o email e a senha, ele criar duas variaveis: email e senha, e require o arquivo model para chamar a função logar.*/
if (isset($_POST['logar']) && !empty($_POST['nEmail']) && !empty($_POST['nSenha'])) {

    $email = $_POST['nEmail'];
    $senha = $_POST['nSenha'];

    require('../../model/model.php');

    logar($email, $senha);
} else {

    /*se não ele envia novamente para o logar.php */
    header('location:../../view/login/logar.php');
}

/*Se existe um GET['erro'] ele redireciona para o logar.php */
if (isset($_GET['erro'])) {

    header('location:../../view/login/logar.php?erro');
}

/*Se existe um GET['certo'] redireciona para a conta do usuario*/
if (isset($_GET['certo'])) {

    header('location:../../view/conta/conta.php');
}
