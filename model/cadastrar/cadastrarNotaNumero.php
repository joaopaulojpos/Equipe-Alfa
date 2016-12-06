<?php
	require_once '../conexao.php';

	if(isset($_POST['codigoNota'])){
	$codigoNota = $_POST['codigoNota'];
	$nota1 = $_POST['nota1'];
	$nota2 = $_POST['nota2'];

		$sql = "SELECT codigoNota, matriculaAluno FROM nota WHERE codigoNota = '$codigoNota'";
		$query = mysqli_query($conn,$sql) or die("Dados não encontrados. Erro: " . mysqli_error($conn));
		$row = mysqli_fetch_assoc($query);	
		$codigo = $row['codigoNota'];	
		$matricula = $row['matriculaAluno'];


		

		if($codigoNota == ""){

			echo "<script type='text/javascript'>alert('O código da nota deve ser informado.');location.href='../../view/cadastrarNotaNumero.php';</script>";

		/*else
			if(strlen($matriculaAluno) > 10 || strlen($matriculaAluno) < 10){

				echo "<script type='text/javascript'>alert('O campo matrícula deve conter 10 dígitos numéricos.');location.href='../../view/cadastrarNotaNumero.php';</script>";*/

			}else
				if($codigoNota != $codigo){

				echo "<script type='text/javascript'>alert('Nota não cadastrada.');location.href='../../view/cadastrarNotaNumero.php';</script>";

				}else{
					if($nota1 != ""){

						if($nota1 == null){

							echo "<script type='text/javascript'>alert('A 1ª nota do aluno já encontra - se cadastrada.');location.href='../../view/cadastrarNotaNumero.php';</script>";
						}else{

						$sql1 = "INSERT INTO notaNumero(codigoNota, matriculaAluno, nota1) VALUES('$codigo', '$matriculaAluno', '$nota1')";
						$query1 = mysqli_query($conn,$sql1) or die("Erro nota1: " . mysqli_error($conn));		

						if($query1){		

						echo "<script type='text/javascript'>alert('1ª nota inserida com sucesso.');location.href='../../view/cadastrarNotaNumero.php';</script>";	
						}	
					}

					}else
						if($nota2 != ""){

							if($nota2 == null){

								echo "<script type='text/javascript'>alert('A 2ª nota do aluno já encontra - se cadastrada.');location.href='../../view/cadastrarNotaNumero.php';</script>";
							}else{

							$sql2 = "UPDATE notaNumero SET nota2 = '$nota2' WHERE matriculaAluno = '$matriculaAluno'";
							$query2 = mysqli_query($conn,$sql2) or die("Erro nota2: " . mysqli_error($conn));
		
						if($query2){

						echo "<script type='text/javascript'>alert('2ª nota inserida com sucesso.');location.href='../../view/cadastrarNotaNumero.php';</script>";
						}		
					}

					}else{

					echo "<script type='text/javascript'>alert('Informe a nota que deseja inserir.');location.href='../../view/cadastrarNotaNumero.php';</script>";
					}	
					}			

		mysqli_close($conn);
	}
	
?>