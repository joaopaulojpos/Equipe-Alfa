<?php

	require_once 'conexao.php';
	
	echo ("<script type='text/javascript'>option('Deseja mesmo excluir os dados do aluno?')</script>");

	$matriculaAluno = $_GET['matriculaAluno'];	


	$sql = "DELETE FROM aluno WHERE matriculaAluno = $matriculaAluno";
	$query = mysqli_query($conn, $sql) or die(" Falha ao excluir registro:\n " . $mysqli_error($conn));		

	echo ("<script type='text/javascript'>alert('Dados do aluno excluídos com sucesso!');location.href='listarAluno.php');</script>");	
	
	mysqli_close($conn);