<?php

/*Se existe um POST['RECsenha'] e não estiver vasio o nTelefone, ele cria a variável telefone, require o arquivo model e chama a função recuperar senha.*/
if (isset($_POST['RECsenha']) && !empty('nTelefone')) {

    $telefone = $_POST['nTelefone'];

    require('../../model/model.php');

    recuperar($telefone);
} else {

    /*Se não ele redireciona para o controller recSenha */
    header('location:../../view/recuperaSenha/recSenha.php');
}

/*Se existe um GET['erro'] ele redireciona para o cotroller recSenha com o GET erro */
if (isset($_GET['erro'])) {

    header('location:../../view/recuperaSenha/recSenha.php?erro');
}


/*Se existe um GET['certo'] ele redireciona para o cotroller recSenha com o GET certo */
if (isset($_GET['certo'])) {

    $telefone = $_GET['certo'];
    header('location:../../view/recuperaSenha/EditSenha.php?telefone=' . $telefone);
}
