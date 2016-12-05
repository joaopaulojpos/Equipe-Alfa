<?php
	
	$servidor = "localhost";
	$usuario  = "devmaster";
	$senha    = "dev2016";
	$banco    = "faculdade";

        /*
         * Conexão com o banco de dados  pelo método MYSQLI
         */
	$conn = mysqli_connect($servidor, $usuario, $senha, $banco) or die("Falha na conexão com o BD: " . mysqli_connect_error());;
