<?php

	require_once '../conexao.php';

	if(isset($_POST['numeroPeriodo'])){
	$numeroPeriodo = $_POST['numeroPeriodo'];
	$tipoEnsino = $_POST['tipoEnsino'];

	if($numeroPeriodo == ""){

		echo "<script type='text/javascript'>alert('Selecione o período!');location.href='../../view/cadastrarPeriodo.php'</script>";
	
	}else
		if($tipoEnsino == ""){

			echo "<script type='text/javascript'>alert('Selecione o tipo de ensino!');location.href='../../view/cadastrarPeriodo.php'</script>";
		}else{

		$sql = "INSERT INTO periodo(numeroPeriodo, tipoEnsino) VALUES('$numeroPeriodo','$tipoEnsino')";
		$query = mysqli_query($conn,$sql) or die("Não foi possível cadastrar o período!" . mysqli_error($conn));

		if($query){

			echo "<script type='text/javascript'>alert('Período inserido com sucesso!');location.href='../../view/cadastrarPeriodo.php'</script>";

		}
	}
		mysqli_close($conn);
	}

?>
