<?php
require_once '../conexao.php';

if(isset($_GET['codigoDisciplina'])){
$codigoDisciplina = $_GET['codigoDisciplina'];

$sql = "DELETE FROM disciplina WHERE codigoDisciplina = '$codigoDisciplina'";
$query = mysqli_query($conn,$sql) or die("Não foi possível remover o registro! " . mysqli_error($conn));

	echo "<script type='text/javascript'>alert('Registro removido com sucesso!');location.href='../../view/listarDisciplina.php';</script>";

mysqli_close($conn);
}
?>