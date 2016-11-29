	<?php

	require_once "../conexao.php";

	if (isset($_POST['codigoPeriodo'])) {
		$codigoPeriodo = $_POST['codigoPeriodo'];
    	$ano = $_POST['ano'];
    	$turno = $_POST['turno'];

	if($codigoPeriodo == null){

		echo "<script type='text/javascript'>alert('Informe o código do período!');location.href='../../view/cadastrarTurma.php';</script>";
	}else
		if($ano == null){

			echo "<script type='text/javascript'>alert('Selecione o ano da turma!');location.href='../../view/cadastrarTurma.php';</script>";
		}else
			if($turno == ""){

				echo "<script type='text/javascript'>alert('Selecione o turno da turma!');location.href='../../view/cadastrarTurma.php';</script>";
			}else{

	$sql1 = "INSERT INTO turma(codigoPeriodo,ano,turno) VALUES('$codigoPeriodo','$ano','$turno')";
	$query1 = mysqli_query($conn,$sql1) or die("Não foi possível cadastrar a turma! Erro: " . mysqli_error($conn));

	if($query1){

		echo "<script type='text/javascript'>alert('Turma cadastrada com sucesso!');location.href='../../view/cadastrarTurma.php';</script>";
	}   
}
    mysqli_close($conn);
	}