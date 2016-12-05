<?php

require_once '../conexao.php';

$codigoTipoUsuario = $_POST['codigoTipoUsuario'];
$usuarioLogin = $_POST['usuarioLogin'];
$senha = $_POST['senha'];
$confirmarSenha = $_POST['confirmarSenha'];

$sql = "SELECT codigoTipoUsuario, usuarioLogin, senha, confirmarSenha FROM usuario";
$query = mysqli_query($conn, $sql) or die("Erro: " . mysqli_error($conn));
$row = mysqli_fetch_assoc($query);
$logarray = $row['usuarioLogin'];

/*
 * Validação do campos vazios ou inválidos e evitando registro duplicado
 */
	
    if ($codigoTipoUsuario == "" || $codigoTipoUsuario == null) {
        echo "<script type='text/javascript'>alert('O campo tipo deve ser preenchido');location.href='../../view/cadastrarUsuario.php';</script>";
    } else  
        if ($usuarioLogin == "" || $usuarioLogin == null) {
            echo "<script type='text/javascript'>alert('O campo login deve ser preenchido');location.href='../../view/cadastrarUsuario.php';</script>";
        } else 
            if ($senha == "" || $senha == null) {
                echo "<script type='text/javascript'>alert('O campo senha deve ser preenchido');location.href='../../view/cadastrarUsuario.php';</script>";
            } else 
                if ($senha != $confirmarSenha) {
                    echo "<script type='text/javascript'>alert('As senhas informadas não conferem');location.href='../../view/cadastrarUsuario.php';</script>";
                } else 
                    if ($logarray == $usuarioLogin) {
                        echo"<script type='text/javascript'>alert('Esse login já existe');location.href='../../view/cadastrarUsuario.php';</script>";
                    } else {
                        //Se tudo estiver OK, insere o registro no banco de dados
                        $insert = "INSERT INTO usuario(codigoTipoUsuario, usuarioLogin, senha, confirmarSenha) VALUES ('$codigoTipoUsuario', '$usuarioLogin', '$senha', '$confirmarSenha')";
                        $result = mysqli_query($conn, $insert) or die("Não foi possível cadastrar o usuário. " . mysqli_error($conn));
                    }
                    if ($result) {
                        echo "<script type='text/javascript'>alert('Usuário cadastrado com sucesso!');location.href='../../view/index.php';</script>;";
                    } else {
                        echo "<script type='text/javascript'>alert('Não foi possível cadastrar esse usuário');location.href='../../view/cadastrarUsuario.php';</script>";
					}      
            
        
        
        
?>