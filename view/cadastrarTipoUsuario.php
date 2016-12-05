<?php require_once 'includes/cabecalhocss.php'; ?>

<body class="#37474f blue-grey darken-3">

<div class="valign-wrapper container row formulario">
    <div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
        <h2><b>Cadastrar Tipo</b></h2>

        <form method="POST" action="../model/cadastrar/cadastrarTipoUsuario.php">

        <div class="row input-field col s6 left-align">
        <input id="codigoTipoUsuario" type="number" min="1" max="3" name="codigoTipoUsuario" class="validate">
        <label for="codigoTipoUsuario">Código</label>
        </div>

        <div class="row input-field col s6 left-align">
            <select name="descricaoTipoUsuario">
                <option value="">Tipo Usuário:</option>
                <option value="administrador">Administrador</option>
                <option value="professor">Professor</option>
                <option value="aluno">Aluno</option>
            </select>
        </div>


        <div class="row col s4 left-align btnform">
        <button class="btn waves-effect waves-ligth" type="submit" name="cadastrar">
         Cadastrar  
        </button>
        </div>

        <div class="row col s4 center-align">
        <a class="btn waves-effect waves-light" href="listarTipoUsuario.php">Listar</a>
        </div>

        <div class="row col s4 rigth-align">
        <a class="btn waves-effect waves-light" href="cadastrarUsuario.php">Voltar</a>
        </div>

        <br>
        </form>
    </div>
</div>

<?php require_once 'includes/rodapecss.php'; ?>