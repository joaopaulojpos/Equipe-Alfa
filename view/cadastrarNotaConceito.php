<?php require_once 'includes/cabecalhocss.php'; ?>
	
	<body class="#37474f blue-grey darken-3">	
		<div class="valign-wrapper container row formulario">
			<div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
			<h2>Nota Conceito</h2>		
			<form method="post" action="../model/cadastrar/cadastrarNotaConceito.php">
				<div class="row input-field col s12 left-align"/>
					<input type="text" id="matriculaAluno" id="matriculaAluno" name="matriculaAluno">
					<label for="matriculaAluno">Matrícula Aluno:</label>
				</div>
				<div class="row input-field col s6 left-align"/>
					<select name="conceito1">
						<option value="" selected="selected">Conceito1:</option>
						<option value="SFA">SFA</option>
						<option value="SFS">SFS</option>
						<option value="SFO">SFO</option>
					</select>
				</div>
				<div class="row input-field col s6 left-align">
					<select name="conceito2">
						<option value="" selected="selected">Conceito2:</option>
						<option value="SFA">SFA</option>
						<option value="SFS">SFS</option>
						<option value="SFO">SFO</option>
					</select>
				</div>
				<div class="row col s4 left-align btnform">
					<input class="btn waves-effect waves-ligth" type="submit" value="Inserir" name="inserir"/>
				</div>
				<div class="row col s4 left-align">
					<input class="btn waves-effect waves-ligth" type="button" value="Listar" name="listar" onclick="location.href='listarNotaConceito.php'" />
				</div>
				<div class="row col s4 left-align">
					<input class="btn waves-effect waves-ligth" type="button" value="Voltar" name="voltar" onclick="location.href='inicioProfessor.php'" />
				</div>
			</form>
		</div>
	</div>	
<?php require_once 'includes/rodapecss.php'; ?>