<?php

require_once '../conexao.php';

    $codigoProfessor = $_POST['codigoProfessor'];
    $telefone = $_POST['telefone'];
    $nome = $_POST['nomeProfessor'];


    $sql = "UPDATE professor SET codigoProfessor = '$codigoProfessor', nome = '$nome', telefone = '$telefone'"
            . "WHERE codigoProfessor = '$codigoProfessor'";
    $query = mysqli_query($conn, $sql) or die("Não foi possível alterar os dados " . mysqli_error($conn));


    echo "<script type='text/javascript'>alert('Dados alterados com sucesso!');location.href='../../view/listarProfessor.php';</script>";

    mysqli_close($conn);

?>
