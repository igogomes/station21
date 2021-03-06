<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Cadastrar Conteúdo</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="./">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="courses">Cursos</a>
            </li>
            <li class="breadcrumb-item">Cadastrar Conteúdo</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <form class="form-horizontal" action="create-content" method="post"> 
                            <div class="form-group row">

                                <?php if($titulo_criacao_conteudo != "") { ?>

                                    <label class="col-sm-2 col-form-label">Curso</label>
                                    <div class="col-sm-10">
                                        <?php echo ucwords($titulo_criacao_conteudo); ?> 
                                    </div>

                                <?php 
                            
                                    }

                                    else { 
                                    
                                ?>

                                    <label class="col-sm-2 col-form-label">Curso</label>
                                        <div class="col-sm-10">
                                            <?php echo ucwords($titulo); ?> 
                                        </div>

                                    <?php 
                                
                                    }
                                
                                ?>

                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">

                                    <?php 

                                        if($tipo_conteudo == 1 && $sucesso_criacao_conteudo == 1) {

                                    ?>

                                        <div class="alert alert-success alert-dismissable fade show">
                                            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            O vídeo foi cadastrado com <strong>sucesso</strong>.
                                        </div>

                                    <?php

                                        }

                                        else if($tipo_conteudo == 2 && $sucesso_criacao_conteudo == 1) {

                                    ?>

                                        <div class="alert alert-success alert-dismissable fade show">
                                            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            O texto foi cadastrado com <strong>sucesso</strong>.
                                        </div>

                                    <?php 
                                    
                                        }

                                        else if($tipo_conteudo == 3 && $sucesso_criacao_conteudo == 1) {
                                    
                                    ?>

                                        <div class="alert alert-success alert-dismissable fade show">
                                            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            O arquivo foi cadastrado com <strong>sucesso</strong>.
                                        </div>

                                    <?php 

                                        }

                                        else if($tipo_conteudo == 4 && $sucesso_criacao_conteudo == 1) {

                                    ?>

                                        <div class="alert alert-success alert-dismissable fade show">
                                            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            O link foi cadastrado com <strong>sucesso</strong>.
                                        </div>

                                    <?php 
                                    
                                        }

                                        else if($tipo_conteudo == 5 && $sucesso_criacao_conteudo == 1) {
                                    
                                    ?>

                                        <div class="alert alert-success alert-dismissable fade show">
                                            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            A avaliação foi cadastrada com <strong>sucesso</strong>.
                                        </div>

                                    <?php 
                                    
                                        }

                                        else if($tipo_conteudo == 5 && $modulo_erro_criacao_conteudo != "" && $erro_criacao_conteudo == 1) {
                                    
                                    ?>

                                        <div class="alert alert-danger alert-dismissable fade show">
                                            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            Já existe exercício cadastrado para o <strong><?php echo $titulo_modulo; ?></strong> deste curso.
                                        </div>

                                    <?php 
                                    
                                        }

                                        else if($tipo_conteudo == 5 && $erro_criacao_conteudo == 2) {
                                    
                                    ?>

                                        <div class="alert alert-danger alert-dismissable fade show">
                                            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            Já existe prova cadastrada para este curso.
                                        </div>

                                    <?php 

                                        }

                                    ?>

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <br>
                                    <h4>Qual conteúdo deseja cadastrar?</h4>
                                    <br>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <br>
                                    <div class="create-content-buttons">
                                        <div class="content-button">
                                            <a href="create-video-content?cod-course=<?php if($cod_curso !="") { echo $cod_curso; } else if($cod_curso_edicao !="") { echo $cod_curso_edicao; } ?>" class="btn btn-primary btn-fix">Vídeo</a>
                                        </div>
                                        <div class="content-button">
                                            <a href="create-text-content?cod-course=<?php if($cod_curso !="") { echo $cod_curso; } else if($cod_curso_edicao !="") { echo $cod_curso_edicao; } ?>" class="btn btn-success btn-fix">Texto</a>
                                        </div>
                                        <div class="content-button">
                                            <a href="create-file-content?cod-course=<?php if($cod_curso !="") { echo $cod_curso; } else if($cod_curso_edicao !="") { echo $cod_curso_edicao; } ?>" class="btn btn-info btn-fix">Arquivo</a>
                                        </div>
                                        <div class="content-button">
                                            <a href="create-link-content?cod-course=<?php if($cod_curso !="") { echo $cod_curso; } else if($cod_curso_edicao !="") { echo $cod_curso_edicao; } ?>" class="btn btn-warning btn-fix">Link</a>
                                        </div>
                                        <div class="content-button">
                                            <a href="create-evaluation-content?cod-course=<?php if($cod_curso !="") { echo $cod_curso; } else if($cod_curso_edicao !="") { echo $cod_curso_edicao; } ?>" class="btn btn-danger btn-fix">Avaliação</a>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <br>
                                    <br>
                                    <div class="create-content-buttons">
                                        <div class="create-after">

                                            <?php 
                                            
                                                if($sucesso_criacao_conteudo == 1 || $edicao_curso == 1) {
                                            
                                            ?>

                                                <a href="courses" class="btn btn-info btn-fix">Cadastrar Depois</a>
                                        
                                            <?php 
                                            
                                                }

                                                else {
                                            
                                            ?>

                                                <a href="courses?cod-course-modify-status=<?php echo $cod_curso; ?>&modify-status=2" class="btn btn-info btn-fix">Cadastrar Depois</a>

                                            <?php 
                                            
                                                }
                                            
                                            ?>

                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>