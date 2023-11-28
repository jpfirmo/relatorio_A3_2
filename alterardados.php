<?php

session_start();

include ('conexao.php');
$cpf = $_SESSION ['cpf'];
$select = "SELECT nome, cpf, telefone FROM usuario WHERE cpf = '$cpf'";
$query = mysqli_query($conexao, $select);
$dados = mysqli_fetch_row($query);
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';

if($telefone <> null){
    $update = "UPDATE usuario SET telefone = '$telefone' where cpf = '$cpf'";
    $queryupdate = mysqli_query($conexao, $update);
    header('location: alterardados.php');
}

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
        <form id="form-altera" action="#" method="POST">
        <table border = "1px">
            <tr>
                <td>nome</td>
                <td>cpf</td>
                <td>Telefone</td>
                <td>Atualizar</td>
            </tr>
            <tr>
                <td><?php echo $dados[0]?></td>
                <td><?php echo $dados[1]?></td>
                <td><input type="text" name="telefone" value="<?php echo $dados[2]?>"></td>
                <td><input type="submit" name="atualizar" value="atualizar"></td>
            </tr>
        </table>
        </form>
        <h3>alterar senha</h3>
        <form id= "alterar-senha" action="alterarsenha.php" method="POST">
            nova senha:
            <input type="password" name="senha" required><br>
            confirmar senha:
            <input type="password" name="confirmarsenha" required><br><br>
            <input type="submit" name="alterar" value="alterar senha"><br>
        </form>
        <a href= "principal.php">voltar</a> 

    </center>
    
</body>
</html>
