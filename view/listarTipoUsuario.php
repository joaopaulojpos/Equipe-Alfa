<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Lista Tipo Usuário</title>
        <link rel="stylesheet" href="../css/arquivo.css">
    </head>
    <body>
        <div>
            <fieldset id="fieldListarTpU">
                <h2 class="titulo">Lista de Tipo de Usuários</h2>
                <hr><br/>
                <div id="divscrowbar">
                    <?php
                    require_once '../model/conexao.php';

                    $sql = "SELECT codigoTipoUsuario, descricaoTipoUsuario FROM tipoUsuario";
                    $query = mysqli_query($conn, $sql) or die("Não foi possível listar os dados " . mysqli_error($conn));

                    if (mysqli_num_rows($query) > 0) {

                        while ($row = mysqli_fetch_assoc($query)) {

                            echo "<div><label><b>Código: </b></label>" . $row['codigoTipoUsuario'] . "&nbsp&nbsp&nbsp";
                            echo "<label><b>Descrição: </b></label>" . "&nbsp&nbsp&nbsp" . $row['descricaoTipoUsuario'] . " " . "</div>";
                            /*Enviando a matrícula por método GET para EXCLUIR e EDITAR os dados*/
                            echo "<a href='excluirTipoUsuario.php?codigoTipoUsuario=$row[codigoTipoUsuario]'><input type='image' src='../imagem/lixeira1.png' height='25' width='25' class='icones'/></a>";
                            echo "<a href='formularioAlterarTipoUsuario.php?codigoTipoUsuario=$row[codigoTipoUsuario]'><input type='image' src='../imagem/editar.png' height='25' width='25' class='icones'/></a>";
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
