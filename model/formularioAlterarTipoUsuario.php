<?php
require_once 'conexao.php';

$codigoTipoUsuario = $_GET['codigoTipoUsuario'];
/*
 * Retornando os dados do banco de dados para o formulário para que possam ser alterados
 */
$sql = "SELECT codigoTipoUsuario, descricaoTipoUsuario FROM tipoUsuario WHERE codigoTipoUsuario = '$codigoTipoUsuario'";
$query = mysqli_query($conn, $sql) or die("Não foi possível resgatar os dados do BD " . mysqli_error($conn));
$row = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Alterar Tipo de Usuário</title>
        <link rel="stylesheet" href="../css/tipoUsuario.css">
    </head>
    <body>
        <div>
            <fieldset class="fieldsetTipoUsuario">
                <h2 class="titulo"><b>Alterar Tipo de Usuário</b></h2>
                <hr/>
                <form method="post" action="alterarTipoUsuario.php">
                    <label>Código: </label><br/><input type="number" min="1" max="10" id="codigoTipoUsuario" name="codigoTipoUsuario" Value="<?php echo $row['codigoTipoUsuario']; ?>"/><br/><br/>
                    <label>Descrição: </label><br/><input id="descricaoTipoUsuario" name="descricaoTipoUsuario" Value="<?php echo $row['descricaoTipoUsuario']; ?>"/><br/><br/><br/>
                    <input type="submit" value="Alterar" class="botao"/>
                    <input type="button" value="Voltar" class="botao" onclick="location.href = 'listarTipoUsuario.php'"/>           
                </form>
            </fieldset>
        </div>
    </body>   
</html>
