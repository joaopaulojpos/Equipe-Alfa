<?php require_once 'includes/cabecalhocss.php'; ?>
	<body class="#37474f blue-grey darken-3">	
		<div class="valign-wrapper container row formulario">
			<div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
				<h2>Nota Número</h2>
				<form method="post" action="../model/cadastrar/cadastrarNotaNumero.php">
					
					<div class="row input-field col s12 left-align"/>
						<input type="number" name="codigoNota"/>
						<label for="codigoNota">Código Nota:</label>
					</div>

					<div class="row input-field col s12 left-align"/>
						<input type="text" name="nota1"/>
						<label for="nota1">Nota1:</label>
					</div>
					<div class="row input-field col s12 left-align"/>
						<input type="text" name="nota2"/>
						<label for="nota2">Nota2:</label>
					</div>
					<div class="row col s4 left-align btnform">
						<input class="btn waves-effect waves-ligth" type="submit" value="Inserir" name="inserir" />
					</div>
					<div class="row col s4 left-align">
						<input class="btn waves-effect waves-ligth" type="button" value="Listar" name="listar" onclick="location.href='listarNotaNumero.php'"/>
					</div>					
					<div class="row col s4 left-align">
						<input class="btn waves-effect waves-ligth" type="button" value="Voltar" name="voltar" onclick="location.href='inicioProfessor.php'"/>
					</div>
				</form>
			</div>
		</div>
<?php require_once 'includes/rodapecss.php'; ?>