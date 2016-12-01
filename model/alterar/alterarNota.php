<?php
require_once '../conexao.php';

if(isset($_POST['codigoNota'])){
	$codigoNota = $_POST['codigoNota'];
	$matriculaAluno = $_POST['matriculaAluno'];
	$recuperacao = $_POST['recuperacao'];
	$final = $_POST['final'];
	$tipoNota = $_POST['tipoNota'];
	$situacao = $_POST['situacao'];

	$sql = "UPDATE nota SET codigoNota = '$codigoNota', matriculaAluno = '$matriculaAluno', recuperacao= '$recuperacao', final = '$final', tipoNota = '$tipoNota', situacao = '$situacao' WHERE codigoNota = '$codigoNota'";
	$query = mysqli_query($conn,$sql) or die("Não foi possível atualizar os dados! " . mysqli_error($conn));	

	echo "<script type='text/javascript'>alert('Dados da nota atualizados com sucesso!');location.href='../../view/listarNota.php';</script>";

	mysqli_close($conn);
	}

?>