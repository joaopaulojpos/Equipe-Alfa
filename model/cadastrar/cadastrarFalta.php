<?php
	require_once '../conexao.php';

	if(isset($_POST['matriculaAluno'])){
		$matriculaAluno = $_POST['matriculaAluno'];
		$mes = $_POST['mes'];
		$faltas = $_POST['faltas'];
		$abono = $_POST['abono'];
		$motivo = $_POST['motivo'];


	$sql = "SELECT codigoDisciplinaTurma FROM presenca INNER JOIN disciplinaTurma WHERE matriculaAluno = '$matriculaAluno'";
	$query = mysqli_query($conn,$query) or die("Código não encontrado! Erro: " . mysqli_error($conn));
	$row = mysqli_fetch_assoc($query);
	$codigoDisciplinaTurma = $row['codigoDisciplinaTurma'];

	$sql1 = "INSERT INTO falta(matriculaAluno, codigoDisciplinaTurma, mes, faltas, abono, motivo) VALUES($matriculaAluno, $codigoDisciplinaTurma, $mes, $faltas, $abono, $motivo)";
	$query1 = mysqli_query($conn,$sql1) or die("Não foi possível cadastrar a falta!");

	if($query1){

		echo "<script type='text/javascript'>alert('Falta inserida com sucesso!');location.href='../../view/cadastrarFalta.php';</script>";
	}
	if($faltas != null){

		$sql2 = "UPDATE falta SET faltas = '$faltas' WHERE $matriculaAluno = '$matriculaAluno'";
		$query2 = ($conn,$sql1) or die("Não foi possível atualizar a falta! Erro:" . mysqli_error($conn));

		if($query2){

			echo "<script type='text/javascript'>alert('Falta atualizada com sucesso!');location.href='../../view/cadastrarFalta.php';</script>"
		}
	}

	mysqli_close($conn);
}
?>