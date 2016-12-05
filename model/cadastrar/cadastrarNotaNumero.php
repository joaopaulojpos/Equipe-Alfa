<?php
	require_once '../conexao.php';

	if(isset($_POST['inserir'])){
	$matriculaAluno = $_POST['matriculaAluno'];
	$nota1 = $_POST['nota1'];
	$nota2 = $_POST['nota2'];

		$sql = "SELECT codigoNota, matriculaAluno FROM nota WHERE matriculaAluno = '$matriculaAluno'";
		$query = mysqli_query($conn,$sql) or die("Não foi possível pegar o código da nota. Erro: " . mysqli_error($conn));
		$row = mysqli_fetch_assoc($query);
		$codigoNota = $row['codigoNota'];
		$matricula = $row['matriculaAluno'];
		

		if($matriculaAluno == ""){

			echo "<script type='text/javascript'>alert('O campo matrícula deve ser preenchido!');location.href='../../view/cadastrarNotaNumero.php';</script>";

		}else
			if(strlen($matriculaAluno) > 10 || strlen($matriculaAluno) < 10){

				echo "<script type='text/javascript'>alert('O campo matrícula deve conter 10 dígitos numéricos!');location.href='../../view/cadastrarNotaNumero.php';</script>";

			}else
				if($matriculaAluno != $matricula){

				echo "<script type='text/javascript'>alert('A nota do aluno de matrícula $matriculaAluno não encontra - se cadastrada!');location.href='../../view/cadastrarNota.php';</script>";

				}else{

					if($nota1 != ""){

						if($nota1 =! null){

							echo "<script type='text/javascript'>alert('A 1ª nota do aluno já encontra - se cadastrada!');location.href='../../view/cadastrarNotaNumero.php';</script>";
						}else{

						$sql1 = "INSERT INTO notaNumero(codigoNota, matriculaAluno, nota1) VALUES('$codigoNota', '$matriculaAluno', '$nota1')";
						$query1 = mysqli_query($conn,$sql1) or die("Erro nota1: " . mysqli_error($conn));		

						if($query1){		

						echo "<script type='text/javascript'>alert('1ª nota inserida com sucesso!');location.href='../../view/cadastrarNotaNumero.php';</script>";	
						}	
					}

					}else
						if($nota2 != ""){

							if($nota2 =! null){

								echo "<script type='text/javascript'>alert('A 2ª nota do aluno já encontra - se cadastrada!');location.href='../../view/cadastrarNotaNumero.php';</script>";
							}else{

							$sql2 = "UPDATE notaNumero SET nota2 = '$nota2' WHERE matriculaAluno = '$matriculaAluno'";
							$query2 = mysqli_query($conn,$sql2) or die("Erro nota2: " . mysqli_error($conn));
		
						if($query2){

						echo "<script type='text/javascript'>alert('2ª nota inserida com sucesso!');location.href='../../view/cadastrarNotaNumero.php';</script>";
						}		
					}

					}else{

					echo "<script type='text/javascript'>alert('Informe a nota que deseja inserir.');location.href='../../view/cadastrarNotaNumero.php';</script>";
					}
				}

		mysqli_close($conn);
	}
	
?>