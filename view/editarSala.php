<?php
require_once '../model/conexao.php';

if(isset($_GET['codigoSala'])){
$codigoSala = $_GET['codigoSala'];
/*
 * Retornando os dado do banco para os campos do formulário para que possam ser alterados
 */
$sql = "SELECT codigoSala, descricaoSala, capacidade FROM sala WHERE codigoSala = '$codigoSala'";
$query = mysqli_query($conn, $sql) or die("Falha no BD: " . mysqli_error($conn));
$row = mysqli_fetch_assoc($query);
}
?>
<?php require_once '../view/includes/cabecalhocss.php'; ?>
    <body class="#37474f blue-grey darken-3">
        <div class="valign-wrapper container row formulario">
			<div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
				<h2><b>Alterar Sala</b></h2>                
                <form method="post" action="../model/alterar/alterarSala.php">				
					
					
					<input type="hidden" name="codigoSala" value="<?php echo $row['codigoSala'] ?>"/>
					
					<div class="row input-field col s6 left-align">
						<input type="text" name="descricaoSala" value="<?php echo $row['descricaoSala'] ?>"/>					
						<label for="descricaoSala">Descricao: </label>
					</div>					

					<div class="row input-field col s6 left-align">
						<input type="text" name="capacidade" value="<?php echo $row['capacidade'] ?>" />
						<label for="capacidade">Capacidade: </label>
					</div>					
					
					<div class="row col s4 left-align btnform">
					<button class="btn waves-effect waves-ligth" type="submit" name="alterar">
					Alterar
					</button>
					</div>
					<div class="row col s4 center-align">
					<a class="btn waves-effect waves-light" href="listarSala.php">Voltar</a>
					</div>
					<br/>
                </form>
			</div>
        </div>
		<?php require_once 'includes/rodapecss.php'; ?>