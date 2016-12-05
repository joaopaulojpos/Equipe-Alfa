<?php
require_once '../conexao.php';

if(isset($_GET['codigoNota'])){
$codigoNota = $_GET['codigoNota'];

$sql = "DELETE FROM nota WHERE codigoNota = '$codigoNota'";
$query = mysqli_query($conn,$sql) or die("Não foi possível remover o registro! " . mysqli_error($conn));

	echo "<script type='text/javascript'>alert('Registro removido com sucesso!');location.href='../../view/listarNota.php';</script>";

mysqli_close($conn);
}
?>