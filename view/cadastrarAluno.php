<?php require_once '../view/includes/cabecalhocss.php'; ?>

<body class="#37474f blue-grey darken-3">

<div class="valign-wrapper container row formulario">
	<div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
	    <h2>Cadastrar Aluno</h2>

		<form method="POST" action="../model/cadastrar/cadastroAluno.php">

	    <div class="row input-field col s12 left-align">
            <input type="text" id="nomeAluno" name="nomeAluno">
            <label for="nomeAluno">Nome</label>
        </div>

        <div class="row input-field col s6 left-align">
        <input id="matriculaAluno" type="text" name="matriculaAluno" class="validate">
        <label for="matriculaAluno">Matricula</label>
        </div>

        <div class="row input-field col s6 left-align">
        <input id="dataNascimento" type="date" name="dataNascimento" class="datepicker">
        <label for="dataNascimento">Data Nascimento</label>
        </div>

        <div class="row input-field col s6 left-align">
            <select name="sexoAluno">
                <option value="" selected="selected">Sexo</option>
                <option value="F">Feminino</option>
                <option value="M">Masculino</option>
            </select>
        </div>

        <div class="row input-field col s6 left-align">
            <input type="tel" id="telefone" name="telefone">
            <label for="telefone">Telefone</label>
        </div>

        <div class="row col s4 left-align btnform">
        <button class="btn waves-effect waves-ligth" type="submit" name="entrar">
    	 Cadastrar	
        </button>
        </div>

        <div class="row col s4 center-align">
        <a class="btn waves-effect waves-light" href="listarAluno.php">Listar</a>
        </div>

        <div class="row col s4 rigth-align">
        <a class="btn waves-effect waves-light" href="../view/inicioAdministrador.html">Voltar</a>
        </div>

        <br>
        </form>
	</div>
</div>

<?php require_once 'includes/rodapecss.php'; ?>