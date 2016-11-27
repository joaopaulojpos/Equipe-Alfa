<?php

require_once '../conexao.php';

$codigoTipoUsuario = $_GET['codigoTipoUsuario'];

$sql = "DELETE FROM tipoUsuario WHERE codigoTipoUsuario = '$codigoTipoUsuario'";
$query = mysqli_query($conn, $sql) or die("Não foi possível excluir este registro " . mysqli_error($conn));

if ($query) {
    echo "<script type='text/javascript'>alert('Dados excluídos com sucesso!');location.href='../../view/listarTipoUsuario.php';</script>";
} else {
    echo "<script type='text/javascript'>alert('Não foi possível excluir este registro');location.href='../../view/listaTipoUsuario.php';</script>";
}
mysqli_close($conn);
?>
