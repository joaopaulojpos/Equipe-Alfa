<?php

require_once "../conexao.php";

if (isset($_POST['cadastrar'])) {
    $numeroPeriodo = $_POST['numeroPeriodo'];
    $codigoCurso = $_POST['codigoCurso'];    

    $sql = "SELECT numeroPeriodo FROM periodo WHERE numeroPeriodo = '$numeroPeriodo'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    $periodo = $row['numeroPeriodo'];

      $sql1 = "SELECT codigoCurso FROM curso WHERE codigoCurso = '$codigoCurso'";
      $query1 = mysqli_query($conn, $sql1);
      $row1 = mysqli_fetch_assoc($query1);      	
      $curso = $row1['codigoCurso'];
      


    if ($numeroPeriodo == "") {

        echo "<script type='text/javascript'>alert('O período deve ser informado.');location.href='../../view/cadastrarPeriodo.php';</script>";
   
    		}else
        	if ($numeroPeriodo == $periodo) {

            	echo "<script type='text/javascript'>alert('O período já está cadastrado.');location.href='../../view/cadastrarPeriodo.php';</script>";
       		 } else
       		 if ($codigoCurso == "") {

           	 echo "<script type='text/javascript'>alert('Informe o código do curso.');location.href='../../view/cadastrarPeriodo.php';</script>";
       		 } else
                if($codigoCurso != $curso) {

                   echo "<script type='text/javascript'>alert('O curso informado não está cadastrado.');location.href='../../view/cadastrarPeriodo.php';</script>";
                 }else{

            $sql2 = "INSERT INTO periodo(numeroPeriodo, codigoCurso) VALUES('$numeroPeriodo', '$codigoCurso')";
            $query2 = mysqli_query($conn, $sql2) or die("Falha ao cadastrar o período! Erro: " . mysqli_error($conn));
          }

            if ($query2) {

              echo "<script type='text/javascript'>alert('Período cadastrado com sucesso!');location.href='../../view/cadastrarPeriodo.php';</script>";

            }else{

              echo "<script type='text/javascript'>alert('Não foi possível cadastrar o período.');location.href='../../view/cadastrarPeriodo.php';</script>";
            }

            mysqli_close($conn);
          }

            ?>