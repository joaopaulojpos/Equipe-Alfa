<?php
require_once '../conexao.php';

if(isset($_POST['codigoFalta'])){
	$codigoFalta = $_POST['codigoFalta'];
	$matriculaAluno = $_POST['matriculaAluno'];
	$codigoDisciplinaTurma = $_POST['codigoDisciplinaTurma'];
	$mes = $_POST['mes'];
	$qtdFalta = $_POST['qtdFalta'];

	$sql = "UPDATE falta SET matriculaAluno = '$matriculaAluno', codigoDisciplinaTurma = '$codigoDisciplinaTurma', mes = '$mes', qtdFalta = '$qtdFalta' WHERE codigoFalta = '$codigoFalta'";
	$query = mysqli_query($conn,$sql) or die("Não foi possível atualizar os dados! " . mysqli_error($conn));	

	echo "<script type='text/javascript'>alert('Falta atualizada com sucesso!');location.href='../../view/listarFaltas.php';</script>";

	mysqli_close($conn);
	}

?>