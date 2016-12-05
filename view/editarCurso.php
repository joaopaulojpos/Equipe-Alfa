<?php
require_once '../model/conexao.php';

$codigoCurso = $_GET['codigoCurso'];

/*
 * Retornando os dados do banco de dados para o formulário para que possam ser alterados
 */
$sql = "SELECT codigoCurso, nomeCurso, tipoEnsino, duracao FROM curso WHERE codigoCurso = '$codigoCurso'";
$query = mysqli_query($conn, $sql) or die("Não foi possível concluir a operação! Erro: " . mysqli_error($conn));
$row = mysqli_fetch_assoc($query);

require_once 'includes/cabecalhocss.php';
?>

<body class="#37474f blue-grey darken-3">

<div class="valign-wrapper container row formulario">
    <div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
        <h2><b>Alterar Curso</b></h2>

        <form method="POST" action="../model/alterar/alterarCurso.php">

        
        <input type="hidden" name="codigoCurso" class="validate" value="<?php echo $row['codigoCurso']; ?>">
        

        <div class="row input-field col s12 left-align">
        <input type="text" name="nomeCurso" class="validate" value="<?php echo $row['nomeCurso'] ?>">
        <label for="nomeCurso">Nome:</label>
        </div>       

        <div class="row input-field col s6 left-align">
            <input type="text" name="tipoEnsino" value="<?php echo $row['tipoEnsino'] ?>">
            <label for="tipoEnsino">Tipo Ensino:</label>
        </div>

         <div class="row input-field col s6 left-align">
        <input type="text" name="duracao" class="validate" value="<?php echo $row['duracao']; ?>">
        <label for="duracao">Duração:</label>
        </div>

        <div class="row col s4 left-align btnform">
        <button class="btn waves-effect waves-ligth" type="submit" name="alterar">
         Alterar
        </button>
        </div>

        <div class="row col s4 left-align">
        <a class="btn waves-effect waves-light" href="listarCurso.php">Voltar</a>
        </div>

        <br>
        </form>
    </div>
</div>

<?php require_once 'includes/rodapecss.php'; ?>