<?php require_once 'includes/cabecalhocss.php'; ?>

<body class="#37474f blue-grey darken-3">

<div class="valign-wrapper container row formulario">
    <div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
        <h2><b>Cadastrar Disciplinas</b></h2>

        <form method="POST" action="../model/cadastrar/cadastrarGrade.php">

        <div class="row input-field col s12 left-align">
            <input type="text" name="nomeDisciplina">
            <label for="nomeDisciplina">Nome da Disciplina</label>
        </div>

        <div class="row col s4 left-align btnform">
        <button class="btn waves-effect waves-ligth" type="submit" name="cadastrar">
        Cadastrar
        </button>
        </div>

        <div class="row col s4 center-align">
       <button class="btn waves-effect waves-ligth" type="button" name="listar" onclick="location.href='listarDisciplina.php'">
        Listar</button>
        </div>

        <div class="row col s4 left-align">
        <button class="btn waves-effect waves-ligth" type="button" name="voltar" onclick="location.href='inicioAdministrador.php'">
        Voltar</button>
        </div>
        <br>
        </form>
    </div>
</div>

<?php require_once 'includes/rodapecss.php'; ?>