<?php require_once 'includes/cabecalhocss.php'; ?>

	<body class="#37474f blue-grey darken-3">	
		<div class="valign-wrapper container row formulario">
			<div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
				<h2>Início Professor</h2>
				<ul>								
				<div class="row input-field col s12 left-align"/>
					<li><a href="cadastrarFalta.php">=> Inserir falta</a></li>
				</div>				

				<div class="row input-field col s12 left-align"/>
					<li><a href="cadastrarNota.php">=> Cadastrar nota</a></li>
				</div>			

				<div class="row input-field col s12 left-align"/>
					<li><a href="cadastrarNotaNumero.php">=> Inserir nota número</a></li>
				</div>				

				<div class="row input-field col s12 left-align"/>
					<li><a href="cadastrarNotaConceito.php">=> Inserir nota conceito</a></li>
				</div>				
				
				</ul>
				
				<div class="row col s4 left-align">
				<button class="btn waves-effect waves-ligth" type="button" class="botao" onclick=location.href="index.php">Sair</button>
				</div>
			</div>
		</div>
		
<?php require_once 'includes/rodapecss.php'; ?>