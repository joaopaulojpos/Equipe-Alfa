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
        <h2>Listar Professores</h2>
            <div class="col s10 left-align">
                <table class="highlight">
                <tbody>
                <tr>
                 <?php
                            require_once 'conexao.php';

                            $sql = "SELECT codigoProfessor, nome, telefone FROM professor";
                            $query = mysqli_query($conn, $sql) or die("Não foi possível listar os dados " . mysqli_error($conn));

                            if (mysqli_num_rows($query) > 0) {

                                while ($row = mysqli_fetch_assoc($query)) {
                                    ?>

                                    <td>Nome: <?php echo $row['nome'] ?></td> <td>Telefone: <?php echo $row['telefone'] ?></td>
                                    <td><?php echo "<a href='excluirProfessor.php?codigoProfessor=$row[codigoProfessor]'>" ?> <i class="material-icons">delete</i> <?php echo "</a>" ?> </td>

                                <td> <?php echo "<a href='formularioAlterarTipoUsuario.php?codigoTipoUsuario=$row[codigoProfessor]'>" ?> <i class="material-icons">mode edit</i> <?php echo "</a>" ?> </td>

                                   <!-- /*Enviando a matrícula por método GET para EXCLUIR e EDITAR os dados*/ -->
                                    
                                    <?php

                                    echo "<><input type='image' src='../imagem/editar.png' height='25' width='25' class='icones'/></a>";
                                    echo "<hr>";
                                }
                            } else {

                                echo "<script type='text/javascript'>alert('Não há registros no banco de dados');location.href='../view/cadastroTipoUsuario.html';</script>";
                            }
                            mysqli_close($conn);
                            ?>
                </tr>
                </tbody>
                </table>
            </div>
    </div>
</div>

<!-- Materialize JS -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!-- Materialize JS -->
<script src="../js/materialize.js"></script>

</body>
</html>