<?php
	require_once '../conexao.php';

	if(isset($_POST['matriculaAluno'])){
	$matriculaAluno = $_POST['matriculaAluno'];
	$conceito1 = $_POST['conceito1'];
	$conceito2 = $_POST['conceito2'];

		$sql = "SELECT codigoNota FROM nota WHERE matriculaAluno = '$matriculaAluno'";
		$query = mysqli_query($conn,$sql) or die("Não foi possível pegar o código da nota. Erro: " . mysqli_error($conn));
		$row = mysqli_fetch_assoc($query);
		$codigoNota = $row['codigoNota'];

		if($conceito1 != null){
		$sql1 = "INSERT INTO notaConceito(codigoNota, matriculaAluno, conceito1) VALUES('$codigoNota', '$matriculaAluno', '$conceito1')";
		$query1 = mysqli_query($conn,$sql1);		

		if($query1){		

		echo "<script type='text/javascript'>alert('Conceito1 inserido com sucesso!');location.href='../../view/cadastrarNotaConceito.php';</script>";
	}else{

		echo "<script type='text/javascript'>alert('Não foi possível inserir o conceito1!');location.href='../../view/cadastrarNotaConceito.php';</script>";
	}

	}else{

		$sql2 = "UPDATE notaConceito SET conceito2 = '$conceito2' WHERE matriculaAluno = '$matriculaAluno'";
		$query2 = mysqli_query($conn,$sql2) or die("Não foi possível inserir o conceito2! Erro: " . mysqli_error($conn));
		
		if($query2){

			echo "<script type='text/javascript'>alert('Conceito2 inserido com sucesso!');location.href='../../view/cadastrarNotaConceito.php';</script>";
		}//else{

			//echo "<script type='text/javascript'>alert('Não foi possível inserir o conceito2!');location.href='../../view/cadastrarNotaConceito.php';</script>";

		mysqli_close($conn);
	}
	
}
	
?>