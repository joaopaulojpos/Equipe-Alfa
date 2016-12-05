<?php require_once 'includes/cabecalhocss.php'; ?>

    <body class="#37474f blue-grey darken-3">    
                  			
			
		<div class="valign-wrapper container row formulario">           
		<div class="col s12 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">		
        <?php require_once '../model/conexao.php'; ?>

        <?php if (isset($_POST['codigoProfessor'])):?>

		  <?php $codigoProfessor = $_POST['codigoProfessor'];				          
                //SQL para PESQUISAR professor escolhido por CODIGO ou por NOME
                $sql = "SELECT codigoProfessor, nome, telefone FROM professor WHERE codigoProfessor = '$codigoProfessor'";
                $query = mysqli_query($conn, $sql) or die("Falha ao buscar o professor. Erro: " . mysqli_error($conn))?>
				
				<h2><b>Resultado da Pesquisa</b></h2>
					<div>
					<table>
						<tbody>
							<thead>
								<tr>
									<th><b>Codigo</b></th>
									<th><b>Nome</b></th>
									<th><b>Telefone</b></th>									
								</tr>
							</thead>	
                
                <?php while ($row = mysqli_fetch_assoc($query)): ?>
						
							<tr>
                                <td><?php echo $row['codigoProfessor'] ?></td>
								<td><?php echo $row['nome'] ?></td>
								<td><?php echo $row['telefone'] ?></td>								
							</tr>
             
                <?php endwhile; ?>
						</tbody>
					</table>
					</div>
					<br/>
				<div class="row col s4 left-align">
                <a href='listarProfessor.php' class="btn waves-effect waves-light">Voltar</a>
                </div>     
			<?php else: ?>
            <?php //SQL para LISTAR os dados dos alunos
            $sql = "SELECT codigoProfessor, nome, telefone FROM professor";
            $query = mysqli_query($conn, $sql) or die("Não foi possível listar os dados do professor.\n Erro: " . mysqli_error($conn));?>

            <?php if (mysqli_num_rows($query) > 0):?>
                
                <h2><b>Lista de Professores</b></h2>
				<br>
				<div>
				<form method="post" action="">				
					<div class="row input-field col s8 left-align">
						<input type="text" id="codigoProfessor" name="codigoProfessor"/>					
						<label for="codigoProfessor"><b>Código:</b></label>
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
								<th>Nome</th>
								<th>Telefone</th>
								<th>Ações</th>
							</tr>							
						</thead>

                <?php while ($row = mysqli_fetch_assoc($query)): ?>
				
							<tr>
								<td><?php echo $row['codigoProfessor'] ?></td>
								<td><?php echo $row['nome'] ?></td>
								<td><?php echo $row['telefone'] ?></td>
								<td><a href="../model/excluir/excluirProfessor.php?codigoProfessor=<?php echo $row['codigoProfessor']; ?>"><i class="material-icons">delete</i></a>
								<a href="../view/editarProfessor.php?codigoProfessor=<?php echo $row['codigoProfessor']; ?>"><i class="material-icons">edit</i></a></td>
							</tr>                        
                <?php endwhile; ?> 						
					</tbody>						
				</table>							
				<br/>
                <div class="row col s4 left-align">
				<a class="btn waves-effect waves-light" href="cadastrarProfessor.php">Voltar</a></div> 
				</div>
				<?php else:?>

                <script type='text/javascript'>alert('Não há registro de Professores no banco de dados!');location.href='cadastrarProfessor.php';</script>
				
				<?php endif?>
			<?php endif;?>
			<?php mysqli_close($conn); ?>
			
				</div>
			</div>
<?php require_once 'includes/rodapecss.php'; ?>