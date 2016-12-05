<?php require_once '../view/includes/cabecalhocss.php'; ?>

	<body class="#37474f blue-grey darken-3">

		<div class="valign-wrapper container row formulario">
			<div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
			<h2>Cadastrar Período</h2>
			<form method="post" action="../model/cadastrar/cadastrarPeriodo.php">				

				<div class="row input-field col s6 left-align">
					<input type="number" min="1" max="10" name="numeroPeriodo" class="validate" />
					<label for="numeroPeriodo">Período:</label>
				</div>

				<div class="row input-field col s6 left-align">
					<input type="number" min="1"  name="codigoCurso" class="validate" />
					<label for="codigoCurso">Código Curso:</label>
				</div>

				<div class="row col s4 left-align btnform">
        			<button class="btn waves-effect waves-ligth" type="submit" name="cadastrar">Cadastrar</button>
        		</div>
        		<div class="row col s4 center-align">
        			<button class="btn waves-effect waves-ligth" type="button" name="listar" onclick="location.href='listarPeriodo.php'">Listar</button>
        		</div>        		
        		<div class="row col s4 left-align">
        			<button class="btn waves-effect waves-ligth" type="button" name="voltar" onclick="location.href='inicioAdministrador.php'">Voltar</button>
        		</div>
			</form>
			</div>
		</div>
<?php require_once 'includes/rodapecss.php'; ?>