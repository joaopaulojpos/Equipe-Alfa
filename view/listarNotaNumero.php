<?php require_once 'includes/cabecalhocss.php'; ?>

    <body class="#37474f blue-grey darken-3">    
                  			
			
		<div class="valign-wrapper container row formulario">           
		<div class="col s12 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">		
        <?php require_once '../model/conexao.php'; ?>                    
               
            <?php //SQL para LISTAR as Notas Número
            $sql = "SELECT codigoNota, matriculaAluno, nota1, nota2 FROM notaNumero";
            $query = mysqli_query($conn, $sql) or die("Não foi possível listar a(s) nota(s). Erro: " . mysqli_error($conn));?>

            <?php if (mysqli_num_rows($query) > 0):?>
                
                <h2><b>Lista de Notas</b></h2>
				<br>				
				<div>
				<table class="highlight">				
					<tbody>							
						<thead>
							<tr>
								<th>Matrícula Aluno</th>
								<th>1ª Nota</th>
								<th>2ª Nota</th>								
								<th>Ações</th>
							</tr>							
						</thead>

                <?php while ($row = mysqli_fetch_assoc($query)): ?>

							<tr>
								<td><?php echo $row['matriculaAluno'] ?></td>
								<td><?php echo $row['nota1']    ?></td>
								<td><?php echo $row['nota2']    ?></td>
								<td><a href="../model/excluir/excluirNotaNumero.php?codigoNota=<?php echo $row['codigoNota']; ?>"><i class="material-icons">delete</i></a>
								<a href="../view/editarNotaNumero.php?codigoNota=<?php echo $row['codigoNota']; ?>"><i class="material-icons">edit</i></a></td>
							</tr>                        
                <?php endwhile; ?> 						
					</tbody>						
				</table>							
				<br/>
                <div class="row col s4 left-align">
				<button class="btn waves-effect waves-light" type="button" name="voltar" onclick="location.href='cadastrarNotaNumero.php'">Voltar</button>
				</div>
				<?php else:?>

                <script type='text/javascript'>alert('Não há registro de notas número no banco de dados!');location.href='cadastrarNotaNumero.php';</script>
				
				<?php endif?>
			
			<?php mysqli_close($conn); ?>
			
				</div>
			</div>
<?php require_once 'includes/rodapecss.php'; ?>