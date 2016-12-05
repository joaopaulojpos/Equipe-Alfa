<?php

require_once '../conexao.php';

$codigoSala = $_GET['codigoSala'];

$sql = "DELETE FROM sala WHERE codigoSala = $codigoSala";
$query = mysqli_query($conn, $sql) or die(" Falha ao excluir a sala. Erro: " . $mysqli_error($conn));

echo "<script type='text/javascript'>alert('Sala excluída com sucesso!');location.href='../../view/listarSala.php';</script>";

mysqli_close($conn);
?>
