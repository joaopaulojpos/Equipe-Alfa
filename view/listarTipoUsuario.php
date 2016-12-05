<?php require_once 'includes/cabecalhocss.php'; ?>

    <body class="#37474f blue-grey darken-3">                    			
			
		<div class="valign-wrapper container row formulario">           
		<div class="col s12 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">		
        <?php require_once '../model/conexao.php'; ?>
        
            <?php //SQL para LISTAR os dados dos Tipos de Usuarios
            $sql = "SELECT codigoTipoUsuario, descricaoTipoUsuario FROM tipousuario";
            $query = mysqli_query($conn, $sql) or die("Não foi possível listar os dados dos Usuarios.\n Erro: " . mysql_error($conn));?>

            <?php if (mysqli_num_rows($query) > 0):?>
                
                <h2><b>Lista de Níveis</b></h2>
				<br>				
				<div>
				<table class="highlight">				
					<tbody>							
						<thead>
							<tr>
								<th>Codigo</th>
								<th>Descrição</th>
								<th>Ações</th>
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

			<?php mysqli_close($conn); ?>
			
				</div>
			</div>
<?php require_once 'includes/rodapecss.php'; ?>