<?php
require_once '../model/conexao.php';

$codigoTurma = $_GET['codigoTurma'];

/*
 * Retornando os dados do banco de dados para o formulário para que possam ser alterados
 */
$sql = "SELECT codigoTurma, codigoPeriodo, ano, turno FROM turma WHERE codigoTurma = '$codigoTurma'";
$query = mysqli_query($conn, $sql) or die("Não foi concluir a operação! Erro: " . mysqli_error($conn));
$row = mysqli_fetch_assoc($query);

require_once 'includes/cabecalhocss.php';
?>

<body class="#37474f blue-grey darken-3">

<div class="valign-wrapper container row formulario">
    <div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
        <h2><b>Alterar Turma</b></h2>

        <form method="POST" action="../model/alterar/alterarTurma.php">

        <div class="row input-field col s6 left-align">
        <input id="codigoTurma" type="text" name="codigoTurma" class="validate" value="<?php echo $row['codigoTurma']; ?>">
        <label for="codigoTurma">Código:</label>
        </div>

        <div class="row input-field col s6 left-align">
        <input id="codigoPeriodo" type="text" name="codigoPeriodo" class="validate" value="<?php echo $row['codigoPeriodo']; ?>">
        <label for="codigoPeriodo">Código Período:</label>
        </div>

        <div class="row input-field col s6 left-align">
        <input id="ano" type="text" name="ano" class="validate" value="<?php echo $row['ano']; ?>">
        <label for="ano">Ano:</label>
        </div>

        <div class="row input-field col s6 left-align">
            <input type="text" id="turno" name="turno" value="<?php echo $row['turno'] ?>">
            <label for="turno">Turno:</label>
        </div>

        <div class="row col s4 left-align btnform">
        <button class="btn waves-effect waves-ligth" type="submit" name="alterar">
         Alterar
        </button>
        </div>

        <div class="row col s4 left-align">
        <a class="btn waves-effect waves-light" href="listarTurma.php">Voltar</a>
        </div>

        <br>
        </form>
    </div>
</div>

<?php require_once 'includes/rodapecss.php'; ?>