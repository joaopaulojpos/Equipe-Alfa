<?php require_once 'includes/cabecalhocss.php'; ?>

<body class="#37474f blue-grey darken-3">

<div class="valign-wrapper container row formulario">
    <div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
        <h2><b>Cadastrar Professor</b></h2>

        <form method="POST" action="../model/cadastrar/cadastrarProfessor.php">    

        <div class="row input-field col s12 left-align">
            <input type="text" name="nome">
            <label for="nome">Nome:</label>
        </div>       

        <div class="row input-field col s6 left-align">
            <input type="tel" name="telefone">
            <label for="telefone">Telefone:</label>
        </div>

        <div class="row input-field col s6 left-align">
            <input type="number" min="1" name="codigoDisciplina">
            <label for="codigoDisciplina">Disciplina:</label>
        </div>          

        <div class="row col s4 left-align btnform">
        <button class="btn waves-effect waves-ligth" type="submit" name="entrar">
         Cadastrar  
        </button>
        </div>

        <div class="row col s4 center-align">
        <a class="btn waves-effect waves-light" href="listarProfessor.php">Listar</a>
        </div>

        <div class="row col s4 rigth-align">
        <a class="btn waves-effect waves-light" href="inicioAdministrador.php">Voltar</a>
        </div>

        <br>
        </form>
    </div>
</div>

<?php require_once 'includes/rodapecss.php'; ?>