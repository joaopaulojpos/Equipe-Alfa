<?php

require_once '../conexao.php';

	if(isset($_POST['codigoProfessor'])){
    $codigoProfessor = $_POST['codigoProfessor'];    
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $codigoDisciplina = $_POST['codigoDisciplina'];

    $sql = "SELECT codigoDisciplina FROM disciplina WHERE codigoDisciplina = $codigoDisciplina";
    $query = mysqli_query($conn,$sql) or die("Erro: " . mysqli_error($conn));
    $row = mysqli_fetch_assoc($query);
    $disciplina = $row['codigoDisciplina'];

    if($codigoDisciplina != $disciplina){

    	echo "<script type='text/javascript'>alert('Disciplina não cadastrada.');location.href='../../view/editarProfessor.php';</script>";

    }else{

    $sql1 = "UPDATE professor SET codigoProfessor = '$codigoProfessor', nome = '$nome', telefone = '$telefone', codigoDisciplina = '$codigoDisciplina'"
            . "WHERE codigoProfessor = '$codigoProfessor'";
    $query1 = mysqli_query($conn, $sql1) or die("Não foi possível alterar os dados " . mysqli_error($conn));

}

	if($query1){

	$sql2 = "INSERT INTO disciplinaTurma(codigoProfessor) VALUES ('$codigoProfessor')";
    $query2 = mysqli_query($conn, $sql2) or die("Erro: " . mysqli_error($conn));

    $sql3 = "UPDATE professorDisciplina SET codigoProfessor = '$codigoProfessor' WHERE codigoDisciplina = '$codigoDisciplina'";
    $query3 = mysqli_query($conn, $sql3) or die("Erro: " . mysqli_error($conn));

    echo "<script type='text/javascript'>alert('Dados alterados com sucesso!');location.href='../../view/listarProfessor.php';</script>";

}else{

	echo "<script type='text/javascript'>alert('Não foi possível alterar os dados do professor!');location.href='../../view/listarProfessor.php';</script>";

}

    mysqli_close($conn);
}

?>
