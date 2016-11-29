<?php
require_once '../conexao.php';

if(isset($_GET['codigoTurma'])){
$codigoTurma = $_GET['codigoTurma'];

$sql = "DELETE FROM turma WHERE codigoTurma = '$codigoTurma'";
$query = mysqli_query($conn,$sql) or die("Não foi possível remover o registro! " . mysqli_error($conn));

	echo "<script type='text/javascript'>alert('Registro removido com sucesso!');location.href='../../view/listarTurma.php';</script>";

mysqli_close($conn);
}
?>
