<?php

if (isset($_POST['NovaSenha']) && !empty('nNovaSenha') && !empty('nConfirmar') && !empty('ntelefone')) {

    $senha = $_POST['nNovaSenha'];
    $confirmar = $_POST['nConfirmar'];
    $telefone = $_POST['ntelefone'];

    if ($senha != $confirmar) {

        header('location:../../view/recuperaSenha/EditSenha.php?erroSenha');
    } else {

        require('../../model/model.php');
        edit($senha, $telefone);
    }
} else {

    header('location:../../view/recuperaSenha/EditSenha.php');
}

if (isset($_GET['certo'])){

    header('location:../../view/recuperaSenha/EditSenha.php?certo');
}

if (isset($_GET['erro'])){

    header('location:../../view/recuperaSenha/EditSenha.php?erro');
}