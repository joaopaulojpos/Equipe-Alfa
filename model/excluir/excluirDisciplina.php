<?php
require_once '../conexao.php';

if(isset($_GET['codigoDisciplina'])){
$codigoDisciplina = $_GET['codigoDisciplina'];

$sql = "DELETE FROM disciplina WHERE codigoDisciplina = '$codigoDisciplina'";
$query = mysqli_query($conn,$sql) or die("Não foi possível remover o registro! " . mysqli_error($conn));

if($query){

$sql2 = "DELETE FROM disciplinaTurma WHERE codigoDisciplina = '$codigoDisciplina'";
$query2 = mysqli_query($conn,$sql2) or die("Erro: " . mysqli_error($conn));

$sql3 = "DELETE FROM professorDisciplina WHERE codigoDisciplina = '$codigoDisciplina'";
$query3 = mysqli_query($conn,$sql3) or die("Erro: " . mysqli_error($conn));

echo "<script type='text/javascript'>alert('Disciplina excluída com sucesso!');location.href='../../view/listarDisciplina.php';</script>"

}else{

	echo "<script type='text/javascript'>alert('Não foi possível excluir a disciplina!');location.href='../../view/listarDisciplina.php';</script>";
}
mysqli_close($conn);
}
?>