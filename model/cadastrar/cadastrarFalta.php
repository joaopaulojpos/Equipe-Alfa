<?php
	require_once '../conexao.php';

	if(isset($_POST['matriculaAluno'])){				
		$matriculaAluno = $_POST['matriculaAluno'];
		$codigoDisciplinaTurma = $_POST['codigoDisciplinaTurma'];
		$mes = $_POST['mes'];
		$qtdFalta = $_POST['qtdFalta'];		
	

	$sql1 = "SELECT matriculaAluno FROM aluno WHERE matriculaAluno = '$matriculaAluno'";
	$query1 = mysqli_query($conn,$sql1);
	$row1 = mysqli_fetch_assoc($query1);
	$aluno = $row1['matriculaAluno'];

	$sql2 = "SELECT codigoDisciplinaTurma FROM disciplinaTurma WHERE codigoDisciplinaTurma = '$codigoDisciplinaTurma'";
	$query2 = mysqli_query($conn,$sql2);
	$row2 = mysqli_fetch_assoc($query2);
	$codigo = $row2['codigoDisciplinaTurma'];

	if($matriculaAluno == ""){

					echo "<script type='text/javascript'>alert('O campo matricula deve ser preenchido.');location.href='../../view/cadastrarFalta.php';</script>";
			}else
				if($matriculaAluno != $aluno){

					echo "<script type='text/javascript'>alert('O aluno não está cadastrado.');location.href='../../view/cadastrarFalta.php';</script>";
		
				}else
					if($codigoDisciplinaTurma == ""){

						echo "<script type='text/javascript'>alert('Informe o código solicitado.');location.href='../../view/cadastrarFalta.php';</script>";

					}
					if($codigoDisciplinaTurma != $codigo){

						echo "<script type='text/javascript'>alert('Dados não encontrados.');location.href='../../view/cadastrarFalta.php';</script>";

						}else
							if($mes ==""){

								echo "<script type='text/javascript'>alert('Selecione o mês.');location.href='../../view/cadastrarFalta.php';</script>";

							}else
							if($qtdFalta == ""){

								echo "<script type='text/javascript'>alert('Informe a quantidade de faltas.');location.href='../../view/cadastrarFalta.php';</script>";

			}else{				

	$sql3 = "INSERT INTO falta (matriculaAluno, codigoDisciplinaTurma, mes, qtdFalta) VALUES('$matriculaAluno', '$codigoDisciplinaTurma', '$mes', '$qtdFalta')";
	$query3 = mysqli_query($conn,$sql3) or die("Não foi possível cadastrar a falta! Erro: " . mysqli_error($conn));
}

	if($query3){

		echo "<script type='text/javascript'>alert('Falta(s) inserida(s) com sucesso!');location.href='../../view/cadastrarFalta.php';</script>";

		}else{

		echo "<script type='text/javascript'>alert('Não foi possível cadastrar a nota!');location.href='../../view/cadastrarFalta.php';</script>";
	}

	mysqli_close($conn);
}

?>