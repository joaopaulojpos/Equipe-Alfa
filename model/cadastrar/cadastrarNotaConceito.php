<?php
	require_once '../conexao.php';

	if(isset($_POST['matriculaAluno'])){
	$matriculaAluno = $_POST['matriculaAluno'];
	$conceito1 = $_POST['conceito1'];
	$conceito2 = $_POST['conceito2'];

		$sql = "SELECT codigoNota, matriculaAluno FROM nota WHERE matriculaAluno = '$matriculaAluno'";
		$query = mysqli_query($conn,$sql) or die("Não foi possível pegar o código da nota. Erro: " . mysqli_error($conn));
		$row = mysqli_fetch_assoc($query);
		$codigoNota = $row['codigoNota'];
		$matricula = $row['matriculaAluno'];

		$sql1 = "SELECT matriculaAluno, conceito1, conceito2 FROM notaConceito WHERE matriculaAluno = '$matriculaAluno'";
		$query1 = mysqli_query($conn,$sql1) or die("Erro: " . mysqli_error($conn));
		$row1 = mysqli_fetch_assoc($query1);
		$matr = $row1['matriculaAluno'];
		$con1 = $row1['conceito1'];
		$con2 = $row1['conceito2'];



		if($matriculaAluno == ""){

			echo "<script type='text/javascript'>alert('O campo matrícula deve ser preenchido!');location.href='../../view/cadastrarNotaConceito.php';</script>";

		}else
			if(strlen($matriculaAluno) > 10 || strlen($matriculaAluno) < 10){

				echo "<script type='text/javascript'>alert('O campo matrícula deve conter 10 dígitos numéricos!');location.href='../../view/cadastrarNotaConceito.php';</script>";

			}else
				if($matriculaAluno != $matricula){

				echo "<script type='text/javascript'>alert('Matrícula não cadastrada!');location.href='../../view/cadastrarNota.php';</script>";

				}else{

					if($conceito1 != ""){

						
						if($con1 != null){

							echo "<script type='text/javascript'>alert('O 1º conceito do aluno já foi inserido!');location.href='../../view/listarNotaConceito.php';</script>";
						}else{

							$sql2 = "INSERT INTO notaConceito(codigoNota, matriculaAluno, conceito1) VALUES('$codigoNota', '$matriculaAluno', '$conceito1')";
							$query2 = mysqli_query($conn,$sql2) or die("Erro conceito1: " . mysqli_error($conn));		

								if($query2){		

									echo "<script type='text/javascript'>alert('1º conceito inserido com sucesso!');location.href='../../view/cadastrarNotaConceito.php';</script>";	
								}	
						}

					}else
						if($conceito2 != ""){							
								
								if($con2 != null){								

									echo "<script type='text/javascript'>alert('O 2º conceito do aluno já foi inserido!');location.href='../../view/cadastrarNotaConceito.php';</script>";
								}else{

									$sql3 = "UPDATE notaConceito SET conceito2 = '$conceito2' WHERE matriculaAluno = '$matriculaAluno'";
									$query3 = mysqli_query($conn,$sql3) or die("Erro conceito2: " . mysqli_error($conn));
		
									if($query3){

										echo "<script type='text/javascript'>alert('2º conceito inserido com sucesso!');location.href='../../view/cadastrarNotaConceito.php';</script>";
									}		
								}

						}else{

							echo "<script type='text/javascript'>alert('Informe o conceito que deseja inserir.');location.href='../../view/cadastrarNotaConceito.php';</script>";
						}
					}

		mysqli_close($conn);
	}	
	
?>