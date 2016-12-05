<?php require_once 'includes/cabecalhocss.php'; ?>

    <body class="#37474f blue-grey darken-3">    
                  			
			
		<div class="valign-wrapper container row formulario">           
		<div class="col s12 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">		
        <?php require_once '../model/conexao.php'; ?>                    
               
            <?php //SQL para LISTAR as Turmas
            $sql = "SELECT codigoTurma, codigoPeriodo, ano, turno FROM turma";
            $query = mysqli_query($conn, $sql) or die("Não foi possível listar a(s) turma(s). Erro: " . mysqli_error($conn)); ?>

            <?php if (mysqli_num_rows($query) > 0):?>
                
                <h2><b>Lista de Turmas</b></h2>
				<br>				
				<div>
				<table class="highlight">				
					<tbody>							
						<thead>
							<tr>
								<th>Código</th>
								<th>Código Período</th>
								<th>Ano</th>
								<th>Turno</th>
								<th>Ações</th>
							</tr>							
						</thead>

                <?php while ($row = mysqli_fetch_assoc($query)): ?>
                	

							<tr>
								<td><?php echo $row['codigoTurma'] ?></td>
								<td><?php echo $row['codigoPeriodo'] ?></td>								
								<td><?php echo $row['ano']    ?></td>
								<td><?php echo $row['turno']    ?></td>
								<td><a href="../model/excluir/excluirTurma.php?codigoTurma=<?php echo $row['codigoTurma']; ?>"><i class="material-icons">delete</i></a>
								<a href="../view/editarTurma.php?codigoTurma=<?php echo $row['codigoTurma']; ?>"><i class="material-icons">edit</i></a></td>
							</tr>     
						
                <?php endwhile; ?>
					</tbody>						
				</table>							
				<br/>
                <div class="row col s4 left-align">
				<button class="btn waves-effect waves-light" type="button" name="voltar" onclick="location.href='cadastrarTurma.php'">Voltar</button>
				</div>
				<?php else:?>

                <script type='text/javascript'>alert('Não há registro de turmas no banco de dados!');location.href='cadastrarTurma.php';</script>
				
				<?php endif?>
			
			<?php mysqli_close($conn); ?>
			
				</div>
			</div>
<?php require_once 'includes/rodapecss.php'; ?>