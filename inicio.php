<?php

require_once 'conexao.php';

$login_cookie = $_COOKIE['usuarioLogin'];
if (isset($login_cookie)) {

    /*
     * Definindo a permissão de acesso para usuários
     */
    $sql = "SELECT codigoTipoUsuario FROM usuario WHERE usuarioLogin = '$login_cookie'";
    $query = mysqli_query($conn, $sql) or die("Não foi possível selecionar os dados dos usuários " . mysqli_error($conn));
    while ($row = mysqli_fetch_assoc($query)) {
        $codigoTipoUsuario = $row['codigoTipoUsuario'];

        if ($codigoTipoUsuario == 1) {

            //echo "Acessível apenas para administradores";
            header('Location:inicioAdministrador.html');
        } else {
            if ($codigoTipoUsuario == 2) {

                //echo "Acessível apenas para professores";
                header('Location:inicioProfessor.html');
            } else {
                if ($codigoTipoUsuario == 3) {

                    //echo "Assessível para alunos";
                    header('Location:inicioAluno.html');
                } else {

                    echo "<script type='text/javascript'>alert(Faça seu cadastro para poder acessar o sistema!);location.href='cadastroUsuario.html';</script>";
                }
            }
        }
    }
}
echo "<br/><br/>";
echo "<a href='login.html'><input type='button' value='Sair'/></a>";
?>
