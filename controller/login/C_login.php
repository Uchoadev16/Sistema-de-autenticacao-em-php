<?php

/*Controle para logar*/
if (isset($_POST['logar']) && !empty($_POST['nEmail']) && !empty($_POST['nSenha'])) {

    $email = $_POST['nEmail'];
    $senha = $_POST['nSenha'];

    require('../../model/model.php');

    logar($email, $senha);
} else {

    header('location:../../view/login/logar.php');
}

if (isset($_GET['erro'])) {

    header('location:../../view/login/logar.php?erro');
}

if (isset($_GET['certo'])) {

    header('location:../../view/conta/conta.php');
}
