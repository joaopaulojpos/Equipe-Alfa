<?php
	
	//$servidor = "localhost";
	//$usuario  = "root";
	//$senha    = "12345";
	//$banco    = "faculdade";

	$conn = mysqli_connect($servidor, $usuario, $senha, $banco) or die("Falha na conexão com o BD: " . mysqli_connect_error());;
