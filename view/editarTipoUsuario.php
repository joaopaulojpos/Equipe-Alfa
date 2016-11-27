<?php
require_once '../model/conexao.php';

$codigoTipoUsuario = $_GET['codigoTipoUsuario'];

/*
 * Retornando os dados do banco de dados para o formulário para que possam ser alterados
 */
$sql = "SELECT codigoTipoUsuario, descricaoTipoUsuario FROM tipousuario WHERE codigoTipoUsuario = '$codigoTipoUsuario'";
$query = mysqli_query($conn, $sql) or die("Não foi possível resgatar os dados do BD " . mysqli_error($conn));
$row = mysqli_fetch_assoc($query);

require_once 'includes/cabecalhocss.php';
?>

<body class="#37474f blue-grey darken-3">

<div class="valign-wrapper container row formulario">
    <div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
        <h2><b>Alterar Nivel</b></h2>

        <form method="POST" action="../model/alterar/alterarTipoUsuario.php">

        <div class="row input-field col s6 left-align">
        <input id="codigoTipoUsuario" type="number" min="1" name="codigoTipoUsuario" class="validate" value="<?php echo $row['codigoTipoUsuario']; ?>">
        <label for="codigoTipoUsuario">Codigo</label>
        </div>

        <div class="row input-field col s6 left-align">
            <input type="text" id="descricaoTipoUsuario" name="descricaoTipoUsuario" value="<?php echo $row['descricaoTipoUsuario'] ?>">
            <label for="descricaoTipoUsuario">Descrição</label>
        </div>

        <div class="row col s4 left-align btnform">
        <button class="btn waves-effect waves-ligth" type="submit" name="alterar">
         Alterar
        </button>
        </div>

        <div class="row col s4 center-align">
        <a class="btn waves-effect waves-light" href="listarTipoUsuario.php">Voltar</a>
        </div>

        <br>
        </form>
    </div>
</div>

<?php require_once 'includes/rodapecss.php'; ?>