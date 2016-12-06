<?php

require_once "../conexao.php";

if (isset($_POST['cadastrar'])) {
    $matriculaAluno = $_POST['matriculaAluno'];
    $codigoDisciplina = $_POST['codigoDisciplina'];
    $recuperacao = $_POST['recuperacao'];
    $final = $_POST['final'];
    $tipoNota = $_POST['tipoNota'];
    $situacao = $_POST['situacao'];

    $sql = "SELECT matriculaAluno FROM nota WHERE matriculaAluno = '$matriculaAluno'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    $matricula = $row['matriculaAluno'];

      $sql1 = "SELECT matriculaAluno FROM aluno WHERE matriculaAluno = '$matriculaAluno'";
      $query1 = mysqli_query($conn, $sql1);
      $row1 = mysqli_fetch_assoc($query1);      	
      $matricula1 = $row1['matriculaAluno'];

      $sql2 = "SELECT codigoDisciplina FROM disciplina WHERE codigoDisciplina = $codigoDisciplina";
      $query2 = mysqli_query($conn,$sql2);
      $row2 = mysqli_fetch_assoc($query2);
      $disciplina = $row2['codigoDisciplina'];      


    if ($matriculaAluno == "") {

        echo "<script type='text/javascript'>alert('O campo matrícula deve ser preenchido.');location.href='../../view/cadastrarNota.php';</script>";
    }else
    	if(strlen($matriculaAluno) > 10 || strlen($matriculaAluno) < 10){

    		echo "<script type='text/javascript'>alert('O campo matrícula deve conter 10 dígitos numéricos.');location.href='../../view/cadastrarNota.php';</script>";
    	
    } else
    	if ($matriculaAluno == $matricula) {

    		echo "<script type='text/javascript'>alert('A nota do aluno já encontra-se cadastrada.');location.href='../../view/cadastrarNota.php';</script>";
    	}else
    		if($matriculaAluno != $matricula1){

    			echo "<script type='text/javascript'>alert('O aluno de matrícula $matriculaAluno não encontra-se cadastrado.');location.href='../../view/cadastrarNota.php';</script>";

    		}else
                if($codigoDisciplina == ""){

                    echo "<script type='text/javascript'>alert('Informa o código da disciplina.');location.href='../../view/cadastrarNota.php';</script>";

                }
                if($codigoDisciplina != $disciplina){

                    echo "<script type='text/javascript'>alert('Disciplina não encontrada.');location.href='../../view/cadastrarNota.php';</script>";
                }else{

        	if ($tipoNota == "") {

            	echo "<script type='text/javascript'>alert('Selecione o tipo da nota.');location.href='../../view/cadastrarNota.php';</script>";
       		 } else
       		 if ($situacao == "") {

           	 echo "<script type='text/javascript'>alert('Informe a situacao do aluno.');location.href='../../view/cadastrarNota.php';</script>";
       		 } else {

            $sql3 = "INSERT INTO nota(matriculaAluno, recuperacao, final, tipoNota, situacao) VALUES('$matriculaAluno','$recuperacao','$final', '$tipoNota', '$situacao')";
            $query3 = mysqli_query($conn, $sql3) or die("Falha ao cadastrar a nota! Erro: " . mysqli_error($conn));

            if ($query3) {

                echo "<script type='text/javascript'>alert('Nota cadastrada com sucesso!');location.href='../../view/cadastrarNota.php';</script>";
            }
            }
        }               
    
    }
?>