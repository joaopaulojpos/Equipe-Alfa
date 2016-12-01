<?php
require_once '../model/conexao.php';

$codigoDisciplina = $_GET['codigoDisciplina'];

/*
 * Retornando os dados do banco de dados para o formulário para que possam ser alterados
 */
$sql = "SELECT codigoDisciplina, nomeDisciplina FROM disciplina WHERE codigoDisciplina = '$codigoDisciplina'";
$query = mysqli_query($conn, $sql) or die("Não foi possível concluir a operação! Erro: " . mysqli_error($conn));
$row = mysqli_fetch_assoc($query);

require_once 'includes/cabecalhocss.php';
?>

<body class="#37474f blue-grey darken-3">

<div class="valign-wrapper container row formulario">
    <div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
        <h2><b>Alterar Disciplina</b></h2>

        <form method="post" action="../model/alterar/alterarDisciplina.php">

        <div class="row input-field col s6 left-align">
            <input type="hidden" name="codigoDisciplina" value="<?php echo $row['codigoDisciplina']; ?>">
        </div>

        <div class="row input-field col s12 left-align">
            <input type="text" name="nomeDisciplina" class="validate" value="<?php echo $row['nomeDisciplina']; ?>">
            <label for="nomeDisciplina">Nome Disciplina:</label>
        </div>        

        <div class="row col s4 left-align btnform">
        <button class="btn waves-effect waves-ligth" type="submit" name="alterar">
         Alterar
        </button>
        </div>

        <div class="row col s4 left-align">
        <a class="btn waves-effect waves-light" href="listarDisciplina.php">Voltar</a>
        </div>
        <br>
        </form>
    </div>
</div>

<?php require_once 'includes/rodapecss.php'; ?>