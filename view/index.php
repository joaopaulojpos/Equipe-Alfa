<?php require_once 'includes/cabecalhocss.php'; ?>

<body class="#37474f blue-grey darken-3 login">

<div class="valign-wrapper container row">
	<div class="col s6 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
	<img class="responsive-img" src="../img/logo.png" style="max-width: 150px;">

		<form method="POST" action="../model/login.php" id="formlogin">

	    <div class="row input-field col s12 left-align">
        <input id="usuarioLogin" type="email" name="usuarioLogin" class="validate">
        <label for="usuarioLogin">Email</label>
        </div>

        <div class="row input-field col s12 left-align">
        <input id="senha" type="password" name="senha" class="validate">
        <label for="senha">Senha</label>
        </div>

        <div class="center-align btnform">
        <button class="btn waves-effect waves-ligth" type="submit" name="entrar">
    	 Entrar	
        </button>

        <a class="btn waves-effect waves-light" href="../view/cadastroUsuario.html">Cadastre - Se</a>

        </div>
        <br>
        </form>
	</div>
</div>
<?php require_once 'includes/rodapecss.php'; ?>