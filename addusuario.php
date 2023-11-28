<?php

session_start();

include('conexao.php');
include('funcoes.php');
include('validaadmingerente.php');


$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
$login = isset($_POST['login']) ? $_POST['login'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

$selectcpf = "SELECT cpf FROM Usuario WHERE cpf = '$cpf'";
$querycpf = mysqli_query($conexao, $selectcpf);
$dadocpf = mysqli_fetch_row($querycpf);

$selectlogin = "SELECT login FROM login WHERE login = '$login'";
$querylogin = mysqli_query($conexao,$selectlogin);
$dadologin = mysqli_fetch_row($querylogin);
if($nome <> null){


    if(($dadocpf == null) && ($dadologin == null)){
        $insertusuario = "INSERT INTO usuario(nome, cpf, telefone) VALUES ('$nome', '$cpf', '$telefone')";
        
        $queryusuario = mysqli_query($conexao, $insertusuario);
        
        $senhacriptografada = criptografar ($senha);
        $insertlogin = "INSERT INTO login(cpf, login, senha, nivel) VALUES 
        ('$cpf', '$login', '$senhacriptografada',3)";
        $querylogin = mysqli_query($conexao, $insertlogin);
        echo '<script>alert("usuario cadastrado com sucesso");
        window.location="addusuario.php";
        </script>';
    }else{
        echo '<script>alert("CPF e/ou login ja cadastrado");
        window.location="addusuario.php";
        </script>';
        
    }
}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <h1>Adicionar Usuario </h1>
        <form id = "form-addusuario"action= "#" method = "post">
        nome: <input type="text" name= "nome" required><br> 
        CPF: <input type="text" name= "cpf" required><br>
        telefone: <input type="text" name= "telefone" required><br>
        login: <input type="text" name= "login" required><br>
        senha: <input type="password" name= "senha" required><br>
        <input type="submit" name="enviar" value= "Enviar">
    
</body>
</html>