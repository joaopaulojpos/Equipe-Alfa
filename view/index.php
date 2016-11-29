<?php require_once 'includes/cabecalhocss.php'; ?>

<body class="#37474f blue-grey darken-3 login">

<div class="valign-wrapper container row">
	<div class="col s6 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
	<img class="responsive-img" src="../img/logo.png" style="max-width: 150px;">

		<form method="POST" action="../model/login.php" id="formlogin">

	    <div class="row input-field col s12 left-align">
        <input id="usuarioLogin" type="text" name="usuarioLogin" class="validate">
        <label for="usuarioLogin">Login</label>
        </div>

        <div class="row input-field col s12 left-align">
        <input id="senha" type="password" name="senha" class="validate">
        <label for="senha">Senha</label>
        </div>

        <div class="row col s4 left-align btn-form">
        <button class="btn waves-effect waves-ligth" type="submit" name="entrar" onclick="location.href='../model/inicio.php'">
    	 Entrar</button>
		</div>
		
        <div class="row col s6 left-align">
		<button class="btn waves-effect waves-light" type="button"	name="cadastrese"	onclick="location.href='cadastrarUsuario.php'">Cadastre - Se</button>
        </div>      
        </form>
	</div>
</div>
<?php require_once 'includes/rodapecss.php'; ?>