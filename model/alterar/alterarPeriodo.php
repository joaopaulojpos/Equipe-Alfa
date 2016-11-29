<?php
require_once '../conexao.php';

if(isset($_POST['codigoPeriodo'])){
	$codigoPeriodo = $_POST['codigoPeriodo'];
	$numeroPeriodo = $_POST['numeroPeriodo'];
	$tipoEnsino = $_POST['tipoEnsino'];

	$sql = "UPDATE periodo SET numeroPeriodo = '$numeroPeriodo', tipoEnsino = '$tipoEnsino' WHERE codigoPeriodo = '$codigoPeriodo'";
	$query = mysqli_query($conn,$sql) or die("Não foi possível atualizar os dados! " . mysqli_error($conn));	

	echo "<script type='text/javascript'>alert('Dados do período atualizados com sucesso!');location.href='../../view/listarPeriodo.php';</script>";

	mysqli_close($conn);
	}

?>
