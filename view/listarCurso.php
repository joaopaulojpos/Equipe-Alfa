<?php require_once 'includes/cabecalhocss.php'; ?>

    <body class="#37474f blue-grey darken-3">    
                  			
			
		<div class="valign-wrapper container row formulario">           
		<div class="col s12 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">		
        <?php require_once '../model/conexao.php'; ?>                    
               
            <?php //SQL para LISTAR os Cursos
            $sql = "SELECT codigoCurso, nomeCurso, tipoEnsino, duracao FROM curso";
            $query = mysqli_query($conn, $sql) or die("Não foi possível listar os cursos. Erro: " . mysqli_error($conn)); ?>



            <?php if (mysqli_num_rows($query) > 0):?>
                
                <h2><b>Lista de Cursos</b></h2>
				<br>				
				<div>
				<table class="highlight">				
					<tbody>							
						<thead>
							<tr>
								<th>Código</th>
								<th>Nome</th>
								<th>Tipo Ensino</th>
								<th>Duração</th>
								<th>Ações</th>
							</tr>							
						</thead>

                <?php while ($row = mysqli_fetch_assoc($query)): ?>

							<tr>
								<td><?php echo $row['codigoCurso'] ?></td>
								<td><?php echo $row['nomeCurso'] ?></td>
								<td><?php echo $row['tipoEnsino'] ?></td>
								<td><?php echo $row['duracao']    ?></td>
								<td><a href="../model/excluir/excluirCurso.php?codigoCurso=<?php echo $row['codigoCurso']; ?>"><i class="material-icons">delete</i></a>
								<a href="../view/editarCurso.php?codigoCurso=<?php echo $row['codigoCurso']; ?>"><i class="material-icons">edit</i></a></td>
							</tr>                        
                <?php endwhile; ?> 						
					</tbody>						
				</table>							
				<br/>
                <div class="row col s4 left-align">
				<button class="btn waves-effect waves-light" type="button" name="voltar" onclick="location.href='cadastrarCurso.php'">Voltar</button>
				</div>
				<?php else:?>

                <script type='text/javascript'>alert('Não há registro de cursos no banco de dados!');location.href='cadastrarCurso.php';</script>
				
				<?php endif?>
			
			<?php mysqli_close($conn); ?>
			
				</div>
			</div>
<?php require_once 'includes/rodapecss.php'; ?>