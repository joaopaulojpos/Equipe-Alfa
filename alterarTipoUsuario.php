<?php

require_once 'conexao.php';

if (isset($_POST['$codigoTipoUsuario'])) {
    $codigoTipoUsuario = $_POST['codigoTipoUsuario'];
    $descricaoTipoUsuario = $_POST['descricaoTipoUsuario'];


    $sql = "UPDATE tipoUsuario SET codigoTipoUsuario = '$codigoTipoUsuario', descricaoTipoUsuario = '$descricaoTipoUsuario'"
            . "WHERE codigoTipoUsuario = '$codigoTipoUsuario'";
    $query = mysqli_query($conn, $sql) or die("Não foi possível alterar os dados " . mysqli_error($conn));


    echo "<script type='text/javascript'>alert('Dados alterados com sucesso!');location.href='listarTipoUsuario.php';</script>";

    mysqli_close($conn);
}
?>
