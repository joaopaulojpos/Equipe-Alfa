<?php
	require_once 'conexao.php';

	$matriculaAluno = $_GET['matriculaAluno'];
	$sql = "SELECT matriculaAluno, dataNascimento, nomeAluno, sexoAluno, telefone FROM aluno WHERE matriculaAluno = '$matriculaAluno'";
	$query = mysqli_query($conn, $sql) or die("Falha no BD: " . mysqli_error($conn));
	$row = mysqli_fetch_assoc($query);
	$dataNascimento = date("d/m/Y", strtotime($row['dataNascimento']));
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Alterar Dados de Alunos</title>
		<link rel="stylesheet" href="cadastroAluno.css">
	</head>
	<body>
		<div>
		<fieldset>
			<h2><b>Editar Dados</b></h2>
			<hr>
			<form method="post" action="alterarAluno.php">
				<label class="label">Matrícula: </label><input type="text" id="matriculaAluno" name="matriculaAluno" value="<?php echo $row['matriculaAluno']; ?>"/>
				<label id="dtNasc">Data Nasc.: </label><input type="text" id="dataNascimento" name="dataNascimento" value="<?php echo $dataNascimento ?>"/><br/><br/>
				<label class="label">Nome: </label><input type="text" id="nomeAluno" name="nomeAluno" value="<?php echo $row['nomeAluno']; ?>" /><br/><br/>
				<label class="label">Sexo: </label><input type="text" id="sexoAluno" name="sexoAluno" value="<?php echo $row['sexoAluno']; ?>"/>
				<label id="tel">Telefone: </label><input type="text" id="telefone" name="telefone" value="<?php echo $row['telefone']; ?>"/><br/><br/><br/>
				<input type="submit" value="Alterar" class="btao"/>	
				<input type="button" value="Voltar" onclick="location.href='listarAluno.php'" class="btao"/>			
			</form>
		</fieldset>
		</div>
	</body>
</html>