<?php

require_once '../conexao.php';

if (isset($_POST['nomeDisciplina'])) {
    $nomeDisciplina = $_POST['nomeDisciplina'];

    $sql = "SELECT codigoDisciplina, nomeDisciplina FROM disciplina WHERE codigoDisciplina = '$codigoDisciplina'";
    $query = mysqli_query($conn, $sql) or die("Falha ao buscar os dados no BD " . mysqli_error($conn));
    $row = mysqli_fetch_assoc($query);
    $codigo = $row['codigoDisciplina'];
    /*
     * Validação dos campos vazios ou inválidos e evitando registro duplicado
     */
    if ($codigoDisciplina == "" || $codigoDisciplina == null) {
        echo "<script type='text/javascript'>alert('Insira o Codigo');location.href='../../view/cadastroDisciplinas.php';</script>";
    } else {
        if ($nome == "" || $nome == null) {
            echo "<script type='text/javascript'>alert('Insira o nome da disciplina');location.href='../../view/cadastrarDisciplinas.php';</script>";
        } else {
            if ($codigo == $codigoDisciplina) {
                echo "<script type='text/javascript'>alert('Esta disciplina já encontra-se cadastrada');location.href='../../view/cadastrarDisciplinas.php'</script>";
            } else {
                //Se tudo estiver OK, insere o registro no banco de dados
                $insert = "INSERT INTO disciplina(nomeDisciplina) VALUES('$nomeDisciplina')";
                $result = mysqli_query($conn, $insert) or die("Falha no cadastro da Disciplina. " . mysqli_error($conn));

                if ($result) {
                    echo "<script type='text/javascript'>alert('Cadastro concluído com sucesso!');location.href='../../view/listarDisciplinas.php';</script>";
                } else {
                    echo "<script type='text/javascript'>alert('Não foi possível concluir o cadastro');location.href='../../view/cadastrarDisciplinas.php'</script>";
                }
            }
        }
    }
    mysqli_close($conn);
}
