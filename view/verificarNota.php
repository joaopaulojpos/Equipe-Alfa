<?php require_once 'includes/cabecalhocss.php'; ?>

    <body class="#37474f blue-grey darken-3">    
                  			
			
		<div class="valign-wrapper container row formulario">           
		<div class="col s12 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">		

		<div>
			<h2>Situação Aluno</h2>
			<br/>
			<form method="post" action="">				
				<div class="row input-field col s8 left-align">
					<input type="text" name="matriculaAluno"/>					
					<label for="matriculaAluno"><b>Matrícula:</b></label>
					</div>					
				<div>
				<button type="submit" class="btn-floating btn-small waves-effect waves-teal"><i class="material-icons right-align">search</i></button></td>					
					</div>								
            </form>            
		</div>
		<br/><br/><br/>
        <?php require_once '../model/conexao.php'; ?>        

        <?php if (isset($_POST['matriculaAluno'])):?>

        	<?php $matriculaAluno = $_POST['matriculaAluno'];

        	  $sql = "SELECT matriculaAluno FROM aluno WHERE matriculaAluno = '$matriculaAluno'";
              $query = mysqli_query($conn,$sql) or die("Erro: " . mysqli_error($conn));
              $row = mysqli_fetch_assoc($query);
              $matricula = $row['matriculaAluno'];	

		 	if($matriculaAluno == ""){

		 		echo "<script type='text/javascript'>alert('Informe a matrícula.');location.href='verificarNota.php'</script>";

		 	}else
		 		if($matriculaAluno != $matricula){

		 			echo "<script type='text/javascript'>alert('A matrícula informada não está cadastrada.');location.href='verificarNota.php'</script>";
		 		}else{

                 $sql1 = "SELECT aluno.matriculaAluno, aluno.nomeAluno nomeAluno, nota.tipoNota, notaNumero.nota1 nota1, notaNumero.nota2 nota2, nota.recuperacao, nota.final, nota.situacao situacao FROM aluno INNER JOIN nota on aluno.matriculaAluno = nota.matriculaAluno INNER JOIN notaNumero on nota.matriculaAluno = notaNumero.matriculaAluno WHERE aluno.matriculaAluno = $matriculaAluno";
            	 $query1 = mysqli_query($conn,$sql1) or die("Não foi possível listar os dados. Erro: " . mysqli_error($conn));
            ?>

					<div>
					<table>
						<tbody>
							<thead>
								<tr>
									<th><b>Aluno</b></th>
									<th><b>Nota1</b></th>
									<th><b>Nota2</b></th>
									<th><b>Situação</b></th>									
								</tr>
							</thead>	
                
                <?php while ($row = mysqli_fetch_assoc($query)): ?>
						
							<tr>
                                <td><?php echo $row['nomeAluno'] ?></td>
								<td><?php echo $row['nota1'] ?></td>
								<td><?php echo $row['nota2'] ?></td>
								<td><?php echo $row['situacao'] ?></td>								
							</tr>
             
                <?php endwhile; ?>
						</tbody>
					</table>
					</div>				 			
			<?php } endif;?>
			<div class="row col s4 left-align">
            <a href='relatorioAvaliacoes.php' class="btn waves-effect waves-light">Voltar</a>
        	</div>	
			<?php mysqli_close($conn); ?>			
				</div>
			</div>
<?php require_once 'includes/rodapecss.php'; ?>