<?php require_once '../view/includes/cabecalhocss.php'; ?>

	<body class="#37474f blue-grey darken-3">

		<div class="valign-wrapper container row formulario">
			<div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
			<h2>Verificar Notas</h2>
			<form method="post" action="../model/verificarNota.php">				

				<div class="row input-field col s12 left-align">
					<input type="text" name="matriculaAluno" class="validate" />
					<label>Matrícula Aluno: </label>
				</div>				
				<div class="row col s4 left-align btnform">
        			<button class="btn waves-effect waves-ligth" type="submit" name="enviar">Enviar</button>
        		</div>
        		     		
        		<div class="row col s4 left-align">
        			<button class="btn waves-effect waves-ligth" type="button" name="voltar" onclick="location.href='inicioAluno.php'">Voltar</button>
        		</div>
			</form>
			</div>
		</div>
<?php require_once 'includes/rodapecss.php'; ?>