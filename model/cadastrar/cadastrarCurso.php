<?php

	require_once '../conexao.php';

	if(isset($_POST['nomeCurso'])){
	$nomeCurso = $_POST['nomeCurso'];
	$tipoEnsino = $_POST['tipoEnsino'];
	$duracao = $_POST['duracao'];

	if($nomeCurso == ""){

		echo "<script type='text/javascript'>alert('Informe o nome do curso!');location.href='../../view/cadastrarCurso.php'</script>";
	
	}else
		if($tipoEnsino == ""){

			echo "<script type='text/javascript'>alert('Selecione o tipo de ensino!');location.href='../../view/cadastrarCurso.php'</script>";
		}else
			if($duracao == ""){

				echo "<script type='text/javascript'>alert('Informe a duração do curso!');location.href='../../view/cadastrarCurso.php'</script>";

			}else{

		$sql = "INSERT INTO curso(nomeCurso, tipoEnsino, duracao) VALUES('$nomeCurso', '$tipoEnsino', '$duracao')";
		$query = mysqli_query($conn,$sql) or die("Não foi possível cadastrar o curso!" . mysqli_error($conn));
	}

		if($query){

			echo "<script type='text/javascript'>alert('Curso inserido com sucesso!');location.href='../../view/cadastrarCurso.php'</script>";

		}else{

			echo "<script type='text/javascript'>alert('Não fi possível cadastrar o curso!');location.href='../../view/cadastrarCurso.php'</script>";
		}
	
		mysqli_close($conn);
	}

?>
