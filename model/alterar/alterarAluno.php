<?php

require_once '../conexao.php';

if (isset($_POST['matriculaAluno'])) {
    $matriculaAluno = $_POST['matriculaAluno'];
    $dataNascimento = date('Y/m/d', strtotime($_POST['dataNascimento']));
    $nomeAluno = $_POST['nomeAluno'];
    $sexoAluno = $_POST['sexoAluno'];
    $telefone = $_POST['telefone'];

    $sql = "UPDATE aluno SET dataNascimento = '$dataNascimento', nomeAluno = '$nomeAluno', sexoAluno = '$sexoAluno', telefone = '$telefone' WHERE matriculaAluno = '$matriculaAluno'";
    $query = mysqli_query($conn, $sql) or die("Falha ao atualizar dados do aluno. Erro: " . mysqli_error($conn));   

    mysqli_close($conn);
	
	echo "<script type='text/javascript'>alert('Dados alterados com sucesso!');location.href='../../view/listarAluno.php';</script>";
}
?>