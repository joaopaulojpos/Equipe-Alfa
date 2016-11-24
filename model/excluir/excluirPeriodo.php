<?php
require_once 'conexao.php';

if(isset($_GET['codigoPeriodo'])){
$codigoPeriodo = $_GET['codigoPeriodo'];

$sql = "DELETE FROM periodo WHERE codigoPeriodo = '$codigoPeriodo'";
$query = mysqli_query($conn,$sql) or die("Não foi possível remover o registro! " . mysqli_error($conn));

	echo "<script type='text/javascript'>alert('Registro removido com sucesso!');location.href='listarPeriodo.php';</script>";

mysqli_close($conn);
}
?>
