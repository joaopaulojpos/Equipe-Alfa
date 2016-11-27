<?php
require_once '../model/conexao.php';

$codigoPeriodo = $_GET['codigoPeriodo'];

/*
 * Retornando os dados do banco de dados para o formulário para que possam ser alterados
 */
$sql = "SELECT codigoPeriodo, tipoEnsino FROM periodo WHERE codigoPeriodo = '$codigoPeriodo'";
$query = mysqli_query($conn, $sql) or die("Não foi possível resgatar os dados do BD " . mysqli_error($conn));
$row = mysqli_fetch_assoc($query);

require_once 'includes/cabecalhocss.php';
?>

<body class="#37474f blue-grey darken-3">

<div class="valign-wrapper container row formulario">
    <div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
        <h2><b>Alterar Nivel</b></h2>

        <form method="POST" action="../model/alterar/alterarPeriodo.php">

        <div class="row input-field col s6 left-align">
        <input id="codigoPeriodo" type="number" min="1" name="codigoPeriodo" class="validate" value="<?php echo $row['codigoPeriodo']; ?>">
        <label for="codigoPeriodo">Codigo</label>
        </div>

        <div class="row input-field col s6 left-align">
            <input type="text" id="tipoEnsino" name="tipoEnsino" value="<?php echo $row['tipoEnsino'] ?>">
            <label for="tipoEnsino">Descrição</label>
        </div>

        <div class="row col s4 left-align btnform">
        <button class="btn waves-effect waves-ligth" type="submit" name="alterar">
         Alterar
        </button>
        </div>

        <div class="row col s4 center-align">
        <a class="btn waves-effect waves-light" href="listarPeriodo.php">Voltar</a>
        </div>

        <br>
        </form>
    </div>
</div>

<?php require_once 'includes/rodapecss.php'; ?>