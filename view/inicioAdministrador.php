<?php require_once 'includes/cabecalhocss.php'; ?>
    
    <body class="#37474f blue-grey darken-3">   
        <div class="valign-wrapper container row formulario">
            <div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
                
                <h2>Início Administrador</h2>
                <ul class="collection with-header">                    
                    <li class="collection-item left-align"><div>Cadastrar turma<a href="cadastrarTurma.php" class="secondary-content"><i class="material-icons left-align">send</i></a></div></li>
                    <li class="collection-item left-align"><div>Cadastrar aluno<a href="cadastrarAluno.php" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item left-align"><div>Cadastar período<a href="cadastrarPeriodo.php" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item left-align"><div>Cadastrar disciplina<a href="cadastrarDisciplina.php" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item left-align"><div>Cadastrar professor<a href="cadastrarProfessor.php" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item left-align"><div>Cadastrar tipo de usuário<a href="cadastrarTipoUsuario.php" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                </ul>
                    <div class="row col s4 left-align">
                        <button class="btn waves-effect waves-ligth" type='button' value='Sair' class="botao" onclick="location.href='index.php'">Sair</button>
                    </div>		
            </div>
        </div>
<?php require_once 'includes/rodapecss.php'; ?>
