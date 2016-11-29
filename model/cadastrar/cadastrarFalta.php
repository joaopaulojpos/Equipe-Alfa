<?php
	require_once '../conexao.php';

	if(isset($_POST['matriculaAluno'])){		
		$matriculaAluno = $_POST['matriculaAluno'];
		$mes = $_POST['mes'];
		$faltas = $_POST['faltas'];
		$abono = $_POST['abono'];
		$motivo = $_POST['motivo'];


	$sql = "SELECT codigoDisciplinaTurma FROM presenca INNER JOIN disciplinaTurma WHERE matriculaAluno = '$matriculaAluno'";
	$query = mysqli_query($conn,$sql) or die("Código não encontrado! Erro: " . mysqli_error($conn));
	$row = mysqli_fetch_assoc($query);
	$codigoDisciplinaTurma = $row['codigoDisciplinaTurma'];

	$sql1 = "SELECT matriculaAluno FROM aluno";
	$query1 = mysqli_query($conn,$sql1) or die("Matrícula não encontrada! Erro: " . mysqly_error($conn));
	$row = mysqli_fetch_assoc($query1);
	$matricula = $row['matriculaAluno'];



	if($matriculaAluno == "" || $matriculaAluno == null){

					echo "<script type='text/javascript'>alert('O campo matricula deve ser preenchido!');location.href='../../view/cadastrarFalta.php';</script>";
	}else
		if($matriculaAluno != $matricula){

				echo "<script type='text/javascript'>alert('O aluno informado não está cadastrado!');location.href='../../view/cadastrarFalta.php';</script>";
		}else					
			if ($mes == "") {

					echo "<script type='text/javascript'>alert('Escolha o mês!');location.href='../../view/cadastrarFalta.php';</script>";

				}else
					if($faltas == ""){

						echo "<script type='text/javascript'>alert('Informe a(s) falta(s) do aluno no mês selecionado!');location.href='../../view/cadastrarFalta.php';</script>";
					}else
						if($abono == ""){

							echo "<script type='text/javascript'>alert('Informe se houve abono ou não sobre a(s) falta(s)!');location.href='../../view/cadastrarFalta.php';</script>";
						}else{				

	$sql2 = "INSERT INTO falta(matriculaAluno, codigoDisciplinaTurma, mes, faltas, abono, motivo) VALUES('$matriculaAluno', '$codigoDisciplinaTurma', '$mes', '$faltas', '$abono', '$motivo')";
	$query2 = mysqli_query($conn,$sql2) or die("Não foi possível cadastrar a falta! Erro: " . mysqli_error($conn));

	if($query2){

		echo "<script type='text/javascript'>alert('Falta(s) inserida(s) com sucesso!');location.href='../../view/cadastrarFalta.php';</script>";
	}
}

	if($faltas != null){

		$sql3 = "UPDATE falta SET faltas = '$faltas' WHERE $matriculaAluno = '$matriculaAluno'";
		$query3 = mysqli_query($conn,$sql3) or die("Não foi possível atualizar a falta! Erro:" . mysqli_error($conn));

		if($query3){

			echo "<script type='text/javascript'>alert('Falta(s) atualizada(s) com sucesso!');location.href='../../view/cadastrarFalta.php';</script>";
		}
	}	

	mysqli_close($conn);
}

?>