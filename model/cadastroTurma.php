<?php

require_once "conexao.php";

if (isset($_POST['codigoturma'])) {
    $codigoturma = $_POST['codigoturma'];
    $ano = date('Y,m,d', strtotime($_POST['ano']));
    $turno = $_POST['turno'];
    $codigoperiodo = $_POST['codigoperiodo'];
    
    if($conn -> connect_error){
		return die("Conexão falhou!" . $conn -> connect_error);
	}
$sql = "INSERT INTO turma (CODIGOTURMA, ANO, TURNO, CODIGOPERIODO)
	VALUES ($codigoturma, '$ano', '$turno', $codigoperiodo);";

	if ($conn->query($sql) === TRUE) {
		echo "Registro Salvo";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();

 
}