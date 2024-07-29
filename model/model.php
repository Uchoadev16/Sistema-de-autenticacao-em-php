<?php

/*chamando a função cadastrar*/
function cadastrar($nome, $email, $telefone, $senha)
{

    /*requerindo a conexão com o banco de dados usando POO*/
    require('database/connect_database.php');

    /*Mando um comando para o banco de dados, pedindo para selecionar todos os elementos da tabela cadastrados onde nome é igual a variável nome, email igual a variável email e telefone igual a variável telefone.*/
    $slq_check = "SELECT * FROM cadastrados WHERE Nome = '$nome' OR Email = '$email' OR telefone = '$telefone'";

    /*fazendo a consulta com o banco de dados*/
    $result_check = $conexao->query($slq_check);

    /*se $result_check tiver nenhum valor, ele cria o cadastro*/
    if (mysqli_num_rows($result_check) < 1) {

        /*mandando mensagem para o banco de dados, inserindo na tabela cadastrados o valores nome, email, telefone e senha passado pelo usuario*/
        $sql_cadastro = "INSERT INTO cadastrados VALUES (DEFAULT,'$nome', '$email', '$telefone', '$senha');";

        /*fazendo a consulta com o banco de dados*/
        $result_cadastro = $conexao->query($sql_cadastro);

        /*se $result_cadastro tiver conexão com o banco de dados, ele manda o manda um get com resposta sucesso*/
        if ($result_cadastro) {

            $resposta = "<h1>Você foi cadastrado com sucesso!</h1>";
            header('location:../cadastro/C_cadastro.php?resposta=' . $resposta);
        } else {

            /*Se não ele enviar um get de erro */
            $resposta = "<h1>Houve algum erro em seu cadastro! Tente novamente</h1>";
            header('location:../controller/cadastro/C_cadastro.php?resposta=' . $resposta);
        }
    } else {

        /*Se não ele manda um get erro para o controller */
        header('location:../cadastro/C_cadastro.php?erro');
    }
}

/*função logar*/
function logar($email, $senha)
{

    /*requerido a conexão com o banco de dados */
    require('database/connect_database.php');

    /*comando em SQL para seleciona todos da tabela cadastrados onde email é igual a variavel email e senha é igual a variavel senha que o usuario passou pelo formulario.*/
    $sql_logar = "SELECT * FROM cadastrados WHERE Email = '$email' and senha = '$senha'";

    /*mando o comando para o banco de dados*/
    $result_logar = $conexao->query($sql_logar);

    /*Se a função mysqli_num_rows achar nenhum resultado ele manda um GET erro.*/
    if (mysqli_num_rows($result_logar) < 1) {

        header('location:../login/C_login.php?erro');
    } else {

        /*Se não ele manda um GET certo.*/
        header('location:../login/C_login.php?certo');
    }
}

/*Função para recuperar senha*/
function recuperar($telefone)
{
    /*requerido a conexão com o banco de dados */
    require('database/connect_database.php');

    /*comando em SQL para seleciona todos da tabela cadastrados onde telefone é igual a variável telefone que o usuario passou pelo formulario.*/
    $sql_check = "SELECT * FROM cadastrados WHERE telefone = '$telefone'";

    /*mando o comando para o banco de dados*/
    $result_check = $conexao->query($sql_check);


    /*Se a função mysqli_num_rows achar nenhum resultado ele manda um GET erro.*/
    if (mysqli_num_rows($result_check) < 1) {

        header('location:../recuperarSenha/C_recuperar.php?erro');
    } else {

        /*Se não ele manda um GET certo com o valor da variável telefone.*/
        header('location:../recuperarSenha/C_recuperar.php?certo=' . $telefone);
    }
}

/*Função edit */
function edit($senha, $telefone)
{

    /*Requerindo a conexão com o banco de dados*/
    require('database/connect_database.php');

    /*Atualizando na tabela cadastro na coluna senha definindo para a variável senha onde coluna telefone é igual a variável telefone alterando apenas 1.*/
    $sql_edit = "UPDATE cadastrados SET senha = '$senha' WHERE telefone = '$telefone' LIMIT 1";

    /*enviando o comando para o banco de dados.*/
    $result_edit = $conexao->query($sql_edit);

    
        /*se $result_cadastro tiver conexão com o banco de dados, ele manda o manda um get certo.*/
    if ($result_edit) {

        header('location:../recuperarSenha/C_editSenha.php?certo');
    } else {

        /*Se não ele manda o GET erro. */
        header('location:../recuperarSenha/C_editSenha.php?erro');
    }
}
