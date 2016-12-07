<?php
require_once '../model/conexao.php';

$matriculaAluno = $_GET['matriculaAluno'];

/*
 * Retornando os dados do banco de dados para o formulário para que possam ser alterados
 */
$sql = "SELECT matriculaAluno, nota1, nota2 FROM notaNumero WHERE matriculaAluno = '$matriculaAluno'";
$query = mysqli_query($conn, $sql) or die("Não foi possível concluir a operação! Erro: " . mysqli_error($conn));
$row = mysqli_fetch_assoc($query);

require_once 'includes/cabecalhocss.php';
?>

<body class="#37474f blue-grey darken-3">

<div class="valign-wrapper container row formulario">
    <div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
        <h2><b>Atualizar Nota</b></h2>

        <form method="post" action="../model/alterar/alterarNotaNumero.php"> 

        <input type="hidden" min="1" name="matriculaAluno" class="validate" value="<?php echo $row['matriculaAluno']; ?>" >   

        <div class="row input-field col s6 left-align">
            <input type="text" name="nota1" class="validate" value="<?php echo $row['nota1']; ?>">
            <label for="nota1">1ª nota:</label>
        </div>

        <div class="row input-field col s6 left-align">
            <input type="text" name="nota2" class="validate" value="<?php echo $row['nota2'] ?>">
            <label for="nota2">2ª nota:</label>
        </div>

        <div class="row col s4 left-align btnform">
        <button class="btn waves-effect waves-ligth" type="submit" name="atualizar">
         Atualizar
        </button>
        </div>

        <div class="row col s4 left-align">
        <a class="btn waves-effect waves-light" href="listarNotaNumero.php">Voltar</a>
        </div>
        <br>
        </form>
    </div>
</div>

<?php require_once 'includes/rodapecss.php'; ?>