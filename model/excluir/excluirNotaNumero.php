<?php
require_once '../conexao.php';

if(isset($_GET['matriculaAluno'])){
$matriculaAluno = $_GET['matriculaAluno'];

$sql = "DELETE FROM notaNumero WHERE matriculaAluno = '$matriculaAluno'";
$query = mysqli_query($conn,$sql) or die("Não foi possível remover o registro! " . mysqli_error($conn));

	echo "<script type='text/javascript'>alert('Registro removido com sucesso!');location.href='../../view/listarNotaNumero.php';</script>";

mysqli_close($conn);
}
?>