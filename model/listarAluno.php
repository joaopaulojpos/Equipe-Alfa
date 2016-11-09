<!DOCTYPE html>
<html>
    <head lang="pt-br">
        <meta charset="utf-8">
        <title>Lista de Alunos</title>
        <link rel="stylesheet" href="../css/listarAluno.css">
    </head>
    <body>
        <?php
        
        require_once 'conexao.php';

        if (isset($_POST['matriculaAluno']) || isset($_POST['nomeAluno'])) {

            $matriculaAluno = $_POST['matriculaAluno'];
            $nomeAluno = $_POST['nomeAluno'];           
                //SQL para PESQUISAR aluno escolhido por MATRÍCULA ou por NOME
                $sql = "SELECT matriculaAluno, dataNascimento, nomeAluno, sexoAluno, telefone FROM aluno WHERE  nomeAluno = '$nomeAluno' OR matriculaAluno = '$matriculaAluno'";
                $query = mysqli_query($conn, $sql) or die("Falha ao buscar o aluno. Erro: " . mysqli_error($conn));


                echo "<fieldset>";
                while ($row = mysqli_fetch_assoc($query)) {

                    echo "<h2><b>Resultado da Pesquisa</b></h2>";
                    echo "<hr>";
                    echo "<label><b>Matricula: </b></label> " . $row['matriculaAluno'] . " ";
                    echo "<label><b>Data Nascimento: </b></label>" . date('d/m/Y', strtotime($row['dataNascimento'])) . " ";
                    echo "<label><b>Nome: </b></label>" . $row['nomeAluno'] . " ";
                    echo "<label><b>Sexo: </b></label>" . $row['sexoAluno'] . " ";
                    echo "<label><b>Telefone: </b></label>" . $row['telefone'] . "<br/>";
                    echo "<br/><br/>";
                }
                echo "<a href='listarAluno.php'><input type='button' value='Voltar' class='botao'></a>";
                echo "</fieldset>";
        } else {
            //SQL para LISTAR os dados dos alunos
            $sql = "SELECT matriculaAluno, dataNascimento, nomeAluno, sexoAluno, telefone FROM aluno";
            $query = mysqli_query($conn, $sql) or die("Não foi possível listar os dados do aluno.\n Erro: " . mysql_error($conn));

            if (mysqli_num_rows($query) > 0) {

                echo "<fieldset>";
                echo "<h2><b>Lista de Alunos</b></h2>";
                echo "<hr>";
                echo "<br/><br/>";
                echo "<div id='divscrowbar'>";

                while ($row = mysqli_fetch_assoc($query)) {

                    echo "<div><label><b>Matricula: </b></label> " . $row['matriculaAluno'] . " ";
                    echo "<label><b>Data Nascimento: </b></label> " . date('d/m/Y', strtotime($row['dataNascimento'])) . " ";
                    echo "<label><b>Nome: </b></label> " . $row['nomeAluno'] . " ";
                    echo "<label><b>Sexo: </b></label> " . $row['sexoAluno'] . " ";
                    echo "<label><b>Telefone: </b></label> " . $row['telefone'] . " " . "</div>";
                    ?>	
                    <!--Enviando a matrícula por método GET para EXCLUIR e EDITAR os dados do aluno-->
                    <div id='links'><a href="excluirAluno.php?matriculaAluno=<?php echo $row['matriculaAluno']; ?>" id='linkexcluir'><input type="image" src="../imagem/lixeira1.png" width="25" height="25" id="icone"></a>&nbsp
                        <a href="formularioAlterarAluno.php?matriculaAluno=<?php echo $row['matriculaAluno']; ?>" id='linkeditar'><input type="image" src="../imagem/editar.png" width="25" height="25" id="icone"></a></div>	

                    <?php
                    echo "<hr><br/>";
                }
                echo "</div>";
                echo "<br/><br/>";
                echo "<a href='listarAluno.php'><input type='button' value='Atualizar' class='botao'/></a>" . " ";
                echo "<a href='../view/cadastroAluno.html'><input type='button' value='Voltar' class='botao'/></a>";
                echo"</fieldset>";

                mysqli_close($conn);
            } else {

                echo "<script type='text/javascript'>alert('Não há registro de alunos no banco de dados!');location.href='../view/cadastroAluno.html';</script>";
            }
        }
        ?>
        <div>
            <fieldset>
                <h2><b>Buscar Aluno</b></h2>
                <hr>
                <form method="post" action="">
                    <label for="matriculaAluno"><b>Matrícula:</b> </label><input type="text" id="matriculaAluno" name="matriculaAluno"/>
                    <input type="submit" value="Buscar" class="botao">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label for="nomeAluno"><b>Nome:</b> </label><input type="text" id="nomeAluno" name="nomeAluno"/>
                    <input type="submit" value="Buscar" class="botao">				
                </form>
            </fieldset>
        </div>
    </body>
</html>
