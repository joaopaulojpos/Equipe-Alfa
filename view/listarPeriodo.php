<?php require_once 'includes/cabecalhocss.php'; ?>

    <body class="#37474f blue-grey darken-3">    
                  			
			
		<div class="valign-wrapper container row formulario">           
		<div class="col s12 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">		
        <?php require_once '../model/conexao.php'; ?>                    
               
            <?php //SQL para LISTAR os Periodos
            $sql = "SELECT codigoPeriodo, numeroPeriodo, tipoEnsino FROM periodo";
            $query = mysqli_query($conn, $sql) or die("Não foi possível listar os Periodos. Erro: " . mysqli_error($conn));?>

            <?php if (mysqli_num_rows($query) > 0):?>
                
                <h2><b>Lista de Periodos</b></h2>
				<br>				
				<div>
				<table class="highlight">				
					<tbody>							
						<thead>
							<tr>
								<th>Código</th>
								<th>Período</th>
								<th>Descrição</th>
								<th>Ações</th>
							</tr>							
						</thead>

                <?php while ($row = mysqli_fetch_assoc($query)): ?>

							<tr>
								<td><?php echo $row['codigoPeriodo'] ?></td>
								<td><?php echo $row['numeroPeriodo'] ?></td>
								<td><?php echo $row['tipoEnsino']    ?></td>
								<td><a href="../model/excluir/excluirPeriodo.php?codigoPeriodo=<?php echo $row['codigoPeriodo']; ?>"><i class="material-icons">delete</i></a>
								<a href="../view/editarPeriodo.php?codigoPeriodo=<?php echo $row['codigoPeriodo']; ?>"><i class="material-icons">edit</i></a></td>
							</tr>                        
                <?php endwhile; ?> 						
					</tbody>						
				</table>							
				<br/>
                <div class="row col s4 left-align">
				<button class="btn waves-effect waves-light" type="button" name="voltar" onclick="location.href='cadastrarPeriodo.php'">Voltar</button>
				</div>
				<?php else:?>

                <script type='text/javascript'>alert('Não há registro de Períodos no banco de dados!');location.href='cadastrarPeriodo.php';</script>
				
				<?php endif?>
			
			<?php mysqli_close($conn); ?>
			
				</div>
			</div>
<?php require_once 'includes/rodapecss.php'; ?>