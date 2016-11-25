<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<title>Sistema de Gerenciamento Acadêmico</title>
		<!--Import Google Icon Font-->
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- Materialize CSS -->
		<link rel="stylesheet" href="../../csss/materialize.css">
		<link rel="stylesheet" href="../../csss/materialize.min.css">
		<link rel="stylesheet" href="../../csss/custom.css">
	</head>

    <body class="#37474f blue-grey darken-3">    
                  			
			
		<div class="valign-wrapper container row formulario">           
		<div class="col s12 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">		
        <?php require_once '../conexao.php'; ?>

        <?php if (isset($_POST['matriculaAluno'])):?>

		  <?php $matriculaAluno = $_POST['matriculaAluno'];				          
                //SQL para PESQUISAR aluno escolhido por MATRÍCULA ou por NOME
                $sql = "SELECT matriculaAluno, dataNascimento, nomeAluno, sexoAluno, telefone FROM aluno WHERE matriculaAluno = '$matriculaAluno'";
                $query = mysqli_query($conn, $sql) or die("Falha ao buscar o aluno. Erro: " . mysqli_error($conn))?>
				
				<h2><b>Resultado da Pesquisa</b></h2>
					<div>
					<table>
						<tbody>
							<thead>
								<tr>
									<th><b>Matrícula</b></th>
									<th><b>Data Nasc.</b></th>
									<th><b>Nome</b></th>
									<th><b>Sexo</b></th>
									<th><b>Telefone</b></th>
								</tr>
							</thead>	
                
                <?php while ($row = mysqli_fetch_assoc($query)): ?>
						
							<tr>
                                <td><?php echo $row['matriculaAluno'] ?></td>
								<td><?php echo date('d/m/Y', strtotime($row['dataNascimento'])) ?></td>
								<td><?php echo $row['nomeAluno'] ?></td>
								<td><?php echo $row['sexoAluno'] ?></td>
								<td><?php echo $row['telefone'] ?></td>
							</tr>
             
                <?php endwhile; ?>
						</tbody>
					</table>
					</div>
					<br/>
				<div class="row col s4 left-align">
                <a href='listarAluno.php' class="btn waves-effect waves-light">Voltar</a>
                </div>     
			<?php else: ?>
            <?php //SQL para LISTAR os dados dos alunos
            $sql = "SELECT matriculaAluno, dataNascimento, nomeAluno, sexoAluno, telefone FROM aluno";
            $query = mysqli_query($conn, $sql) or die("Não foi possível listar os dados do aluno.\n Erro: " . mysql_error($conn));?>

            <?php if (mysqli_num_rows($query) > 0):?>
                
                <h2><b>Lista de Alunos</b></h2>
				<br>
				<div>
				<form method="post" action="">				
					<div class="row input-field col s8 left-align">
						<input type="text" id="matriculaAluno" name="matriculaAluno"/>					
						<label for="matriculaAluno"><b>Matrícula:</b></label>
					</div>
					<div>
						<button type="submit" class="btn-floating btn-small waves-effect waves-teal"><i class="material-icons right-align">search</i></button></td>					
					</div>						
                </form>
				</div>
				<br/><br/> 
				<div>
				<table class="highlight">				
					<tbody>							
						<thead>
							<tr>
								<th>Matrícula</th>
								<th>Data Nasc.</th>
								<th>Nome</th>
								<th>Sexo</th>
								<th>Telefone</th>
								<th>Ações</th>
							</tr>							
						</thead>

                <?php while ($row = mysqli_fetch_assoc($query)): ?>
				
							<tr>
								<td><?php echo $row['matriculaAluno'] ?></td>
								<td><?php echo date('d/m/Y', strtotime($row['dataNascimento'])) ?></td>
								<td><?php echo $row['nomeAluno'] ?></td>
								<td><?php echo $row['sexoAluno'] ?></td>
								<td><?php echo $row['telefone'] ?></td>
								<td><a href="../excluir/excluirAluno.php?matriculaAluno=<?php echo $row['matriculaAluno']; ?>"><i class="material-icons">delete</i></a>
								<a href="../../view/editarAluno.php?matriculaAluno=<?php echo $row['matriculaAluno']; ?>"><i class="material-icons">edit</i></a></td>
							</tr>                        
                <?php endwhile; ?> 						
					</tbody>						
				</table>							
				<br/>
                <div class="row col s4 left-align">
				<a class="btn waves-effect waves-light" href="../../view/cadastrarAluno.php">Voltar</a></div> 
				</div>
				<?php else:?>

                <script type='text/javascript'>alert('Não há registro de alunos no banco de dados!');location.href='../../view/cadastrarAluno.php';</script>
				
				<?php endif?>
			<?php endif;?>
			<?php mysqli_close($conn); ?>
			
				</div>
			</div>
                   
		<!-- Materialize JS -->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<!-- Materialize JS -->
		<script src="../../js/materialize.js"></script>
		<!--Script para Funcionamento do Option e do Date -->
		<script>
			$(document).ready(function(){
			$('select').material_select();
			$('.datepicker').pickadate();
			});
		</script>
	</body>
</html>