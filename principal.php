<?php

session_start();

include('conexao.php');
include('validarlogin.php');

$nivel = $_SESSION['nivel'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <?php
        if($nivel < 3){?>
        <a href="addusuario.php">Adicionar Usuario</a> <?php
        }
            if($nivel == 1) {?>
            / <a href="mudaracesso.php">mudar acesso</a><br>
                <?php }?>

                / <a href="alterardados.php">alterar dados</a>

                /<a href="pesquisarcnpj.php">pesquisar cnpj</a>
                
                / <a href="logout.php">sair</a>
    </center>
</body>
</html>