<?php require_once '../view/includes/cabecalhocss.php'; ?>

	<body class="#37474f blue-grey darken-3">

		<div class="valign-wrapper container row formulario">
			<div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
			<h2>Inserir Nota</h2>
			<form method="post" action="../model/cadastrar/cadastrarNota.php">				

				<div class="row input-field col s12 left-align">
					<input type="number" id="matriculaAluno" name="matriculaAluno" class="validate" />
					<label>Matrícula Aluno: </label>
				</div>

				<div class="row input-field col s6 left-align">
					<input type="text" id="recuperacao" name="recuperacao"/>
					<label>Nota Recuperação: </label>
				</div>

				<div class="row input-field col s6 left-align">
					<input type="text" id="final" name="final"/>
					<label>Nota Final: </label>
				</div>

				<div class="row input-field col s6 left-align">
					<select name="tipoNota">
						<option value="" selected="selected">Tipo Nota:</option>						
						<option value="conceito">Conceito</option>
						<option value="numero">Número</option>						
					</select>
				</div>

				<div class="row input-field col s6 left-align">
					<select name="situacao">
						<option value="" selected="selected">Situacão:</option>						
						<option value="aprovado">Aprovado</option>
						<option value="reprovado">Reprovado</option>
						<option value="matriculado">Matriculado</option>
					</select>
				</div>
				<div class="row col s4 left-align btnform">
        			<button class="btn waves-effect waves-ligth" type="submit" name="cadastrar">Cadastrar</button>
        		</div>
        		<div class="row col s4 left-align">
        			<button class="btn waves-effect waves-ligth" type="button" name="voltar" onclick="location.href='inicioProfessor.php'">Voltar</button>
        		</div>
			</form>
			</div>
		</div>
<?php require_once 'includes/rodapecss.php'; ?>