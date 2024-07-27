<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrado</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>

    <div id="main">
        <div id="box">
            <?php

            if (isset($_GET['resposta'])) {

                $resposta = $_GET['resposta'];
                echo "<h1>$resposta</h1>" . "<br>";
            }
            ?>

            <a href="../login/logar.php">Logar na sua conta</a>
        </div>
        <p>&copy;UcHôA</p>
    </div>
</body>

</html>