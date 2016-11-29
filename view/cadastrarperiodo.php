<?php require_once 'includes/cabecalhocss.php'; ?>

<body class="#37474f blue-grey darken-3">

<div class="valign-wrapper container row formulario">
    <div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
        <h2><b>Cadastrar Periodo</b></h2>

        <form method="POST" action="../model/cadastrar/cadastroPeriodo.php">

        <div class="row input-field col s6 left-align">
        <input id="codigoPeriodo" type="number" min="1" max="10" name="codigoPeriodo" class="validate">
        <label for="codigoPeriodo">Codigo</label>
        </div>

        <div class="row input-field col s6 left-align">
            <input type="text" id="tipoEnsino" name="tipoEnsino">
            <label for="tipoEnsino">Descrição Periodo</label>
        </div>


        <div class="row col s4 left-align btnform">
        <button class="btn waves-effect waves-ligth" type="submit" name="cadastrar">
         Cadastrar  
        </button>
        </div>

        <div class="row col s4 center-align">
        <a class="btn waves-effect waves-light" href="listarPeriodo.php">Listar</a>
        </div>

        <div class="row col s4 rigth-align">
        <a class="btn waves-effect waves-light" href="inicioAdministrador.php">Voltar</a>
        </div>

        <br>
        </form>
    </div>
</div>

<?php require_once 'includes/rodapecss.php'; ?>