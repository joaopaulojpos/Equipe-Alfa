<?php require_once 'includes/cabecalhocss.php'; ?>

    <body class="#37474f blue-grey darken-3">                   			
			
		<div class="valign-wrapper container row formulario">           
		<div class="col s12 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">		
        <?php require_once '../model/conexao.php'; ?>                    
               
            <?php //SQL para LISTAR as Faltas
            $sql = "SELECT codigoFalta, matriculaAluno, codigoDisciplinaTurma, mes, qtdFalta FROM falta";
            $query = mysqli_query($conn, $sql) or die("Não foi possível listar a(s) faltas(s). Erro: " . mysqli_error($conn));?>

            <?php if (mysqli_num_rows($query) > 0):?>
                
                <h2><b>Relatório de Faltas</b></h2>
				<br>				
				<div>
				<table class="highlight">				
					<tbody>							
						<thead>
							<tr>							
								<th>Matrícula</th>								
								<th>Código Disciplina</th>
								<th>Mês</th>
								<th>Qtd</th>								
								<th>Ações</th>
							</tr>							
						</thead>

                <?php while ($row = mysqli_fetch_assoc($query)): ?>

							<tr>							    
								<td><?php echo $row['matriculaAluno'] ?></td>								
								<td><?php echo $row['codigoDisciplinaTurma'] ?></td>
								<td><?php echo $row['mes'] ?></td>
								<td><?php echo $row['qtdFalta'] ?></td>								
								<td><a href="../model/excluir/excluirFalta.php?codigoFalta=<?php echo $row['codigoFalta']; ?>"><i class="material-icons">delete</i></a>
								<a href="../view/editarFalta.php?codigoFalta=<?php echo $row['codigoFalta']; ?>"><i class="material-icons">edit</i></a></td>
							</tr>                        
                <?php endwhile; ?> 						
					</tbody>						
				</table>							
				<br/>
                <div class="row col s4 left-align">
				<button class="btn waves-effect waves-light" type="button" name="voltar" onclick="location.href='cadastrarFalta.php'">Voltar</button>
				</div>
				<?php else:?>

                <script type='text/javascript'>alert('Não há registro de faltas no banco de dados!');location.href='cadastrarFalta.php';</script>
				
				<?php endif?>
			
			<?php mysqli_close($conn); ?>
			
				</div>
			</div>
<?php require_once 'includes/rodapecss.php'; ?>