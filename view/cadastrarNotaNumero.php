<?php require_once 'includes/cabecalhocss.php'; ?>
	<body class="#37474f blue-grey darken-3">	
		<div class="valign-wrapper container row formulario">
			<div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
				<h2>Nota Número</h2>
				<form method="post" action="../model/cadastrar/cadastrarNotaNumero.php">
					
					<div class="row input-field col s12 left-align"/>
						<input type="text" id="matriculaAluno" name="matriculaAluno"/>
						<label>Matricula:</label>
					</div>

					<div class="row input-field col s12 left-align"/>
						<input type="text" id="nota1" name="nota1"/>
						<label>Nota1:</label>
					</div>
					<div class="row input-field col s12 left-align"/>
						<input type="text" id="nota2" name="nota2"/>
						<label>Nota2:</label>
					</div>
					<div class="row col s4 left-align btnform">
						<input class="btn waves-effect waves-ligth" type="submit" value="Inserir" name="inserir" />
					</div>
					<div class="row col s4 left-align">
						<input class="btn waves-effect waves-ligth" type="button" value="Voltar" name="voltar" onclick="location.href='inicioProfessor.php'"/>
					</div>
				</form>
			</div>
		</div>
<?php require_once 'includes/rodapecss.php'; ?>