<?php
require_once '../conexao.php';

if(isset($_GET['codigoFalta'])){
$codigoFalta = $_GET['codigoFalta'];

$sql = "DELETE FROM falta WHERE codigoFalta = '$codigoFalta'";
$query = mysqli_query($conn,$sql) or die("Não foi possível remover o registro! " . mysqli_error($conn));

	echo "<script type='text/javascript'>alert('Registro removido com sucesso!');location.href='../../view/listarFaltas.php';</script>";

mysqli_close($conn);
}
?>