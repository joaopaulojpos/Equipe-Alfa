<?php

require_once 'conexao.php';

if (isset($_POST['codigoProfessor'])) {
    $codigoProfessor = $_POST['codigoProfessor'];
    $nome = $_POST['nome'];

    $sql = "SELECT codigoProfessor, nome, telefone FROM professor WHERE codigoProfessor = '$codigoProfessor'";
    $query = mysqli_query($conn, $sql) or die("Falha ao buscar os dados no BD " . mysqli_error($conn));
    $row = mysqli_fetch_assoc($query);
    $codigo = $row['codigoProfessor'];
    /*
     * Validação dos campos vazios ou inválidos e evitando registro duplicado
     */
    if ($codigoProfessor == "" || $codigoProfessor == null) {
        echo "<script type='text/javascript'>alert('Insira o Codigo');location.href='../view/cadastroProfessor.html';</script>";
    } else {
        if ($nome == "" || $nome == null) {
            echo "<script type='text/javascript'>alert('Insira o nome do Professor');location.href='../view/cadastroProfessor.html';</script>";
        } else {
            if ($codigo == $codigoTipoUsuario) {
                echo "<script type='text/javascript'>alert('Este código já encontra-se cadastrado');location.href='../view/cadastroTipoUsuario.html'</script>";
            } else {
                //Se tudo estiver OK, insere o registro no banco de dados
                $insert = "INSERT INTO tipoUsuario(codigoTipoUsuario, descricaoTipoUsuario) VALUES('$codigoTipoUsuario', '$descricaoTipoUsuario')";
                $result = mysqli_query($conn, $insert) or die("Falha no cadastro do tipo de usuário. " . mysqli_error($conn));

                if ($result) {
                    echo "<script type='text/javascript'>alert('Cadastro concluído com sucesso!');location.href='listarTipoUsuario.php';</script>";
                } else {
                    echo "<script type='text/javascript'>alert('Não foi possível concluir o cadastro');location.href='cadastroTipoUsuario.php'</script>";
                }
            }
        }
    }
    mysqli_close($conn);
}
