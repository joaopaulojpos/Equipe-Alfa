<?php require_once 'includes/cabecalhocss.php'; ?>

    <body class="#37474f blue-grey darken-3">    
                  			
			
		<div class="valign-wrapper container row formulario">           
		<div class="col s12 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">		
        <?php require_once '../model/conexao.php'; ?>

        <?php if (isset($_POST['codigoTipoUsuario'])):?>

		  <?php $codigoTipoUsuario = $_POST['codigoTipoUsuario'];				          
                //SQL para PESQUISAR Tipos Usuarios escolhido por CODIGO ou por DESCRIÇÃO
                $sql = "SELECT codigoTipoUsuario, descricaoTipoUsuario FROM tipousuario WHERE codigoTipoUsuario = '$codigoTipoUsuario'";
                $query = mysqli_query($conn, $sql) or die("Falha ao buscar o Tipos de Usuarios. Erro: " . mysqli_error($conn))?>
				
				<h2><b>Resultado da Pesquisa</b></h2>
					<div>
					<table>
						<tbody>
							<thead>
								<tr>
									<th><b>Codigo</b></th>
									<th><b>Descrição</b></th>
								</tr>
							</thead>	
                
                <?php while ($row = mysqli_fetch_assoc($query)): ?>
						
							<tr>
                                <td><?php echo $row['codigoTipoUsuario'] ?></td>
								<td><?php echo $row['descricaoTipoUsuario'] ?></td>
							</tr>
             
                <?php endwhile; ?>
						</tbody>
					</table>
					</div>
					<br/>
				<div class="row col s4 left-align">
                <a href='listarTipoUsuario.php' class="btn waves-effect waves-light">Voltar</a>
                </div>     
			<?php else: ?>
            <?php //SQL para LISTAR os dados dos Tipos de Usuarios
            $sql = "SELECT codigoTipoUsuario, descricaoTipoUsuario FROM tipousuario";
            $query = mysqli_query($conn, $sql) or die("Não foi possível listar os dados dos Usuarios.\n Erro: " . mysql_error($conn));?>

            <?php if (mysqli_num_rows($query) > 0):?>
                
                <h2><b>Lista de Niveis</b></h2>
				<br>
				<div>
				<form method="post" action="">				
					<div class="row input-field col s8 left-align">
						<input type="text" id="codigoTipoUsuario" name="codigoTipoUsuario"/>					
						<label for="codigoTipoUsuario"><b>Codigo:</b></label>
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
								<th>Codigo</th>
								<th>Descrição</th>
							</tr>							
						</thead>

                <?php while ($row = mysqli_fetch_assoc($query)): ?>
				
							<tr>
								<td><?php echo $row['codigoTipoUsuario'] ?></td>
								<td><?php echo $row['descricaoTipoUsuario'] ?></td>
								<td><a href="../model/excluir/excluirTipoUsuario.php?codigoTipoUsuario=<?php echo $row['codigoTipoUsuario']; ?>"><i class="material-icons">delete</i></a>
								<a href="../view/editarTipoUsuario.php?codigoTipoUsuario=<?php echo $row['codigoTipoUsuario']; ?>"><i class="material-icons">edit</i></a></td>
							</tr>                        
                <?php endwhile; ?> 						
					</tbody>						
				</table>							
				<br/>
                <div class="row col s4 left-align">
				<a class="btn waves-effect waves-light" href="cadastrarTipoUsuario.php">Voltar</a></div> 
				</div>
				<?php else:?>

                <script type='text/javascript'>alert('Não há registro de Tipos de Usuarios no banco de dados!');location.href='cadastrarTipoUsuario.php';</script>
				
				<?php endif?>
			<?php endif;?>
			<?php mysqli_close($conn); ?>
			
				</div>
			</div>
<?php require_once 'includes/rodapecss.php'; ?>