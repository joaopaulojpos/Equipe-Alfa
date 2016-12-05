<?php
require_once '../conexao.php';

if(isset($_POST['codigoTurma'])){
	$codigoTurma = $_POST['codigoTurma'];
	$codigoCurso = $_POST['codigoCurso'];
	$ano = $_POST['ano'];
	$turno = $_POST['turno'];

	$sql = "UPDATE turma SET codigoTurma = '$codigoTurma', codigoCurso = '$codigoCurso', ano= '$ano', turno = '$turno' WHERE codigoTurma = '$codigoTurma'";
	$query = mysqli_query($conn,$sql) or die("Não foi possível atualizar os dados! " . mysqli_error($conn));	

	echo "<script type='text/javascript'>alert('Dados da turma atualizados com sucesso!');location.href='../../view/listarTurma.php';</script>";

	mysqli_close($conn);
	}

?>