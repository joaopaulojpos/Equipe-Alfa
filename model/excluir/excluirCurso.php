<?php
require_once '../conexao.php';

if(isset($_GET['codigoCurso'])){
$codigoCurso = $_GET['codigoCurso'];

$sql = "DELETE FROM curso WHERE codigoCurso = '$codigoCurso'";
$query = mysqli_query($conn,$sql) or die("Não foi possível remover o registro! " . mysqli_error($conn));

	echo "<script type='text/javascript'>alert('Registro removido com sucesso!');location.href='../../view/listarCurso.php';</script>";

mysqli_close($conn);
}
?>
