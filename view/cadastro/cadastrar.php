<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>

    <div id="main">
        <div id="box">
            <h1>Cadastrar:</h1>
            <div id="form">

                <!--Formulario para o cadastro-->
                <form action="../../controller/cadastro/C_cadastro.php" method="post">
                    <label for="iNome">Nome:</label>
                    <input type="text" name="nNome" id="iNome" maxlength="50" required><br>

                    <label for="iEmail">E-mail</label>
                    <input type="email" name="nEmail" id="iEmail" maxlength="40" required><br>

                    <label for="iTelefone">Telefone:</label>
                    <input type="tel" name="nTelefone" id="iTelefone" maxlength="11" required><br>

                    <label for="iSenha">Senha:</label>
                    <input type="password" name="nSenha" id="iSenha" maxlength="12" required><br>

                    <label for="iConfirma">Confirmar senha:</label>
                    <input type="password" name="nConfirma" id="iConfirma" maxlength="12" required><br>

                    <button type="submit" name="cadastrar">Cadastrar</button>
                </form>
            </div>

            <?php

            /*Se existe um GET['erro'] ele mostra uma mensagem de erro, mostrando que ja existe um nome, email e telefone cadastrados*/
            if (isset($_GET['erro'])) {

                echo "<p>[ERRO] Nome, email ou telefone já cadastrado!<p>";
            }

            /*Se existe um GET['erroSenha'] ele mostra uma mensagem de erro, mostrando que as senha não iguais */
            if (isset($_GET['erroSenha'])) {

                echo "<p>[ERRO] senhas não correspondem!<p>";
            }
            ?>

            <a id="CL" href="../login/logar.php">Logar</a>
        </div>
        <p>&copy; UcHôA</p>
    </div>

</body>

</html>