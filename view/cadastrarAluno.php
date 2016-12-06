<?php require_once '../view/includes/cabecalhocss.php'; ?>

<body class="#37474f blue-grey darken-3">

<div class="valign-wrapper container row formulario">
	<div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
	    <h2>Cadastrar Aluno</h2>

		<form method="POST" action="../model/cadastrar/cadastrarAluno.php">

	    <div class="row input-field col s12 left-align">
            <input type="text" name="nomeAluno">
            <label for="nomeAluno">Nome:</label>
        </div>

        <div class="row input-field col s6 left-align">
        <input type="text" name="matriculaAluno" class="validate">
        <label for="matriculaAluno">Matrícula:</label>
        </div>

        <div class="row input-field col s6 left-align">
        <input type="date" name="dataNascimento" class="datepicker">
        <label for="dataNascimento">Data Nascimento:</label>
        </div>

        <div class="row input-field col s6 left-align">
            <select name="sexoAluno">
                <option value="" selected="selected">Sexo:</option>
                <option value="F">Feminino</option>
                <option value="M">Masculino</option>
            </select>
        </div>

        <div class="row input-field col s6 left-align">
            <input type="tel" name="telefone">
            <label for="telefone">Telefone:</label>
        </div>

        <div class="row col s4 left-align btnform">
        <button class="btn waves-effect waves-ligth" type="submit" name="cadastrar">
    	 Cadastrar	
        </button>
        </div>

        <div class="row col s4 center-align">
        <button class="btn waves-effect waves-light" type="button" name="listar" onclick="location.href='listarAluno.php'">Listar</button>
        </div>

        <div class="row col s4 rigth-align">
        <button class="btn waves-effect waves-light" type="button" name="voltar" onclick="location.href='inicioAdministrador.php'">Voltar</button>
        </div>
        <br>
        </form>
	</div>
</div>

<?php require_once 'includes/rodapecss.php'; ?>