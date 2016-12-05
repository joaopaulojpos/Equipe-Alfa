<?php require_once 'includes/cabecalhocss.php'; ?>

<body class="#37474f blue-grey darken-3">

<div class="valign-wrapper container row formulario">
    <div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
        <h2>Cadastro Usuário</h2>

        <form method="POST" action="../model/cadastrar/cadastrarUsuario.php">

        <div class="row input-field col s6 left-align">
        <input id="codigoTipoUsuario" type="number" min="1" max="3" name="codigoTipoUsuario" class="validate">
        <label for="codigoTipoUsuario">Tipo:</label>
        </div>

        <div class="row input-field col s6 left-align">
            <input type="text" id="usuarioLogin" name="usuarioLogin">
            <label for="usuarioLogin">Login:</label>
        </div>

         <div class="row input-field col s6 left-align">
        <input id="senha" type="password" name="senha" class="validate">
        <label for="senha">Senha:</label>
         </div>

        <div class="row input-field col s6 left-align">
        <input id="confirmarSenha" type="password" name="confirmarSenha" class="validate">
        <label for="confirmarSenha">Confirmar:</label>
         </div>

        <div class="row col s4 left-align">
        <button class="btn waves-effect waves-ligth" type="submit" name="entrar">
         Cadastrar  
        </button>
        </div>        
        
        <div class="row col s4 left-align">
        <button class="btn waves-effect waves-light" type="button" onclick="location.href='../view/index.php'"">
        Voltar
        </button>
        </div>
        <br>
        </form>
    </div>
</div>

<?php require_once 'includes/rodapecss.php'; ?>