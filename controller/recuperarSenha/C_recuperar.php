<?php

if (isset($_POST['RECsenha']) && !empty('nTelefone')) {

    $telefone = $_POST['nTelefone'];

    require('../../model/model.php');

    recuperar($telefone);
} else {

    header('location:../../view/recuperaSenha/recSenha.php');
}

if (isset($_GET['erro'])) {

    header('location:../../view/recuperaSenha/recSenha.php?erro');
}
if (isset($_GET['certo'])) {

    $telefone = $_GET['certo'];
    header('location:../../view/recuperaSenha/EditSenha.php?telefone='. $telefone);
}
