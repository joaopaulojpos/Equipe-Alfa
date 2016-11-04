<?php
	require_once 'conexao.php';

	$usuarioLogin = $_POST['usuarioLogin'];	
	$senha = $_POST['senha'];
	$entrar = $_POST['entrar'];
	
	
		if(isset($entrar)){
			$sql = ("SELECT * FROM usuario WHERE usuarioLogin = '$usuarioLogin' AND senha = '$senha'");
			$query = mysqli_query($conn,$sql) or die("Falha ao selecionar os dados do BD. " . mysqli_error($conn));
				if(mysqli_num_rows($query)<=0){
					echo "<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.html';</script>";
					die();
				}else{
					setcookie("usuarioLogin",$usuarioLogin);
					header("Location:inicio.php");
				}
		}