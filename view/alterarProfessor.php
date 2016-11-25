<?php
require_once '../model/conexao.php';

$codigoProfessor = $_GET['codigoProfessor'];

/*
 * Retornando os dados do banco de dados para o formulário para que possam ser alterados
 */
$sql = "SELECT codigoProfessor, nome, telefone FROM Professor WHERE codigoProfessor = '$codigoProfessor'";
$query = mysqli_query($conn, $sql) or die("Não foi possível resgatar os dados do BD " . mysqli_error($conn));
$row = mysqli_fetch_assoc($query);

require_once 'includes/cabecalhocss.php';
?>



<body class="#37474f blue-grey darken-3">

<div class="valign-wrapper container row formulario">
    <div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
        <h2>Alterar Professor</h2>

        <form method="POST" action="../model/alterar/alterarProfessor.php">

        <div class="row input-field col s6 left-align">
        <input id="codigoProfessor" type="number" min="1" name="codigoProfessor" class="validate" value="<?php echo $row['codigoProfessor']; ?>">
        <label for="codigoProfessor">Codigo</label>
        </div>

       <div class="row input-field col s6 left-align">
            <input type="tel" id="telefone" name="telefone" value="<?php echo $row['telefone'] ?>">
            <label for="telefone">Telefone</label>
        </div>

        <div class="row input-field col s12 left-align">
            <input type="text" id="nomeProfessor" name="nomeProfessor" value="<?php echo $row['nome'] ?>">
            <label for="nomeProfessor">Nome do Professor</label>
        </div>


        <div class="row col s4 left-align btnform">
        <button class="btn waves-effect waves-ligth" type="submit" name="entrar">
         Alterar
        </button>
        </div>

        <div class="row col s4 center-align">
        <a class="btn waves-effect waves-light" href="listarProfessor.php">Voltar</a>
        </div>

        <br>
        </form>
    </div>
</div>

<?php require_once 'includes/rodapecss.php'; ?>