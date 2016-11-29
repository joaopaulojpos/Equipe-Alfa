<?php
	require_once '../conexao.php';

	if(isset($_POST['matriculaAluno'])){
	$matriculaAluno = $_POST['matriculaAluno'];
	$nota1 = $_POST['nota1'];
	$nota2 = $_POST['nota2'];

		$sql = "SELECT codigoNota FROM nota WHERE matriculaAluno = '$matriculaAluno'";
		$query = mysqli_query($conn,$sql) or die("Não foi possível pegar o código da nota. Erro: " . mysqli_error($conn));
		$row = mysqli_fetch_assoc($query);
		$codigoNota = $row['codigoNota'];

		if($nota1 != null){
		$sql1 = "INSERT INTO notaNumero(codigoNota, matriculaAluno, nota1) VALUES('$codigoNota', '$matriculaAluno', '$nota1')";
		$query1 = mysqli_query($conn,$sql1);		

		if($query1){		

		echo "<script type='text/javascript'>alert('Nota1 inserida com sucesso!');location.href='../../view/cadastrarNotaNumero.php';</script>";
	}else{

		echo "<script type='text/javascript'>alert('Não foi possível inserir a nota1!');location.href='../../view/cadastrarNotaNumero.php';</script>";
	}

	}else{

		$sql2 = "UPDATE notaNumero SET nota2 = '$nota2' WHERE matriculaAluno = '$matriculaAluno'";
		$query2 = mysqli_query($conn,$sql2);
		
		if($query2){

			echo "<script type='text/javascript'>alert('Nota2 inserida com sucesso!');location.href='../../view/cadastrarNotaNumero.php';</script>";
		}else{

			echo "<script type='text/javascript'>alert('Não foi possível inserir a nota2!');location.href='../../view/cadastrarNotaNumero.php';</script>";
		}

		mysqli_close($conn);
	}
	
}
	
?>