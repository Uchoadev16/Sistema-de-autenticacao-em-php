<?php

if (isset($_POST['verificar'])) {

    $nome = $_POST['nNome'];
    $cpf = $_POST['nCpf'];
    $senha = $_POST['nSenha'];
    $confirma = $_POST['nConfirma'];
}

if ($senha != $confirma) {
    die('senhas nao correspondem');
}

$host = "localhost";
$user = "root";
$senha_user = "";
$banco = "FormularioTeste";

$con = mysqli_connect($host, $user, $senha_user, $banco);

if (!$con) {
    die("conexao falha." . mysqli_connect_error());
}

$sql = "INSERT INTO clientes (Nome, CPF, Senha) VALUES('$nome', '$cpf', '$senha')";

$rs = mysqli_query($con, $sql);

if ($rs) {
    echo "cliente cadastrado";
}
