<?php
	require_once 'conexao.php';

	if(isset($_GET['codigoPeriodo'])){
	$codigoPeriodo = $_GET['codigoPeriodo'];

	$sql = "SELECT codigoPeriodo, tipoEnsino FROM periodo WHERE codigoPeriodo = '$codigoPeriodo'";
	$query = mysqli_query($conn,$sql) or die("Não foi possível selecionar o registro!" . mysqli_error($conn));


	while($linha = mysqli_fetch_assoc($query)){
	$codigoPeriodo = $linha['codigoPeriodo'];
	$tipoEnsino = $linha['tipoEnsino'];
	}
}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Editar Período</title>
		<link rel="stylesheet" href="estilo.css">
	</head>
	<body>
		<div>
			<form method="post" action="alterarPeriodo.php">
				<fieldset>
				<legend id="lgdcad">Cadastro de Períodos</legend>
				<label>Código Período: </label><br/><input type="text" id=codigoPeriodo name="codigoPeriodo" value="<?php echo $codigoPeriodo; ?>"><br/><br/>
				<label>Tipo Ensino: </label><br/><input type="text" id="tipoEnsino" name="tipoEnsino" value="<?php echo $tipoEnsino; ?>" /><br/><br/>
				<input type="submit" value="Alterar"/>
				<input type="button" value="Lista" onclick="location.href='listarPeriodo.php'"/>
				</fieldset>
			</form>
		</div>
	</body>
</html>
