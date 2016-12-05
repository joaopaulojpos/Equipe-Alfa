<?php
require_once '../model/conexao.php';

if(isset($_GET['matriculaAluno'])){
$matriculaAluno = $_GET['matriculaAluno'];
/*
 * Retornando os dado do banco para os campos do formulário para que possam ser alterados
 */
$sql = "SELECT matriculaAluno, dataNascimento, nomeAluno, sexoAluno, telefone FROM aluno WHERE matriculaAluno = '$matriculaAluno'";
$query = mysqli_query($conn, $sql) or die("Falha no BD: " . mysqli_error($conn));
$row = mysqli_fetch_assoc($query);
$dataNascimento = date("d/m/Y", strtotime($row['dataNascimento']));
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Sistema de Gerenciamento Acadêmico</title>
        <!--Import Google Icon Font-->
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- Materialize CSS -->
		<link rel="stylesheet" href="../csss/materialize.css">
		<link rel="stylesheet" href="../csss/custom.css">
    </head>
    <body class="#37474f blue-grey darken-3">
        <div class="valign-wrapper container row formulario">
			<div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
				<h2><b>Alterar Aluno</b></h2>                
                <form method="post" action="../model/alterar/alterarAluno.php">
				
					<div class="row input-field col s12 left-align">
						<input type="text" id="nomeAluno" name="nomeAluno" value="<?php echo $row['nomeAluno']; ?>" />
						<label class="label">Nome: </label>
					</div>
					<div class="row input-field col s6 left-align">
						<input type="text" id="matriculaAluno" name="matriculaAluno" value="<?php echo $row['matriculaAluno']; ?>"/>
						<label class="label">Matrícula: </label>
					</div>
					<div class="row input-field col s6 left-align">
						<input type="text" id="dataNascimento" name="dataNascimento" value="<?php echo $dataNascimento ?>"/>					
						<label id="dtNasc">Data Nasc.: </label>
					</div>					
					<div class="row input-field col s6 left-align">
						<input type="text" id="sexoAluno" name="sexoAluno" value="<?php echo $row['sexoAluno']; ?>"/>
						<label class="label">Sexo: </label>
					</div>
					<div class="row input-field col s6 left-align">
						<input type="text" id="telefone" name="telefone" value="<?php echo $row['telefone']; ?>"/>
						<label id="tel">Telefone: </label>
					</div>
					
					<div class="row col s4 left-align btnform">
					<button class="btn waves-effect waves-ligth" type="submit" name="alterar">
					Alterar
					</button>
					</div>
					<div class="row col s4 center-align">
					<a class="btn waves-effect waves-light" href="listarAluno.php">Voltar</a>
					</div>
					<br/>
                </form>
			</div>
        </div>
		<!-- Materialize JS -->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<!-- Materialize JS -->
		<script src="../js/materialize.js"></script>
    </body>
</html>
