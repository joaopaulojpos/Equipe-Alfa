<?php require_once 'includes/cabecalhocss.php'; ?>

<body class="#37474f blue-grey darken-3">

<div class="valign-wrapper container row formulario">
    <div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
        <h2>Listar Professores</h2>
            <div class="col s12 left-align">
                <div class="row col s12 left-align">
                    <?php
                    require_once '../model/conexao.php';

                    $sql = "SELECT codigoProfessor, nome, telefone FROM professor";
                    $query = mysqli_query($conn, $sql) or die("Não foi possível listar os dados " . mysqli_error($conn));

                    if (mysqli_num_rows($query) > 0) {

                        while ($row = mysqli_fetch_assoc($query)) {

                            echo "<div><label><b>Nome: </b></label>" . $row['nome'] . "&nbsp&nbsp&nbsp";
                            echo "<label><b>Telefone: </b></label>" . "&nbsp&nbsp&nbsp" . $row['telefone'] ?>  

                            <!-- *Enviando a matrícula por método GET para EXCLUIR e EDITAR os dados -->
                            <?php echo "<a href='excluirProfessor.php?codigoProfessor=$row[codigoProfessor]'>"?> <i class="material-icons">delete</i> <?php echo "</a>" ?> 

                            <?php echo "<a href='../view/alterarProfessor.php?codigoProfessor=$row[codigoProfessor]'>"?> <i class="material-icons">edit</i> <?php echo "</a>" ?> 

                            <?php "</div>";
                            
                        }
                    } else {

                        echo "<script type='text/javascript'>alert('Não há registros no banco de dados');location.href='../view/cadastroTipoUsuario.html';</script>";
                    }
                    mysqli_close($conn);
                    ?>
                 </div>    
            </div>
    </div>
</div>

<?php require_once 'includes/rodapecss.php'; ?>