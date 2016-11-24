<?php
require_once 'conexao.php';

$sql = "SELECT codigoPeriodo, tipoEnsino FROM periodo ORDER BY codigoPeriodo";
$query = mysqli_query($conn,$sql) or die("Falha ao listar os dados! " . mysqli_error());

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Lista de Períodos</title>
		<link rel="stylesheet" href="estilo.css">
	</head>
	<body>
		<table border="1">
			<legend id="lgdlist"><b>Lista de Períodos</b></legend>
				<tr>
					<th><b>Código Período</b></th>
					<th><b>Tipo Ensino</b></th>
					<th><b>Ações:</b></th>
				</tr>	
			<?php while($linha = mysqli_fetch_assoc($query)):?>						
				<tr>
					<td><?php echo $linha['codigoPeriodo'] ?></td>
					<td><?php echo $linha['tipoEnsino'] ?></td>
					<td><a href="excluirPeriodo.php?codigoPeriodo=<?php echo $linha['codigoPeriodo']?>"><input type="image" src="imagem/lixeira1.png" width="25" heigth="25"/></a>
						<a href="editarPeriodo.php?codigoPeriodo=<?php echo $linha['codigoPeriodo']?>"><input type="image" src="imagem/editar.png" width="25" heigth="25"/></a></td>
				</tr>
			<?php endwhile; 
			mysqli_close($conn);?>		
		</table>
		<br/><br/>	
		<a href="cadastrarPeriodo.html"><button>Cadastro</button></a>
	</body>
</html>
