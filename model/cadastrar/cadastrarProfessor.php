<?php

require_once '../conexao.php';

if (isset($_POST['nome'])) {    
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];  
    $codigoDisciplina = $_POST['codigoDisciplina']; 

    $sql = "SELECT codigoProfessor, nome, telefone, codigoDisciplina FROM professor WHERE nome = '$nome'";
    $query = mysqli_query($conn, $sql) or die("Falha ao buscar os dados no BD " . mysqli_error($conn));
    $row = mysqli_fetch_assoc($query);
    $codigo = $row['codigoProfessor'];
    $nomeProfessor = $row['nome'];

    $sql1 = "SELECT codigoDisciplina FROM disciplina WHERE codigoDisciplina = '$codigoDisciplina'";
    $query1 = mysqli_query($conn, $sql1) or die("Falha ao buscar os dados no BD " . mysqli_error($conn));
    $row1 = mysqli_fetch_assoc($query1);
    $disciplina = $row1['codigoDisciplina'];

    /*
     * Validação dos campos vazios ou inválidos e evitando registro duplicado
    */

        if ($nome == "") {
            echo "<script type='text/javascript'>alert('Informe o nome do Professor.');location.href='../../view/cadastrarProfessor.php';</script>";
        }else
            if($telefone == "") {
                echo "<script type='text/javascript'>alert('Informe o telefone do professor.');location.href='../../view/cadastrarProfessor.php';</script>";
            }else
            if ($codigoDisciplina == "") {
                echo "<script type='text/javascript'>alert('Informe o código da disciplina.');location.href='../../view/cadastrarProfessor.php'</script>";
            } else
                if($codigoDisciplina != $disciplina) {
                    echo "<script type='text/javascript'>alert('A disciplina não está cadastrada.');location.href='../../view/cadastrarProfessor.php';</script>";
                }else{
                //Se tudo estiver OK, insere o registro no banco de dados
                $insert = "INSERT INTO professor(nome, telefone, codigoDisciplina) VALUES('$nome', '$telefone', '$codigoDisciplina')";
                $result = mysqli_query($conn, $insert) or die("Falha no cadastro do tipo de usuário. " . mysqli_error($conn));
                $professor = mysqli_insert_id($conn);
            }

                if($result){

                $insert1 = "INSERT INTO disciplinaTurma(codigoProfessor) VALUES($professor)";
                $result1 = mysqli_query($conn,$insert1) or die("Erro: " . mysqli_error($conn));

                $insert2 = "UPDATE professorDisciplina SET codigoProfessor = '$professor' WHERE codigoDisciplina = '$codigoDisciplina'";
                $result2 = mysqli_query($conn,$insert2) or die("Erro: " . mysqli_error($conn));

                echo "<script type='text/javascript'>alert('Professor cadastrado com sucesso!');location.href='../../view/cadastrarProfessor.php'</script>";
            
            } else {

                    echo "<script type='text/javascript'>alert('Não foi possível concluir o cadastro');location.href='../../view/cadastrarProfessor.php'</script>";
                }            
    mysqli_close($conn);
}
