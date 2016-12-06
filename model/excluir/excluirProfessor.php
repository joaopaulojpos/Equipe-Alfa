<?php

require_once '../conexao.php';

$codigoProfessor = $_GET['codigoProfessor'];

$sql = "DELETE FROM professor WHERE codigoprofessor = '$codigoProfessor'";
$query = mysqli_query($conn, $sql) or die("Não foi possível excluir este registro " . mysqli_error($conn));
$codigo = mysqli_insert_id($conn);


if ($query) {

$sql1 = "DELETE FROM disciplinaTurma  WHERE codigoprofessor = '$codigo'";
$query1 = mysqli_query($conn, $sql1) or die("Erro: " . mysqli_error($conn));

$sql2 = "DELETE FROM professorDisciplina WHERE codigoprofessor = '$codigo'";
$query2 = mysqli_query($conn, $sql2) or die("Erro: " . mysqli_error($conn));

    echo "<script type='text/javascript'>alert('Dados excluídos com sucesso!');location.href='../../view/listarProfessor.php';</script>";
    
} else {
    echo "<script type='text/javascript'>alert('Não foi possível excluir este registro');location.href='../../view/listarProfessor.php';</script>";
}
mysqli_close($conn);
?>
