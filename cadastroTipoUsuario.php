<?php

	require_once 'conexao.php';

	if(isset($_POST['codigoTipoUsuario'])){
	$codigoTipoUsuario = $_POST['codigoTipoUsuario'];
	$descricaoTipoUsuario = $_POST['descricaoTipoUsuario'];
        
        $sql = "SELECT * FROM tipousuario WHERE codigoTipoUsuario = '$codigoTipoUsuario'";
        $query = mysqli_query($conn,$sql) or die("Falha ao buscar os dados no BD " . mysqli_error($conn));
        $row = mysqli_fetch_assoc($query);
        $codigo = $row['$codigoTipoUsuario'];
        
        if($codigoTipoUsuario == "" || $codigoTipoUsuario == null){
            echo "<script type='text/javascript'>alert('Selecione o tipo do usuário');location.href='cadastroTipoUsuario.html';</script>";
        }else{
        if($descricaoTipoUsuario == "" || $descricaoTipoUsuario == null){
            echo "<script type='text/javascript'>alert('Descreva o tipo de usuário que será cadastrado');location.href='cadastroTipoUsuario.html';</script>";
        }else{
        if($codigo == $codigoTipoUsuario){
            echo "<script type='text/javascript'>alert('Este código já encontrasse cadastrado');location.href='cadastroTipoUsuario.html'</script>";            
        }else{
            $insert = "INSERT INTO tipoUsuario(codigoTipoUsuario, descricaoTipoUsuario) VALUES('$codigoTipoUsuario', '$descricaoTipoUsuario')";
	$result = mysqli_query($conn,$insert) or die("Falha no cadastro do tipo de usuário. " . mysqli_error($conn));

        if($result){
            echo "<script type='text/javascript'>alert('Cadastro concluído com sucesso!');location.href='cadastroTipoUsuario.html';</script>";    
        }else{
            echo "<script type='text/javascript'>alert('Não foi possível concluir o cadastro')</script>";
        }
        }
        }
        }
        mysqli_close($conn);
        }
