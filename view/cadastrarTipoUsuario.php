<?php require_once 'includes/cabecalhocss.php'; ?>

<body class="#37474f blue-grey darken-3">

<div class="valign-wrapper container row formulario">
    <div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
        <h2><b>Cadastrar Tipo</b></h2>

        <form method="POST" action="../model/cadastrar/cadastroTipoUsuario.php">

        <div class="row input-field col s6 left-align">
        <input id="codigoTipoUsuario" type="number" min="1" max="10" name="codigoTipoUsuario" class="validate">
        <label for="codigoTipoUsuario">Codigo</label>
        </div>

        <div class="row input-field col s6 left-align">
            <input type="text" id="descricaoTipoUsuario" name="descricaoTipoUsuario">
            <label for="descricaoTipoUsuario">Descrição</label>
        </div>


        <div class="row col s4 left-align btnform">
        <button class="btn waves-effect waves-ligth" type="submit" name="cadastrar">
         Cadastrar  
        </button>
        </div>

        <div class="row col s4 center-align">
        <a class="btn waves-effect waves-light" href="../view/listarTipoUsuario.php">Listar</a>
        </div>

        <div class="row col s4 rigth-align">
        <a class="btn waves-effect waves-light" href="../view/inicioAdministrador.html">Voltar</a>
        </div>

        <br>
        </form>
    </div>
</div>

<?php require_once 'includes/rodapecss.php'; ?>