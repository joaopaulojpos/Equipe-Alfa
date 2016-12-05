<?php

require_once '../conexao.php';

if (isset($_POST['cadastrar'])) {
    $nomeDisciplina = $_POST['nomeDisciplina'];

    $sql = "SELECT nomeDisciplina FROM disciplina WHERE nomeDisciplina = '$nomeDisciplina'";
    $query = mysqli_query($conn, $sql) or die("Falha ao buscar os dados no BD " . mysqli_error($conn));
    $row = mysqli_fetch_assoc($query);    
    $nome = $row['nomeDisciplina'];
    /*
     * Validação dos campos vazios ou inválidos e evitando registro duplicado
     */    
        if ($nomeDisciplina == "") {
            echo "<script type='text/javascript'>alert('Insira o nome da disciplina');location.href='../../view/cadastrarDisciplinas.php';</script>";
        } else
            if ($nomeDisciplina == $nome) {
                echo "<script type='text/javascript'>alert('Esta disciplina já encontra-se cadastrada');location.href='../../view/cadastrarDisciplinas.php'</script>";
            } else {
                //Se tudo estiver OK, insere o registro no banco de dados
                $insert = "INSERT INTO disciplina(nomeDisciplina) VALUES('$nomeDisciplina')";
                $result = mysqli_query($conn, $insert) or die("Falha no cadastro da Disciplina. " . mysqli_error($conn));
                $codigoDisciplina = mysqli_insert_id($conn);

                $insert1 = "INSERT INTO professorDisciplina(codigoDisciplina) VALUES($codigoDisciplina)";
                $result1 = mysqli_query($conn,$insert1) or die("Não foi possível inserir o código da disciplina. " . mysqli_error($conn));

                if ($result && $result1) {
                    echo "<script type='text/javascript'>alert('Disciplina cadastrada com sucesso!');location.href='../../view/cadastrarDisciplinas.php';</script>";
                } else {
                    echo "<script type='text/javascript'>alert('Não foi possível concluir o cadastro');location.href='../../view/cadastrarDisciplinas.php'</script>";
                }
            }
            mysqli_close($conn);
        } 