<?php require_once 'includes/cabecalhocss.php'; ?>
    
    <body class="#37474f blue-grey darken-3">   
        <div class="valign-wrapper container row formulario">
            <div class="col s8 offset-s3 card center-align card-content #eceff1 blue-grey lighten-5">
                <h2>Início Administrador</h2>
                <ul>
                    <div class="row input-field col s12 left-align"/>
                        <li><a href='cadastrarTurma.php'><b>=> Cadastrar turma</b></a></li>
                    </div>                    

                    <div class="row input-field col s12 left-align"/>
                        <li><a href='cadastrarAluno.php'><b>=> Cadastrar aluno</b></a></li>
                    </div>

                    <div class="row input-field col s12 left-align"/>
                        <li><a href='cadastrarperiodo.php'><b>=> Cadastrar período</b></a></li>
                    </div>

                    <div class="row input-field col s12 left-align"/>
                        <li><a href=''><b>=> Cadastrar disciplina</b></a></li>
                    </div>

                    <div class="row input-field col s12 left-align"/>
                        <li><a href='cadastrarProfessor.php'><b>=> Cadastrar professor</b></a></li>
                    </div>

                    <div class="row input-field col s12 left-align"/>
                        <li><a href='cadastrarTipoUsuario.php'><b>=> Cadastrar tipo de usuário</b></a></li>
                    </div>
                    
                </ul>
                    <div class="row col s4 left-align">
                        <button class="btn waves-effect waves-ligth" type='button' value='Sair' class="botao" onclick="location.href='index.php'">Sair</button>
                    </div>		
            </div>
        </div>
<?php require_once 'includes/rodapecss.php'; ?>
