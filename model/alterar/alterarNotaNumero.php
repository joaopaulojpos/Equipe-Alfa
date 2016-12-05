<?php
require_once '../conexao.php';

if(isset($_POST['codigoNota'])){
	$codigoNota = $_POST['codigoNota'];
	$nota1 = $_POST['nota1'];
	$nota2 = $_POST['nota2'];	

	$sql = "UPDATE notaNumero SET nota1 = '$nota1', nota2 = '$nota2' WHERE codigoNota = '$codigoNota'";
	$query = mysqli_query($conn,$sql) or die("Não foi possível atualizar os dados! " . mysqli_error($conn));	

	echo "<script type='text/javascript'>alert('Dados atualizados com sucesso!');location.href='../../view/listarNotaNumero.php';</script>";

	mysqli_close($conn);
	}

?>