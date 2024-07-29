<?php

/*Se existe uma POST['NovaSenha'] e não estiver vazio a senha, confirma senha e o telefone, ele cria as variaveis senha, confirma e telefone.*/
if (isset($_POST['NovaSenha']) && !empty('nNovaSenha') && !empty('nConfirmar') && !empty('ntelefone')) {

    $senha = $_POST['nNovaSenha'];
    $confirmar = $_POST['nConfirmar'];
    $telefone = $_POST['ntelefone'];

    /*Se a senha for diferente de confirmar ele redireciona para o EditSenha com uma GET erroSenha.*/
    if ($senha != $confirmar) {

        header('location:../../view/recuperaSenha/EditSenha.php?erroSenha');
    } else {

        /*Se não ele chama o arquivo model e chama a função edit */
        require('../../model/model.php');
        edit($senha, $telefone);
    }
} else {

    /*Se não ele redireciona para o EditSenha.*/
    header('location:../../view/recuperaSenha/EditSenha.php');
}

/*Se existe um GET certo ele redireciona para o EditSenha com um GET certo.*/
if (isset($_GET['certo'])){

    header('location:../../view/recuperaSenha/EditSenha.php?certo');
}


/*Se existe um GET erro ele redireciona para o EditSenha com um GET erro.*/
if (isset($_GET['erro'])){

    header('location:../../view/recuperaSenha/EditSenha.php?erro');
}