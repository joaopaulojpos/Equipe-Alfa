<?php

require_once 'conexao.php';

if (isset($_POST['codigoTipoUsuario'])) {
    $codigoTipoUsuario = $_POST['codigoTipoUsuario'];
    $descricaoTipoUsuario = $_POST['descricaoTipoUsuario'];

    $sql = "SELECT codigoTipoUsuario, descricaoTipoUsuario FROM tipousuario WHERE codigoTipoUsuario = '$codigoTipoUsuario'";
    $query = mysqli_query($conn, $sql) or die("Falha ao buscar os dados no BD " . mysqli_error($conn));
    $row = mysqli_fetch_assoc($query);
    $codigo = $row['codigoTipoUsuario'];
    
    /*
     * Validação dos campos vazios ou inválidos e evitando registro duplicado
     */
    if ($codigoTipoUsuario == "" || $codigoTipoUsuario == null) {
        echo "<script type='text/javascript'>alert('Selecione o tipo do usuário');location.href='cadastroTipoUsuario.html';</script>";
    } else {
        if ($descricaoTipoUsuario == "" || $descricaoTipoUsuario == null) {
            echo "<script type='text/javascript'>alert('Descreva o tipo de usuário que será cadastrado');location.href='cadastroTipoUsuario.html';</script>";
        } else {
            if ($codigo == $codigoTipoUsuario) {
                echo "<script type='text/javascript'>alert('Este código já encontra-se cadastrado');location.href='cadastroTipoUsuario.html'</script>";
            } else {
                //Se tudo estiver OK, insere o registro no banco de dados
                $insert = "INSERT INTO tipoUsuario(codigoTipoUsuario, descricaoTipoUsuario) VALUES('$codigoTipoUsuario', '$descricaoTipoUsuario')";
                $result = mysqli_query($conn, $insert) or die("Falha no cadastro do tipo de usuário. " . mysqli_error($conn));

                if ($result) {
                    echo "<script type='text/javascript'>alert('Cadastro concluído com sucesso!');location.href='listarTipoUsuario.php';</script>";
                } else {
                    echo "<script type='text/javascript'>alert('Não foi possível concluir o cadastro');location.href='cadastroTipoUsuario.html'</script>";
                }
            }
        }
    }
    mysqli_close($conn);
}
