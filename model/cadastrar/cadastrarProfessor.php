<?php

require_once '../conexao.php';

if (isset($_POST['codigoProfessor'])) {
    $codigoProfessor = $_POST['codigoProfessor'];
    $nome = $_POST['nomeProfessor'];
    $telefone = $_POST['telefone'];   

    $sql = "SELECT codigoProfessor, nome, telefone FROM professor WHERE codigoProfessor = '$codigoProfessor'";
    $query = mysqli_query($conn, $sql) or die("Falha ao buscar os dados no BD " . mysqli_error($conn));
    $row = mysqli_fetch_assoc($query);
    $codigo = $row['codigoProfessor'];
    /*
     * Validação dos campos vazios ou inválidos e evitando registro duplicado
     */
    if ($codigoProfessor == "" || $codigoProfessor == null) {
        echo "<script type='text/javascript'>alert('Insira o Codigo');location.href='../../view/cadastroProfessor.php';</script>";
    } else {
        if ($nome == "" || $nome == null) {
            echo "<script type='text/javascript'>alert('Insira o nome do Professor');location.href='../../view/cadastrarProfessor.php';</script>";
        } else {
            if ($codigo == $codigoProfessor) {
                echo "<script type='text/javascript'>alert('Um professor já encontra-se cadastrado com este código!');location.href='../../view/cadastrarProfessor.php'</script>";
            } else {
                //Se tudo estiver OK, insere o registro no banco de dados
                $insert = "INSERT INTO professor(codigoProfessor, nome, telefone) VALUES('$codigoProfessor', '$nome', '$telefone')";
                $result = mysqli_query($conn, $insert) or die("Falha no cadastro do tipo de usuário. " . mysqli_error($conn));

                if ($result) {
                    echo "<script type='text/javascript'>alert('Cadastro concluído com sucesso!');location.href='../../view/listarProfessor.php';</script>";
                } else {
                    echo "<script type='text/javascript'>alert('Não foi possível concluir o cadastro');location.href='../../view/cadastroProfessor.php'</script>";
                }
            }
        }
    }
    mysqli_close($conn);
}
