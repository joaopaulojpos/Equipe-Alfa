<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CADDisc</title>
</head>

<body>

	<?php
	
		$host='faculdade';
		$bd='prova';
		$user='root';
		$senhabd='';
		
		$nome=$_POST["nome"];
		
		
		
		
		$conexao = mysql_connect($host,$user,$senhabd,$bd);
		if(!$conexao) die ("Erro de conexão faculdade, erro: ".mysql_error());
				
		$banco= mysql_select_db($bd,$conexao);
		if(!$banco) die ("Erro de conexão com o banco de dados. Erro: ".mysql_error());
		
		$query = "INSERT INTO disciplina(nome) values ('$nome');";		
		mysql_query($query,$conexao);
		
		echo "Seu cadastro foi realizado com sucesso!";

	
	?>


</body>
</html>