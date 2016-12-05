<?php

require_once '../conexao.php';

if (isset($_POST['codigoSala'])) {
    $codigoSala = $_POST['codigoSala'];
    $descricaoSala = $_POST['descricaoSala'];
    $capacidade = $_POST['capacidade'];
    

    $sql = "UPDATE sala SET  descricaoSala = '$descricaoSala', capacidade = '$capacidade'  WHERE codigoSala = '$codigoSala'";
    $query = mysqli_query($conn, $sql) or die("Falha ao atualizar dados da sala. Erro: " . mysqli_error($conn));   

    mysqli_close($conn);
	
	echo "<script type='text/javascript'>alert('Dados alterados com sucesso!');location.href='../../view/listarSala.php';</script>";
}
?>
