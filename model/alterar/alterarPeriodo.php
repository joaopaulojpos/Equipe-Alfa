<?php
require_once '../conexao.php';

if(isset($_POST['codigoPeriodo'])){
	$codigoPeriodo = $_POST['codigoPeriodo'];
	$tipoEnsino = $_POST['tipoEnsino'];

	$sql = "UPDATE periodo SET tipoEnsino = '$tipoEnsino' WHERE codigoPeriodo = '$codigoPeriodo'";
	$query = mysqli_query($conn,$sql) or die("Não foi possível atualizar os dados! " . mysqli_error($conn));	

	echo "<script type='text/javascript'>alert('Dados atualizados com sucesso!');location.href='../../view/listarPeriodo.php';</script>";

	mysqli_close($conn);
	}

?>
