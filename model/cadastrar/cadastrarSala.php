<?php

require_once "../conexao.php";

if (isset($_POST['descricaoSala'])) {
    $descricaoSala = $_POST['descricaoSala'];    
    $capacidade = $_POST['capacidade'];   

    $sql = "SELECT descricaoSala FROM sala";
    $query = mysqli_query($conn, $sql) or die("Dados não encontrados. " . mysqli_error($conn));
    $row = mysqli_fetch_assoc($query);
    $descricao = $row['descricaoSala'];

    /*
     * Validação dos campos vazios ou inválidos e evitando registro duplicado
     */
    if ($descricaoSala == "") {
        echo "<script type='text/javascript'>alert('O campo descrição deve ser preenchido.');location.href='../../view/cadastrarSala.php';</script>";
    } else 
         if ($descricaoSala == $descricao) {
            echo "<script type='text/javascript'>alert('A sala já está cadastrada.');location.href='../../view/cadastrarSala.php';</script>";         
        } else
        	if (strlen($descricaoSala) < 6) {
            echo "<script type='text/javascript'>alert('O campo descrição deve conter  pelo menos 6 digitos.');location.href='../../view/cadastrarSala.php';</script>";
        }else
            if ($capacidade == null) {
                echo "<script type='text/javascript'>alert('Informe a capacidade da sala.');location.href='../../view/cadastrarSala.php';</script>";
            } else {                                 
                //Se tudo estiver OK, insere o registro no banco de dados
                $insert = "INSERT INTO sala (descricaoSala, capacidade) VALUES ('$descricaoSala', '$capacidade')";
                $result = mysqli_query($conn, $insert) or die("Não foi possível cadastrar o sala." . mysqli_error($conn));
            }

                if ($result) {
                echo "<script type='text/javascript'>alert('Sala cadastrada com sucesso!');location.href='../../view/cadastrarSala.php';</script>";
                    } else {
                     echo "<script type='text/javascript'>alert('Não foi possível cadastrar a sala.');location.href='../../view/cadastrarSala.php';</script>";
                        }

    mysqli_close($conn);
}
