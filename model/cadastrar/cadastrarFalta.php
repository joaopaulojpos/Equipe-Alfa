<?php
	require_once '../conexao.php';

	if(isset($_POST['matriculaAluno'])){		
		$matriculaAluno = $_POST['matriculaAluno'];
		$codigoTurma = $_POST['codigoTurma'];
		$nomeDisciplina = $_POST['nomeDisciplina'];
		$mes = $_POST['mes'];
		$falta = $_POST['falta'];
		$abono = $_POST['abono'];
		$motivo = $_POST['motivo'];
	

	$sql1 = "SELECT matriculaAluno FROM aluno WHERE matriculaAluno = '$matriculaAluno'";
	$query1 = mysqli_query($conn,$sql1);
	$row1 = mysqli_fetch_assoc($query1);
	$aluno = $row1['matriculaAluno'];

	$sql2 = "SELECT codigoTurma FROM turma WHERE codigoTurma = '$codigoTurma'";
	$query2 = mysqli_query($conn,$sql2);
	$row2 = mysqli_fetch_assoc($query2);
	$turma = $row2['codigoTurma'];

	$sql3 = "SELECT nomeDisciplina FROM disciplina WHERE nomeDisciplina = '$nomeDisciplina'";
	$query3 = mysqli_query($conn,$sql3);
	$row3 = mysqli_fetch_assoc($query3);
	$disciplina = $row3['nomeDisciplina'];

	if($matriculaAluno == ""){

					echo "<script type='text/javascript'>alert('O campo matricula deve ser preenchido!');location.href='../../view/cadastrarFalta.php';</script>";
			}else
				if($matriculaAluno != $aluno){

					echo "<script type='text/javascript'>alert('O aluno não está cadastrado!');location.href='../../view/cadastrarFalta.php';</script>";
		
				}else
					if($falta == ""){

						echo "<script type='text/javascript'>alert('Informe a(s) falta(s) do aluno no mês selecionado!');location.href='../../view/cadastrarFalta.php';</script>";

					}
					if($codigoTurma == ""){

						echo "<script type='text/javascript'>alert('Informe o código da turma!');location.href='../../view/cadastrarFalta.php';</script>";

						}else
							if($codigoTurma != $turma){

								echo "<script type='text/javascript'>alert('Turma não encontrada!');location.href='../../view/cadastrarFalta.php';</script>";

							}else
							if($nomeDisciplina == ""){

								echo "<script type='text/javascript'>alert('Informe o nome da disciplina!');location.href='../../view/cadastrarFalta.php';</script>";

							}else
								if($disciplina != $disciplina){

									echo "<script type='text/javascript'>alert('Disciplina não encontrada!');location.href='../../view/cadastrarFalta.php';</script>";

								}else					
								if ($mes == "") {

									echo "<script type='text/javascript'>alert('Escolha o mês!');location.href='../../view/cadastrarFalta.php';</script>";					
				}else
					if($abono == ""){

						echo "<script type='text/javascript'>alert('Informe se houve abono ou não sobre a(s) falta(s)!');location.href='../../view/cadastrarFalta.php';</script>";
			}else{				

	$sql4 = "INSERT INTO falta (matriculaAluno, codigoTurma, nomeDisciplina, mes, falta, abono, motivo) VALUES('$matriculaAluno', '$codigoTurma', '$nomeDisciplina', '$mes', '$falta', '$abono', '$motivo')";
	$query4 = mysqli_query($conn,$sql4) or die("Não foi possível cadastrar a falta! Erro: " . mysqli_error($conn));

	if($query4){

		echo "<script type='text/javascript'>alert('Falta(s) inserida(s) com sucesso!');location.href='../../view/cadastrarFalta.php';</script>";
		}
	}

	mysqli_close($conn);
}

?>