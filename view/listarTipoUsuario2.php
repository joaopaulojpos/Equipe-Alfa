<?php require_once 'includes/cabecalhocss.php'; ?>

    <body class="#37474f blue-grey darken-3">    
                  			
			
		<div class="valign-wrapper container row formulario">           
		<div class="col s12 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">		
        <?php require_once '../model/conexao.php'; ?>

        <?php if (isset($_POST['codigotipousuario'])):?>

		  <?php $codigotipousuario = $_POST['codigotipousuario'];				          
                //SQL para PESQUISAR Tipo escolhido por CODIGO ou por DESCRICAO
                $sql = "SELECT codigotipousuario, descricaotipousuario, FROM tipousuario WHERE codigotipousuario = '$codigotipousuario'";
                $query = mysqli_query($conn, $sql) or die("Falha ao buscar o Tipo de Usuarios . Erro: " . mysqli_error($conn))?>
				
				<h2><b>Resultado da Pesquisa</b></h2>
					<div>
					<table>
						<tbody>
							<thead>
								<tr>
									<th><b>Codigo</b></th>
									<th><b>Nome</b></th>
								</tr>
							</thead>	
                
                <?php while ($row = mysqli_fetch_assoc($query)): ?>
						
							<tr>
                                <td><?php echo $row['codigotipousuario'] ?></td>
								<td><?php echo $row['descricaotipousuario'] ?></td>
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
            <?php //SQL para LISTAR os tipos de USUARIOS
            $sql = "SELECT codigotipousuario, descricaotipousuario, FROM tipousuario";
            $query = mysqli_query($conn, $sql) or die("Não foi possível listar os tipos de Usuarios.\n Erro: " . mysql_error($conn));?>

            <?php if (mysqli_num_rows($query) > 0):?>
                
                <h2><b>Lista de Niveis de Acesso</b></h2>
				<br>
				<div>
				<form method="post" action="">				
					<div class="row input-field col s8 left-align">
						<input type="text" id="codigotipousuario" name="codigotipousuario"/>					
						<label for="codigotipousuario"><b>Codigo:</b></label>
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
								<th>Tipo de Usuario</th>
							</tr>							
						</thead>

                <?php while ($row = mysqli_fetch_assoc($query)): ?>
				
							<tr>
								<td><?php echo $row['codigotipousuario'] ?></td>
								<td><?php echo $row['descricaotipousuario'] ?></td>
								<td><a href="../model/excluir/excluirTipoUsuario.php?codigotipousuario=<?php echo $row['codigotipousuario']; ?>"><i class="material-icons">delete</i></a>
								<a href="../view/editarTipoUsuario.php?codigotipousuario=<?php echo $row['codigotipousuario']; ?>"><i class="material-icons">edit</i></a></td>
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