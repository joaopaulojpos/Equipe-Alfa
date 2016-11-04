<!DOCTYPE html>
<html>
	<head lang="pt-br">
		<meta charset="utf-8">
		<title>Lista de Alunos</title>
		<link rel="stylesheet" href="listarAluno.css">
	</head>
	<body>
<?php
	//SQL para pesquisar aluno escolhido por matrícula ou por nome
	require_once 'conexao.php';

	if(isset($_POST['matriculaAluno'])||isset($_POST['nomeAluno'])){

		$matriculaAluno = $_POST['matriculaAluno'];
		$nomeAluno = $_POST['nomeAluno'];

		if($matriculaAluno != "" || $nomeAluno != ""){                    

		$sql = "SELECT matriculaAluno, dataNascimento, nomeAluno, sexoAluno, telefone FROM aluno WHERE matriculaAluno = '$matriculaAluno' OR nomeAluno LIKE '%$nomeAluno%'";
		$query = mysqli_query($conn,$sql) or die("Falha ao buscar o aluno. Erro: " . mysqli_error($conn));

		
			echo "<fieldset>";
			while($row = mysqli_fetch_assoc($query)){
				
				echo "<h2><b>Resultado da Pesquisa</b></h2>";
				echo "<hr>";
				echo "<label><b>Matricula: </b></label> " . $row['matriculaAluno'] . " ";
				echo "<label><b>Data Nascimento: </b></label>" . date('d/m/Y', strtotime($row['dataNascimento'])) . " ";
				echo "<label><b>Nome: </b></label>" . $row['nomeAluno'] . " ";
				echo "<label><b>Sexo: </b></label>" . $row['sexoAluno'] . " ";
				echo "<label><b>Telefone: </b></label>" . $row['telefone'] . "<br/>";
				echo "<br/><br/>";
				
			}
			echo "<a href='listarAluno.php'><input type='button' value='Voltar' class='botao'></a>";
			echo "</fieldset>";
		}		
	
	}else{	
	//SQL para listar os dados dos alunos
	$sql = "SELECT matriculaAluno, dataNascimento, nomeAluno, sexoAluno, telefone FROM aluno";
	$query = mysqli_query($conn, $sql) or die("Não foi possível listar os dados do aluno.\n Erro: " . mysql_error($conn));

	if(mysqli_num_rows($query) > 0){
		
		echo "<fieldset>";
		echo "<h2><b>Lista de Alunos</b></h2>";
		echo "<hr>";
		echo "<br/><br/>";
		echo "<div id='divscrowbar'>";
		
		while($row = mysqli_fetch_assoc($query)){
			
		echo "<div><label><b>Matricula: </b></label> " . $row['matriculaAluno'] . " ";
		echo "<label><b>Data Nascimento: </b></label> " . date('d/m/Y',strtotime($row['dataNascimento'])) . " ";
		echo "<label><b>Nome: </b></label> " . $row['nomeAluno'] . " ";
		echo "<label><b>Sexo: </b></label> " . $row['sexoAluno'] . " ";
		echo "<label><b>Telefone: </b></label> " . $row['telefone'] . " " . "</div>";?>	
            <div id='links'><a href="excluirAluno.php?matriculaAluno=<?php echo $row['matriculaAluno'];?>" id='linkexcluir'><input type="image" src="imagem/lixeira1.png" width="25" height="25" id="icone"></a>&nbsp
		<a href="formularioAlterarAluno.php?matriculaAluno=<?php echo $row['matriculaAluno'];?>" id='linkeditar'><input type="image" src="imagem/editar.png" width="25" height="25" id="icone"></a></div>	
			
		<?php
		echo "<hr><br/>";			
        }	    
        echo "</div>";
        echo "<br/><br/>";
        echo "<a href='listarAluno.php'><input type='button' value='Atualizar' class='botao'/></a>" . " ";
	    echo "<a href='cadastrarAluno.php'><input type='button' value='Voltar' class='botao'/></a>";
		echo"</fieldset>";

		mysqli_close($conn);
		}
	else{

		echo "<script type='text/javascript'>alert('Não há registros no banco de dados!')</script>";
	}
}

?>
		<div>
			<fieldset>
			<h2><b>Buscar Aluno</b></h2>
			<hr>
			<form method="post" action="">
				<label><b>Matrícula:</b> </label><input type="text" id="matriculaAluno" name="matriculaAluno"/>
				<input type="submit" value="Buscar" class="botao">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<label><b>Nome:</b> </label><input type="text" id="nomeAluno" name="nomeAluno"/>
				<input type="submit" value="Buscar" class="botao">				
			</form>
			</fieldset>
		</div>
	</body>
</html>