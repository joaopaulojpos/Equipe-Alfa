<?php require_once 'includes/cabecalhocss.php'; ?>

	<body class="#37474f blue-grey darken-3">	
		<div class="valign-wrapper container row formulario">
			<div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">				
				
				<h2>Início Professor</h2>
				<ul class="collection with-header">
       			    <li class="collection-item left-align"><div><span class="teal-text text-lighten-1">Inserir faltas</span><a href="cadastrarFalta.php" class="secondary-content"><i class="material-icons left-align">send</i></a></div></li>
        			<li class="collection-item left-align"><div><span class="teal-text text-lighten-1">Cadastrar notas</span><a href="cadastrarNota.php" class="secondary-content"><i class="material-icons">send</i></a></div></li>
        			<li class="collection-item left-align"><div><span class="teal-text text-lighten-1">Inserir notas</span><a href="cadastrarNotaNumero.php" class="secondary-content"><i class="material-icons">send</i></a></div></li>
        			<li class="collection-item left-align"><div><span class="teal-text text-lighten-1">Inserir conceitos</span><a href="cadastrarNotaConceito.php" class="secondary-content"><i class="material-icons">send</i></a></div></li>
      			</ul>				
				<div class="row col s4 left-align">
				<button class="btn waves-effect waves-ligth" type="button" class="botao" onclick=location.href="index.php">Sair</button>
				</div>
			</div>
		</div>
		
<?php require_once 'includes/rodapecss.php'; ?>