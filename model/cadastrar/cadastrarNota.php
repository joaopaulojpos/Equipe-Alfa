<?php

	require_once "../conexao.php";

	if(isset($_POST['matriculaAluno'])){
	$matriculaAluno = $_POST['matriculaAluno'];
	$recuperacao = $_POST['recuperacao'];
	$final = $_POST['final'];
	$tipoNota = $_POST['tipoNota'];
	$situacao = $_POST['situacao'];

	$sql = "SELECT matriculaAluno FROM nota";
	$query = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($query);
	$matricula = $row['matriculaAluno'];

	$sql1 = "SELECT matriculaAluno FROM aluno";
	$query1 = mysqli_query($conn,$sql1);
	$row1 = mysqli_fetch_assoc($query1);
	$matricula1 = $row1['matriculaAluno'];


if($matriculaAluno == $matricula1){

	if($matriculaAluno != $matricula){	
			
			$sql2 = "INSERT INTO nota(matriculaAluno, recuperacao, final, tipoNota, situacao) VALUES('$matriculaAluno','$recuperacao','$final', '$tipoNota', '$situacao')";
			$query2 = mysqli_query($conn,$sql2) or die("Falha ao cadastrar a nota! Erro: " . mysqli_error($conn));

			if($query2){

			echo "<script type='text/javascript'>alert('Nota cadastrada com sucesso!');location.href='../../view/cadastrarNota.php';</script>";
			}
	}else
		if($recuperacao != null){

			$sql3 = "UPDATE nota SET recuperacao = '$recuperacao' WHERE matriculaAluno = '$matriculaAluno'";
			$query3 = mysqli_query($conn,$sql3) or die("Falha ao inserir a nota da recuperação! Erro: " . mysqli_error($conn));

			if($query3){

			echo "<script type='text/javascript'>alert('Nota da recuperação inserida com sucesso!');location.href='../../view/cadastrarNota.php';</script>";
			}
		}else
			if($final != null){

			$sql4 = "UPDATE nota SET final = '$final' WHERE matriculaAluno = '$matriculaAluno'";
			$query4 = mysqli_query($conn,$sql4) or die("Falha ao inserir a nota final! Erro: " . mysqli_error($conn));

			if($query4){

				echo "<script type='text/javascript'>alert('Nota final inserida com sucesso!');location.href='../../view/cadastrarNota.php';</script>";
				}
			}else
				if(isset($situacao)){

					$sql5 = "UPDATE nota SET situacao = '$situacao' WHERE matriculaAluno = '$matriculaAluno'";
					$query5 = mysqli_query($conn,$sql5) or die("Falha ao atualizar a situação do aluno! Erro: " . mysqli_error($conn));

					if($query5){

						echo "<script type='text/javascript'>alert('Situação do aluno atualizada com sucesso!');location.href='../../view/cadastrarNota.php';</script>";
						}
					}else{

						echo "<script type='text/javascript'>alert('A nota deste aluno já encontra cadastrada!');location.href='../../view/cadastrarNota.php';</script>";
					}

					}else{

			echo "<script type='text/javascript'>alert('O aluno de matrícula $matriculaAluno não encontra-se cadastrado!');location.href='../../view/cadastrarNota.php';</script>";
		}

			mysqli_close($conn);
	}
?>