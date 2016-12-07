<?php require_once 'includes/cabecalhocss.php'; ?>

    <body class="#37474f blue-grey darken-3">    
                  			
			
		<div class="valign-wrapper container row formulario">           
		<div class="col s12 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">		

		<div>
			<h2>Relatório de Frequência</h2>
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

                 $sql = "SELECT aluno.matriculaAluno matricula, aluno.nomeAluno nomeAluno, falta.mes mes, falta.qtdFalta qtd  FROM aluno INNER JOIN falta on aluno.matriculaAluno = falta.matriculaAluno  WHERE aluno.matriculaAluno = $matriculaAluno";
            	 $query = mysqli_query($conn,$sql) or die("Não foi possível listar os dados. Erro: " . mysqli_error($conn));
            ?>

					<div>
					<table>
						<tbody>
							<thead>
								<tr>
									<th><b>Matrícula</b></th>
									<th><b>Nome</b></th>
									<th><b>Mês</b></th>
									<th><b>Qtd</b></th>									
								</tr>
							</thead>	
                
                <?php while ($row = mysqli_fetch_assoc($query)): ?>
						
							<tr>
                                <td><?php echo $row['matricula'] ?></td>
								<td><?php echo $row['nomeAluno'] ?></td>
								<td><?php echo $row['mes'] ?></td>
								<td><?php echo $row['qtd'] ?></td>								
							</tr>
             
                <?php endwhile; ?>
						</tbody>
					</table>
					</div>				 			
			<?php } endif;?>
			<div class="row col s4 left-align">
            <a href='inicioAluno.php' class="btn waves-effect waves-light">Voltar</a>
        	</div>	
			<?php mysqli_close($conn); ?>			
				</div>
			</div>
<?php require_once 'includes/rodapecss.php'; ?>