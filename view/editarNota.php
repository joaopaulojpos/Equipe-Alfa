<?php
require_once '../model/conexao.php';

$codigoNota = $_GET['codigoNota'];

/*
 * Retornando os dados do banco de dados para o formulário para que possam ser alterados
 */
$sql = "SELECT codigoNota, matriculaAluno, recuperacao, final, tipoNota, situacao FROM nota WHERE codigoNota = '$codigoNota'";
$query = mysqli_query($conn, $sql) or die("Não foi possível concluir a operação! Erro: " . mysqli_error($conn));
$row = mysqli_fetch_assoc($query);

require_once 'includes/cabecalhocss.php';
?>

<body class="#37474f blue-grey darken-3">

<div class="valign-wrapper container row formulario">
    <div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
        <h2><b>Atualizar Notas</b></h2>

        <form method="post" action="../model/alterar/alterarNota.php">

        <div class="row input-field col s6 left-align">
            <input type="number" name="codigoNota" class="validate" value="<?php echo $row['codigoNota']; ?>">
            <label for="codigoNota">Código:</label>
        </div>

        <div class="row input-field col s6 left-align">
            <input type="number" name="matriculaAluno" class="validate" value="<?php echo $row['matriculaAluno']; ?>">
            <label for="matriculaAluno">Matrícula:</label>
        </div>

        <div class="row input-field col s6 left-align">
            <input type="text" name="recuperacao" class="validate" value="<?php echo $row['recuperacao']; ?>">
            <label for="recuperacao">Recuperação:</label>
        </div>

        <div class="row input-field col s6 left-align">
            <input type="text" name="final" value="<?php echo $row['final'] ?>">
            <label for="final">Final:</label>
        </div>

        <div class="row input-field col s6 left-align">
            <input type="text" name="tipoNota" value="<?php echo $row['tipoNota'] ?>">
            <label for="tipoNota">Tipo:</label>
        </div>

        <div class="row input-field col s6 left-align">
            <input type="text" name="situacao" value="<?php echo $row['situacao'] ?>">
            <label for="situacao">Situação:</label>
        </div>

        <div class="row col s4 left-align btnform">
        <button class="btn waves-effect waves-ligth" type="submit" name="atualizar">
         Atualizar
        </button>
        </div>

        <div class="row col s4 left-align">
        <a class="btn waves-effect waves-light" href="listarNota.php">Voltar</a>
        </div>
        <br>
        </form>
    </div>
</div>

<?php require_once 'includes/rodapecss.php'; ?>