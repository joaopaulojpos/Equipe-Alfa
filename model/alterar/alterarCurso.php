<?php
require_once '../conexao.php';

if(isset($_POST['codigoCurso'])){
	$codigoCurso = $_POST['codigoCurso'];
	$nomeCurso = $_POST['nomeCurso'];	
	$tipoEnsino = $_POST['tipoEnsino'];
	$duracao = $_POST['duracao'];

	$sql = "UPDATE curso SET nomeCurso = '$nomeCurso', tipoEnsino = '$tipoEnsino', duracao = '$duracao' WHERE codigoCurso = '$codigoCurso'";
	$query = mysqli_query($conn,$sql) or die("Não foi possível atualizar os dados do curso! " . mysqli_error($conn));	

	echo "<script type='text/javascript'>alert('Dados do curso atualizados com sucesso!');location.href='../../view/listarCurso.php';</script>";

	mysqli_close($conn);
	}

?>
