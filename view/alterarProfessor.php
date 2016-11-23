<?php
require_once '../model/conexao.php';

$codigoProfessor = $_GET['codigoProfessor'];

/*
 * Retornando os dados do banco de dados para o formulário para que possam ser alterados
 */
$sql = "SELECT codigoProfessor, nome, telefone FROM Professor WHERE codigoProfessor = '$codigoProfessor'";
$query = mysqli_query($conn, $sql) or die("Não foi possível resgatar os dados do BD " . mysqli_error($conn));
$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Sistema de Gerenciamento Acadêmico</title>
    <!--Import Google Icon Font-->
     <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="../csss/materialize.css">
    <link rel="stylesheet" href="../csss/custom.css">

</head>
<body class="#37474f blue-grey darken-3">

<div class="valign-wrapper container row formulario">
    <div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
        <h2>Alterar Professor</h2>

        <form method="POST" action="../model/alterarProfessor.php">

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
        <a class="btn waves-effect waves-light" href="../model/listarProfessor2.php">Voltar</a>
        </div>

        <br>
        </form>
    </div>
</div>

<!-- Materialize JS -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!-- Materialize JS -->
<script src="../js/materialize.js"></script>

</body>
</html>