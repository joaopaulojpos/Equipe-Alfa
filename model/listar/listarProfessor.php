<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Lista Professores</title>
        <link rel="stylesheet" href="../css/arquivo.css">
    </head>
    <body>
        <div>
            <fieldset id="fieldListarTpU">
                <h2 class="titulo">Lista de Professores</h2>
                <hr><br/>
                <div id="divscrowbar">
                    <?php
                    require_once 'conexao.php';

                    $sql = "SELECT codigoProfessor, nome, telefone FROM professor";
                    $query = mysqli_query($conn, $sql) or die("Não foi possível listar os dados " . mysqli_error($conn));

                    if (mysqli_num_rows($query) > 0) {

                        while ($row = mysqli_fetch_assoc($query)) {

                            echo "<div><label><b>Nome: </b></label>" . $row['nome'] . "&nbsp&nbsp&nbsp";
                            echo "<label><b>Telefone: </b></label>" . "&nbsp&nbsp&nbsp" . $row['telefone'] . " " . "</div>";
                            /*Enviando a matrícula por método GET para EXCLUIR e EDITAR os dados*/
                            echo "<a href='excluirTipoUsuario.php?codigoTipoUsuario=$row[codigoProfessor]'><input type='image' src='../imagem/lixeira1.png' height='25' width='25' class='icones'/></a>";
                            echo "<a href='formularioAlterarTipoUsuario.php?codigoTipoUsuario=$row[codigoProfessor]'><input type='image' src='../imagem/editar.png' height='25' width='25' class='icones'/></a>";
                            echo "<hr>";
                        }
                    } else {

                        echo "<script type='text/javascript'>alert('Não há registros no banco de dados');location.href='../view/cadastroTipoUsuario.html';</script>";
                    }
                    mysqli_close($conn);
                    ?>
                </div>
                <br/>
                <input type="button" value="Atualizar" class="botao" onclick="location.href = 'listarTipoUsuario.php'"/>
                <input type="button" value="Voltar" class="botao" onclick="location.href = '../view/cadastroTipoUsuario.html'"/>
            </fieldset>
        </div>
    </body>
</html>
