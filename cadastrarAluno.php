<?php
	require_once "conexao.php";
	
	if(isset($_POST['matriculaAluno'])){
	$matriculaAluno = $_POST['matriculaAluno'];
	$dataNascimento = date('Y,m,d',strtotime($_POST['dataNascimento']));
	$nomeAluno      = $_POST['nomeAluno'];
	$sexoAluno      = $_POST['sexoAluno'];
	$telefone       = $_POST['telefone'];
	
		$sql = "SELECT matriculaAluno,dataNascimento,nomeAluno,sexoAluno,telefone FROM aluno";
		$query = mysqli_query($conn,$sql) or die("Dados não encontrados " . mysqli_error($conn));
		$row = mysqli_fetch_assoc($query);
		$matricula = $row['matriculaAluno'];
		
		
			if($matriculaAluno == "" || $matriculaAluno == null){
				
				echo "<script type='text/javascript'>alert('O campo matrícula deve ser preenchido');window.location.href='cadastrarAluno.php';</script>";
			}else{
			if(strlen($matriculaAluno) > 10 || strlen($matriculaAluno) < 10){
				echo "<script type='text/javascript'>alert('O campo matricula deve conter 10 digitos');window.location.href='cadastrarAluno.php';</script>";
			}else{	
			if(!is_numeric($matriculaAluno)){
				echo "<script type='text/javascript'>alert('O campo matrícula deve conter apenas números');window.location.href='cadastrarAluno.php';</script>";
			}else{
			if($dataNascimento == "" || $dataNascimento == null){
				echo "<script type='text/javascript'>alert('O campo data de nascimento deve ser preenchido');window.location.href='cadastrarAluno.php';</script>";
			}else{
			if($nomeAluno == "" || $nomeAluno == null){
				echo "<script type='text/javascript'>alert('O campo nome deve ser preenchido');window.location.href='cadastrarAluno.php';</script>";
			}else{
			if($sexoAluno == "" || $sexoAluno == null){
				echo "<script type='text/javascript'>alert('Selecione uma opção para o campo sexo');window.location.href='cadastrarAluno.php';</script>";
			}else{
			if($telefone == "" || $telefone == null){
				echo "<script type='text/javascript'>alert('O campo telefone deve ser preenchido');window.location.href='cadastrarAluno.php';</script>";
			}else{
			if(!preg_match('^[0-9]{2} [0-9]{4,5}-[0-9]{4}$^',$telefone)){
				echo "<script type='text/javascript'>alert('Telefone inválido!');window.location.href='cadastrarAluno.php';</script>";
			}else{
			if($matricula == $matriculaAluno){
				echo "<script type='text/javascript'>alert('Esta matrícula já encontra-se cadastrada');window.location.href='listarAluno.php'</script>";
			}else{
				$insert = "INSERT INTO aluno (matriculaAluno, dataNascimento, nomeAluno, sexoAluno, telefone) VALUES ('$matriculaAluno', '$dataNascimento', '$nomeAluno', '$sexoAluno', '$telefone')";
				$result = mysqli_query($conn, $insert) or die("Não foi possível cadastrar o aluno. " . mysqli_error($conn));
				
				if($result){
				echo "<script type='text/javascript'>alert('Aluno cadastrado com sucesso!');window.location.href='listarAluno.php';</script>";
				}else{
					echo "<script type='text/javascript'>alert('Não foi possível cadastrar este aluno');window.location.href='cadastrarAluno.php';</script>";
				}
			}
			}
			}
			}
			}
			}		
			}
			}	
			}			
		mysqli_close($conn);
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cadastro de Alunos</title>
		<link rel="stylesheet" href="cadastroAluno.css">
	</head>
	<body>
		<div>
			<fieldset>
			<h2><b>Cadastro de Alunos</b></h2>
			<hr>
			<form method="post" action="">
				<label for="matriculaAluno" class="label">Matricula: </label><input type="text" id="matriculaAluno" name="matriculaAluno"/>
				<label for="dataNascimento" id="dtNasc">Data Nasc.: </label><input type="date" id="dataNascimento" name="dataNascimento"/><br/><br/>
				<label for="nomeAluno" class="label">Nome: </label><input type="text" id="nomeAluno" name="nomeAluno"/><br/><br/>
				<label for="sexoAluno" class="label">Sexo: </label><select id="sexoAluno" name="sexoAluno">
										<option value="">Selecione</option>
										<option value="F">F</option>
										<option value="M">M</option>
									 </select>
				<label for="telefone" id="tel">Telefone: </label><input type="text" id="telefone" name="telefone"/><br/><br/><br/>
				<input type="submit" value="Cadastrar" class="btao"/>
				<input type="button" value="Listar" onclick="location.href='listarAluno.php'" class="btao"/>
				<input type="button" value="Voltar" onclick="location.href='inicioAdministrador.html'" class="btao"/>
			</form>
			</fieldset>
		</div>		
	</body>
</html>