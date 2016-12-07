<?php require_once 'includes/cabecalhocss.php'; ?>

    <body class="#37474f blue-grey darken-3">    
                  			
			
		<div class="valign-wrapper container row formulario">           
		<div class="col s12 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">		
        <?php require_once '../model/conexao.php'; ?>                    
               
            <?php //SQL para LISTAR as Notas Conceito
            $sql = "SELECT matriculaAluno, conceito1, conceito2 FROM notaConceito";
            $query = mysqli_query($conn, $sql) or die("Não foi possível listar o(s) conceito(s). Erro: " . mysqli_error($conn));?>

            <?php if (mysqli_num_rows($query) > 0):?>
                
                <h2><b>Lista de Conceitos</b></h2>
				<br>				
				<div>
				<table class="highlight">				
					<tbody>							
						<thead>
							<tr>
								<th>Matrícula Aluno</th>
								<th>1º Conceito</th>
								<th>2º Conceito</th>								
								<th>Ações</th>
							</tr>							
						</thead>

                <?php while ($row = mysqli_fetch_assoc($query)): ?>

							<tr>
								<td><?php echo $row['matriculaAluno'] ?></td>
								<td><?php echo strtoupper($row['conceito1']) ?></td>
								<td><?php echo strtoupper($row['conceito2']) ?></td>
								<td><a href="../model/excluir/excluirNotaConceito.php?matriculaAluno=<?php echo $row['matriculaAluno']; ?>"><i class="material-icons">delete</i></a>
								<a href="../view/editarNotaConceito.php?matriculaAluno=<?php echo $row['matriculaAluno']; ?>"><i class="material-icons">edit</i></a></td>
							</tr>                        
                <?php endwhile; ?> 						
					</tbody>						
				</table>							
				<br/>
                <div class="row col s4 left-align">
				<button class="btn waves-effect waves-light" type="button" name="voltar" onclick="location.href='cadastrarNotaConceito.php'">Voltar</button>
				</div>
				<?php else:?>

                <script type='text/javascript'>alert('Não há registro de notas conceito no banco de dados!');location.href='cadastrarNotaConceito.php';</script>
				
				<?php endif?>
			
			<?php mysqli_close($conn); ?>
			
				</div>
			</div>
<?php require_once 'includes/rodapecss.php'; ?>