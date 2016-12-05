<?php require_once 'includes/cabecalhocss.php'; ?>

    <body class="#37474f blue-grey darken-3">                   			
			
		<div class="valign-wrapper container row formulario">           
		<div class="col s12 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">		
        <?php require_once '../model/conexao.php'; ?>                    
               
            <?php //SQL para LISTAR as NOTAS
            $sql = "SELECT codigoNota, matriculaAluno, recuperacao, final, tipoNota, situacao FROM nota";
            $query = mysqli_query($conn, $sql) or die("Não foi possível listar a(s) nota(s). Erro: " . mysqli_error($conn));?>

            <?php if (mysqli_num_rows($query) > 0):?>
                
                <h2><b>Lista de Notas</b></h2>
				<br>				
				<div>
				<table class="highlight">				
					<tbody>							
						<thead>
							<tr>
								<th>Código</th>
								<th>Matrícula</th>
								<th>Recuperação</th>
								<th>Final</th>
								<th>Tipo</th>
								<th>Situação</th>
								<th>Ações</th>
							</tr>							
						</thead>

                <?php while ($row = mysqli_fetch_assoc($query)): ?>

							<tr>
								<td><?php echo $row['codigoNota'] ?></td>
								<td><?php echo $row['matriculaAluno'] ?></td>
								<td><?php echo $row['recuperacao']    ?></td>
								<td><?php echo $row['final']    ?></td>
								<td><?php echo $row['tipoNota']    ?></td>
								<td><?php echo $row['situacao']    ?></td>
								<td><a href="../model/excluir/excluirNota.php?codigoNota=<?php echo $row['codigoNota']; ?>"><i class="material-icons">delete</i></a>
								<a href="../view/editarNota.php?codigoNota=<?php echo $row['codigoNota']; ?>"><i class="material-icons">edit</i></a></td>
							</tr>                        
                <?php endwhile; ?> 						
					</tbody>						
				</table>							
				<br/>
                <div class="row col s4 left-align">
				<button class="btn waves-effect waves-light" type="button" name="voltar" onclick="location.href='cadastrarNota.php'">Voltar</button>
				</div>
				<?php else:?>

                <script type='text/javascript'>alert('Não há registro de notas no banco de dados!');location.href='cadastrarNota.php';</script>
				
				<?php endif?>
			
			<?php mysqli_close($conn); ?>
			
				</div>
			</div>
<?php require_once 'includes/rodapecss.php'; ?>