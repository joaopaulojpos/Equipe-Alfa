<?php

require_once '../conexao.php';

$codigoUsuario = $_POST['codigoUsuario'];
$codigoTipoUsuario = $_POST['codigoTipoUsuario'];
$usuarioLogin = $_POST['usuarioLogin'];
$senha = $_POST['senha'];
$confirmarSenha = $_POST['confirmarSenha'];

$sql = "SELECT * FROM usuario WHERE codigoUsuario = '$codigoUsuario'";
$query = mysqli_query($conn, $sql) or die("Erro. " . mysqli_error($conn));
$row = mysqli_fetch_assoc($query);
$logarray = $row['usuarioLogin'];
$codigoU = $row['codigoUsuario'];

/*
 * Validação do campos vazios ou inválidos e evitando registro duplicado
 */
	if ($codigoU == $codigoUsuario){
	echo "<script type='text/javascript'>alert('Já existe um usuário cadastrado com esse código!');window.location.href='../../view/cadastroUsuario.php';</script>";
} else{
	if ($codigoUsuario == "" || $codigoUsuario == null) {
    echo "<script type='text/javascript'>alert('O campo código deve ser preenchido');window.location.href='../../view/cadastroUsuario.php';</script>";
} else {
    if ($codigoTipoUsuario == "" || $codigoTipoUsuario == null) {
        echo "<script type='text/javascript'>alert('O campo tipo deve ser preenchido');window.location.href='../../view/cadastroUsuario.php';</script>";
    } else {
        if ($usuarioLogin == "" || $usuarioLogin == null) {
            echo "<script type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='../../view/cadastroUsuario.php';</script>";
        } else {
            if ($senha == "" || $senha == null) {
                echo "<script type='text/javascript'>alert('O campo senha deve ser preenchido');window.location.href='../../view/cadastroUsuario.php';</script>";
            } else {
                if ($senha != $confirmarSenha) {
                    echo "<script type='text/javascript'>alert('As senhas informadas não conferem');window.location.href='../../view/cadastroUsuario.php';</script>";
                } else {
                    if ($logarray == $usuarioLogin) {
                        echo"<script type='text/javascript'>alert('Esse login já existe');window.location.href='../../view/cadastroUsuario.php';</script>";
                    } else {
                        //Se tudo estiver OK, insere o registro no banco de dados
                        $insert = "INSERT INTO usuario(codigoUsuario, codigoTipoUsuario, usuarioLogin, senha, confirmarSenha) VALUES ('$codigoUsuario','$codigoTipoUsuario', '$usuarioLogin', '$senha', '$confirmarSenha')";
                        $result = mysqli_query($conn, $insert) or die("Não foi possível cadastrar o usuário. " . mysqli_error($conn));
                    }
                    if ($result) {
                        echo "<script type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='../../view/index.php';</script>;";
                    } else {
                        echo "<script type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='../../view/cadastrarUsuario.php';</script>";
					}
                    }
                }
            }
        }
    }
}
?>
