<?php

require_once 'conexao.php';

$codigoProfessor = $_GET['codigoProfessor'];

$sql = "DELETE FROM professor WHERE codigoprofessor = '$codigoProfessor'";
$query = mysqli_query($conn, $sql) or die("Não foi possível excluir este registro " . mysqli_error($conn));

if ($query) {
    echo "<script type='text/javascript'>alert('Dados excluídos com sucesso!');location.href='listarProfessor.php';</script>";
} else {
    echo "<script type='text/javascript'>alert('Não foi possível excluir este registro');location.href='listarProfessor.php';</script>";
}
mysqli_close($conn);
?>
