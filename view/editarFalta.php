<?php
require_once '../model/conexao.php';

$codigoFalta = $_GET['codigoFalta'];

/*
 * Retornando os dados do banco de dados para o formulário para que possam ser alterados
 */
$sql = "SELECT codigoFalta, matriculaAluno, codigoTurma, nomeDisciplina, mes, falta, abono, motivo FROM falta WHERE codigoFalta = '$codigoFalta'";
$query = mysqli_query($conn, $sql) or die("Não foi possível concluir a operação! Erro: " . mysqli_error($conn));
$row = mysqli_fetch_assoc($query);

require_once 'includes/cabecalhocss.php';
?>

<body class="#37474f blue-grey darken-3">

<div class="valign-wrapper container row formulario">
    <div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
        <h2><b>Alterar Faltas</b></h2>

        <form method="post" action="../model/alterar/alterarFalta.php">

         <div>
            <input type="hidden" name="codigoFalta" class="validate" value="<?php echo $row['codigoFalta']; ?>">
        </div>

        <div class="row input-field col s6 left-align">
            <input type="number" name="matriculaAluno" class="validate" value="<?php echo $row['matriculaAluno']; ?>">
            <label for="falta">Matrícula:</label>
        </div>

            <div class="row input-field col s6 left-align">
            <input type="number" name="falta" class="validate" value="<?php echo $row['falta']; ?>">
            <label for="falta">Faltas:</label>
        </div>
       

        <div class="row input-field col s6 left-align">
            <input type="number" name="codigoTurma" class="validate" value="<?php echo $row['codigoTurma']; ?>">
            <label for="codigoTurma">Código Turma:</label>
        </div>        

        <div class="row input-field col s6 left-align">
            <input type="text" name="nomeDisciplina" class="validate" value="<?php echo $row['nomeDisciplina']; ?>">
            <label for="nomeDisciplina">Disciplina:</label>
        </div>

        <div class="row input-field col s6 left-align">
            <input type="text" name="mes" value="<?php echo $row['mes'] ?>">
            <label for="mes">Mês:</label>
        </div>

        <div class="row input-field col s6 left-align">
            <input type="text" name="abono" value="<?php echo $row['abono'] ?>">
            <label for="abono">Abono:</label>
        </div>

        <div class="row input-field col s12 left-align">
            <input type="text" name="motivo" value="<?php echo $row['motivo'] ?>">
            <label for="motivo">Motivo:</label>
        </div>

        <div class="row col s4 left-align btnform">
        <button class="btn waves-effect waves-ligth" type="submit" name="alterar">
         Alterar
        </button>
        </div>

        <div class="row col s4 left-align">
        <a class="btn waves-effect waves-light" href="listarFaltas.php">Voltar</a>
        </div>
        <br>
        </form>
    </div>
</div>

<?php require_once 'includes/rodapecss.php'; ?>