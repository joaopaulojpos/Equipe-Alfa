<?php
require_once '../conexao.php';

if(isset($_POST['matriculaAluno'])){
	$matriculaAluno = $_POST['matriculaAluno'];
	$falta = $_POST['falta'];
	$codigoTurma = $_POST['codigoTurma'];
	$nomeDisciplina = $_POST['nomeDisciplina'];
	$mes = $_POST['mes'];
	$abono = $_POST['abono'];
	$motivo = $_POST['motivo'];

	$sql = "UPDATE falta SET matriculaAluno = '$matriculaAluno', falta = '$falta', codigoTurma = '$codigoTurma', nomeDisciplina = '$nomeDisciplina', mes = '$mes', abono = '$abono', motivo = '$motivo' WHERE matriculaAluno = '$matriculaAluno'";
	$query = mysqli_query($conn,$sql) or die("Não foi possível atualizar os dados! " . mysqli_error($conn));	

	echo "<script type='text/javascript'>alert('Falta atualizada com sucesso!');location.href='../../view/listarFaltas.php';</script>";

	mysqli_close($conn);
	}

?>