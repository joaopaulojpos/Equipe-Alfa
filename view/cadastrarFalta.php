<?php require_once '../view/includes/cabecalhocss.php'; ?>

<body class="#37474f blue-grey darken-3">
<div class="valign-wrapper container row formulario">
	<div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
		<h2>Cadastrar Faltas</h2>
		<form method="post" action="../model/cadastrar/cadastrarFalta.php">            
			
            <div class="row input-field col s6 left-align">
                <input id="matriculaAluno" type="text" name="matriculaAluno">
                <label for="matriculaAluno">Matrícula:</label>
            </div>
        	<div class="row input-field col s6 left-align">
        		<select name="mes">
        			<option value="">Mês:</option>
        			<option value="janeiro">Janeiro</option>
        			<option value="fevereiro">Fevereiro</option>
        			<option value="marco">Março</option>
        			<option value="abril">Abril</option>
        			<option value="maio">Maio</option>
        			<option value="junho">Junho</option>
        			<option value="julho">Julho</option>
        			<option value="agosto">Agosto</option>
        			<option value="setembro">Setembro</option>
        			<option value="outubro">Outubro</option>
        			<option value="novembro">Novembro</option>
        			<option value="dezembro">Dezembro</option>
        		</select>
        	</div>
        	<div class="row input-field col s6 left-align">
        		<input type="number" min="1" max="30" id="faltas" name="faltas">
        		<label for="faltas">Faltas:</label>        		
        	</div>
        	<div class="row input-field col s6 left-align">
        		<select name="abono">
        			<option value="">Abono:</option>
        			<option value="sim">Sim</option>
        			<option value="nao">Não</option>
        		</select>
        	</div>
        	<div class="row input-field col s12 left-align">
        		<input type="text" id="motivo" name="motivo">
        		<label for="motivo">Motivo:</label>        		
        	</div>
        	<div class="row col s4 left-align btnform">
        		<button class="btn waves-effect waves-ligth" type="submit" name="cadastrar">
    	 		Cadastrar	
        		</button>
        	</div>        	
       	 	<div class="row col s4 left-align">
        		<button class="btn waves-effect waves-light" type="button" name="voltar" onclick="location.href='inicioProfessor.php'">Voltar</button>
       		 </div>
       		 <br/>
		</form>
	</div>
</div>

<?php require_once 'includes/rodapecss.php'; ?>