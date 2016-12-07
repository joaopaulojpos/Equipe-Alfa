<?php
require_once '../conexao.php';

if(isset($_POST['matriculaAluno'])){
	$matriculaAluno = $_POST['matriculaAluno'];
	$conceito1 = $_POST['conceito1'];
	$conceito2 = $_POST['conceito2'];	

	$sql = "UPDATE notaConceito SET conceito1 = '$conceito1', conceito2 = '$conceito2' WHERE matriculaAluno = '$matriculaAluno'";
	$query = mysqli_query($conn,$sql) or die("Não foi possível atualizar os dados! " . mysqli_error($conn));	

	echo "<script type='text/javascript'>alert('Dados atualizados com sucesso!');location.href='../../view/listarNotaConceito.php';</script>";

	mysqli_close($conn);
	}

?>