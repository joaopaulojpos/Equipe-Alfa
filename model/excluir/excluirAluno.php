<?php

require_once '../conexao.php';

$matriculaAluno = $_GET['matriculaAluno'];

$sql = "DELETE FROM aluno WHERE matriculaAluno = '$matriculaAluno'";
$query = mysqli_query($conn, $sql) or die("Falha ao excluir o aluno. Erro: " . $mysqli_error($conn));

echo "<script type='text/javascript'>alert('Aluno excluído com sucesso!');location.href='../../view/listarAluno.php';</script>";

mysqli_close($conn);
?>