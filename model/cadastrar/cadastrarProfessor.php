<?php

require_once '../conexao.php';

if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];     

    $sql = "SELECT nome FROM professor WHERE nome = '$nome'";
    $query = mysqli_query($conn,$sql) or die("Dados não encontrados");
    $row = mysqli_fetch_assoc($query);
    $nomeProfessor = $row['nome']; 

    
    /*
     * Validação dos campos vazios ou inválidos e evitando registro duplicado
     */
    if ($nome == "") {
            echo "<script type='text/javascript'>alert('Insira o nome do Professor.');location.href='../../view/cadastrarProfessor.php';</script>";
        
            } else
                if($nomeProfessor == $nome) {
                    echo "<script type='text/javascript'>alert('Esse professor já encontra-se cadastrado.');location.href='../../view/cadastrarProfessor.php';</script>";

                }else{

                //Se tudo estiver OK, insere o registro no banco de dados
                $insert = "INSERT INTO professor(nome, telefone) VALUES('$nome', '$telefone')";
                $result = mysqli_query($conn, $insert) or die("Falha no cadastro do tipo do professor. " . mysqli_error($conn));

                }               

                if ($result) {
                    echo "<script type='text/javascript'>alert('Cadastro concluído com sucesso!');location.href='../../view/listarProfessor.php';</script>";
                } else {
                    echo "<script type='text/javascript'>alert('Não foi possível concluir o cadastro');location.href='../../view/cadastroProfessor.php'</script>";
                }
              
                  
    mysqli_close($conn);
}

