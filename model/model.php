<?php

function cadastrar($nome, $email, $telefone, $senha)
{

    require('database/connect_database.php');

    $slq_check = "SELECT * FROM cadastrados WHERE Nome = '$nome' OR Email = '$email' OR telefone = '$telefone'";

    $result_check = $conexao->query($slq_check);

    if (mysqli_num_rows($result_check) < 1) {

        $sql_cadastro = "INSERT INTO cadastrados VALUES (DEFAULT,'$nome', '$email', '$telefone', '$senha');";

        /*$resultado = mysqli_query($conexão, $sql_cadastro);*/

        $result_cadastro = $conexao->query($sql_cadastro);

        if ($result_cadastro) {

            $resposta = "<h1>Você foi cadastrado com sucesso!</h1>";
            header('location:../cadastro/C_cadastro.php?resposta=' . $resposta);
        } else {

            $resposta = "<h1>Houve algum erro em seu cadastro! Tente novamente</h1>";
            header('location:../controller/cadastro/C_cadastro.php?resposta=' . $resposta);
        }
    } else {

        header('location:../cadastro/C_cadastro.php?erro');
    }
}

function logar($email, $senha)
{
    require('database/connect_database.php');

    $sql_logar = "SELECT * FROM cadastrados WHERE Email = '$email' and senha = '$senha'";

    $result_logar = $conexao->query($sql_logar);

    if (mysqli_num_rows($result_logar) < 1) {

        header('location:../login/C_login.php?erro');
    } else {

        header('location:../login/C_login.php?certo');
    }
}

function recuperar($telefone)
{
    require('database/connect_database.php');

    $sql_check = "SELECT * FROM cadastrados WHERE telefone = '$telefone'";

    $result_check = $conexao->query($sql_check);

    if (mysqli_num_rows($result_check) < 1) {

        header('location:../recuperarSenha/C_recuperar.php?erro');
    } else {

        header('location:../recuperarSenha/C_recuperar.php?certo=' . $telefone);
    }
}

function edit($senha, $telefone)
{

    require('database/connect_database.php');
    $sql_edit = "UPDATE cadastrados SET senha = '$senha' WHERE telefone = '$telefone' LIMIT 1";

    $result_edit = $conexao->query($sql_edit);

    if($result_edit){

        header('location:../recuperarSenha/C_editSenha.php?certo');
    } else{

        header('location:../recuperarSenha/C_editSenha.php?erro');
    }
}
