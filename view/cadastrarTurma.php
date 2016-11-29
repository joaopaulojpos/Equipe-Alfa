<?php require_once 'includes/cabecalhocss.php'; ?>

<body class="#37474f blue-grey darken-3">

<div class="valign-wrapper container row formulario">
    <div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
        <h2><b>Cadastrar Turma</b></h2>

        <form method="POST" action="../model/cadastrar/cadastrarTurma.php">

        <div class="row input-field col s6 left-align">
        <input id="codigoPeriodo" type="number" min="1" max="10" name="codigoPeriodo" class="validate">
        <label for="codigoPeriodo">Código do Período:</label>
        </div>

        <div class="row input-field col s6 left-align">
        <input id="ano" type="number" min="2016" max="2116" name="ano" class="validate">
        <label for="ano">Ano</label>
        </div>

       <div class="row input-field col s12 left-align">
            <select name="turno">
                <option value="">Turno:</option>
                <option value="manha">Manhã</option>
                <option value="tarde">Tarde</option>
                <option value="noite">Noite</option>
            </select>
        </div>

        <div class="row col s4 left-align btnform">
        <button class="btn waves-effect waves-ligth" type="submit" name="cadastrar">
         Cadastrar  
        </button>
        </div>      

        <div class="row col s4 rigth-align">
         <button class="btn waves-effect waves-ligth" type="button" name="voltar" onclick="location.href='inicioAdministrador.php'">Voltar  
        </button>
        </div>
        <br>
        </form>
    </div>
</div>

<?php require_once 'includes/rodapecss.php'; ?>