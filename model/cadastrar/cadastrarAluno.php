<?php

require_once "../conexao.php";

if (isset($_POST['matriculaAluno'])) {
    $matriculaAluno = $_POST['matriculaAluno'];
    $dataNascimento = date('Y,m,d', strtotime($_POST['dataNascimento']));
    $nomeAluno = $_POST['nomeAluno'];
    $sexoAluno = $_POST['sexoAluno'];
    $telefone = $_POST['telefone'];

    $sql = "SELECT matriculaAluno,dataNascimento,nomeAluno,sexoAluno,telefone FROM aluno";
    $query = mysqli_query($conn, $sql) or die("Dados não encontrados " . mysqli_error($conn));
    $row = mysqli_fetch_assoc($query);
    $matricula = $row['matriculaAluno'];

    /*
     * Validação dos campos vazios ou inválidos e evitando registro duplicado
     */
    if ($matriculaAluno == "" || $matriculaAluno == null) {
        echo "<script type='text/javascript'>alert('O campo matrícula deve ser preenchido');location.href='../../view/cadastrarAluno.php';</script>";
    } else 
        if (strlen($matriculaAluno) > 10 || strlen($matriculaAluno) < 10) {
            echo "<script type='text/javascript'>alert('O campo matricula deve conter 10 digitos');location.href='../../view/cadastrarAluno.php';</script>";
        } else 
            if (!is_numeric($matriculaAluno)) {
                echo "<script type='text/javascript'>alert('O campo matrícula deve conter apenas números');location.href='../../view/cadastrarAluno.php';</script>";
            } else 
                if ($dataNascimento == "" || $dataNascimento == null) {
                    echo "<script type='text/javascript'>alert('O campo data de nascimento deve ser preenchido');location.href='../../view/cadastrarAluno.php';</script>";
                } else 
                    if ($nomeAluno == "" || $nomeAluno == null) {
                        echo "<script type='text/javascript'>alert('O campo nome deve ser preenchido');location.href='../../view/cadastrarAluno.php';</script>";
                    } else 
                        if ($sexoAluno == "" || $sexoAluno == null) {
                            echo "<script type='text/javascript'>alert('Selecione uma opção para o campo sexo');location.href='../../view/cadastrarAluno.php';</script>";
                        } else 
                            if ($telefone == "" || $telefone == null) {
                                echo "<script type='text/javascript'>alert('O campo telefone deve ser preenchido');location.href='../../view/cadastrarAluno.php';</script>";
                            } else 
                                if (!preg_match('^[0-9]{2} [0-9]{4,5}-[0-9]{4}$^', $telefone)) {
                                    echo "<script type='text/javascript'>alert('Telefone inválido!');location.href='../../view/cadastrarAluno.php';</script>";
                                } else 
                                    if ($matricula == $matriculaAluno) {
                                        echo "<script type='text/javascript'>alert('Esta matrícula já encontra-se cadastrada');location.href='../model/listar/listarAluno.php'</script>";
                                    } else {
                                        //Se tudo estiver OK, insere o registro no banco de dados
                                        $insert = "INSERT INTO aluno (matriculaAluno, dataNascimento, nomeAluno, sexoAluno, telefone) VALUES ('$matriculaAluno', '$dataNascimento', '$nomeAluno', '$sexoAluno', '$telefone')";
                                        $result = mysqli_query($conn, $insert) or die("Não foi possível cadastrar o aluno. " . mysqli_error($conn));
                                    }

                                        if ($result) {
                                            echo "<script type='text/javascript'>alert('Aluno cadastrado com sucesso!');location.href='../../view/listarAluno.php';</script>";
                                        } else {
                                            echo "<script type='text/javascript'>alert('Não foi possível cadastrar este aluno');location.href='../../view/cadastrarAluno.php';</script>";
                                        }
                                    
    mysqli_close($conn);
}
