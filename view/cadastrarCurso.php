<?php require_once 'includes/cabecalhocss.php'; ?>

<body class="#37474f blue-grey darken-3">

<div class="valign-wrapper container row formulario">
    <div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
        <h2><b>Cadastrar Curso</b></h2>

        <form method="POST" action="../model/cadastrar/cadastrarCurso.php">

        <div class="row input-field col s12 left-align">
        <input type="text" name="nomeCurso" class="validate">
        <label for="nomeCurso">Nome:</label>
        </div>

        <div class="row input-field col s6 left-align">
            <select name="tipoEnsino">
                <option value="" selected="selected">Tipo Ensino:</option>
                <option value="superior">Superior</option>
                <option value="tecnologo">Tecnólogo</option>
                <option value="tecnico">Técnico</option>
            </select>            
        </div>

        <div class="row input-field col s6 left-align">
        <input type="number" min="1" max="10" name="duracao" class="validate">
        <label for="duracao">Duração:</label>
        </div>


        <div class="row col s4 left-align btnform">
        <button class="btn waves-effect waves-ligth" type="submit" name="cadastrar">
         Cadastrar  
        </button>
        </div>

        <div class="row col s4 center-align">
        <button class="btn waves-effect waves-ligth" type="button" name="listar" onclick="location.href='listarCurso.php'">
         Listar 
        </button>
        </div>

        <div class="row col s4 rigth-align">
        <button class="btn waves-effect waves-ligth" type="button" name="cadastrar" onclick="location.href='inicioAdministrador.php'">
         Voltar  
        </button>
        </div>
        <br>
        </form>
    </div>
</div>

<?php require_once 'includes/rodapecss.php'; ?>