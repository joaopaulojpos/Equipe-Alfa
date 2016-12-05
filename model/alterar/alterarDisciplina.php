<?php
require_once '../conexao.php';

if(isset($_POST['codigoDisciplina'])){
	$codigoDisciplina = $_POST['codigoDisciplina'];	
	$nomeDisciplina = $_POST['nomeDisciplina'];

	$sql = "UPDATE disciplina SET nomeDisciplina = '$nomeDisciplina' WHERE codigoDisciplina = '$codigoDisciplina'";
	$query = mysqli_query($conn,$sql) or die("Não foi possível atualizar os dados! " . mysqli_error($conn));	

	echo "<script type='text/javascript'>alert('Dados da disciplina atualizados com sucesso!');location.href='../../view/listarDisciplina.php';</script>";

	mysqli_close($conn);
	}

?>