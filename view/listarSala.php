<?php require_once 'includes/cabecalhocss.php'; ?>

    <body class="#37474f blue-grey darken-3">    
                  			
			
		<div class="valign-wrapper container row formulario">           
		<div class="col s12 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">		
        <?php require_once '../model/conexao.php'; ?>

        <?php if (isset($_POST['descricaoSala'])):?>

		  <?php $descricaoSala = $_POST['descricaoSala'];				          
                //SQL para PESQUISAR a sala escolhida por DESCRIÇÃO DA SALA
                $sql = "SELECT codigoSala, descricaoSala, capacidade FROM sala WHERE descricaoSala = '$descricaoSala'";
                $query = mysqli_query($conn, $sql) or die("Sala não encontrada. Erro: " . mysqli_error($conn))?>
				
				<h2><b>Resultado da Pesquisa</b></h2>
					<div>
					<table>
						<tbody>
							<thead>
								<tr>
									<th><b>Código</b></th>
									<th><b>Descrição</b></th>
									<th><b>Capacidade</b></th>									
									<th><b>Ações</b></th>
								</tr>
							</thead>	
                
                <?php while ($row = mysqli_fetch_assoc($query)): ?>
						
							<tr>
                                <td><?php echo $row['codigoSala'] ?></td>
								<td><?php echo $row['descricaoSala'] ?></td>
								<td><?php echo $row['capacidade'] ?></td>								
								<td><a href="../model/excluir/excluirSala.php?codigoSala=<?php echo $row['codigoSala']; ?>"><i class="material-icons">delete</i></a>
								<a href="editarSala.php?codigoSala=<?php echo $row['codigoSala']; ?>"><i class="material-icons">edit</i></a></td>
							</tr>
             
                <?php endwhile; ?>
						</tbody>
					</table>
					</div>
					<br/>
				<div class="row col s4 left-align">
                <a href='listarSala.php' class="btn waves-effect waves-light">Voltar</a>
                </div>     
			<?php else: ?>
            <?php //SQL para LISTAR os dados da sala
            $sql = "SELECT codigoSala, descricaoSala, capacidade FROM sala";
            $query = mysqli_query($conn, $sql) or die("Não foi possível listar as salas. Erro: " . mysqli_error($conn));?>

            <?php if (mysqli_num_rows($query) > 0):?>
                
                <h2><b>Lista de Salas</b></h2>
				<br>
				<div>
				<form method="post" action="">				
					<div class="row input-field col s8 left-align">
						<input type="text" name="descricaoSala"/>					
						<label for="descricaoSala"><b>Descrição:</b></label>
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
								<th>Código</th>
								<th>Descrição</th>
								<th>Capacidade</th>								
								<th>Ações</th>
							</tr>							
						</thead>

                <?php while ($row = mysqli_fetch_assoc($query)): ?>
				
							<tr>
								<td><?php echo $row['codigoSala'] ?></td>
								<td><?php echo $row['descricaoSala'] ?></td>
								<td><?php echo $row['capacidade'] ?></td>								
								<td><a href="../model/excluir/excluirSala.php?codigoSala=<?php echo $row['codigoSala']; ?>"><i class="material-icons">delete</i></a>
								<a href="editarSala.php?codigoSala=<?php echo $row['codigoSala']; ?>"><i class="material-icons">edit</i></a></td>
							</tr>                        
                <?php endwhile; ?> 						
					</tbody>						
				</table>							
				<br/>
                <div class="row col s4 left-align">
				<a class="btn waves-effect waves-light" href="cadastrarSala.php">Voltar</a></div> 
				</div>
				<?php else:?>

                <script type='text/javascript'>alert('Não há registro de salas no banco de dados!');location.href='cadastrarSala.php';</script>
				
				<?php endif?>
			<?php endif;?>
			<?php mysqli_close($conn); ?>
			
				</div>
			</div>
<?php require_once 'includes/rodapecss.php'; ?>