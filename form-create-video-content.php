<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Cadastrar Vídeo</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="courses">Cursos</a>
            </li>
            <li class="breadcrumb-item">Cadastrar Vídeo</li> 
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">

                <?php 

                    if($erro_cadastro_video == 1) { 

                ?>

                    <div class="alert alert-danger alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        Apenas um dos campos direcionados ao cadastro do vídeo deve ser preenchido.
                    </div>

                <?php

                    }

                    if($erro_cadastro_video == 2) {

                ?>

                    <div class="alert alert-danger alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        É necessário selecionar um módulo para cadastrar um vídeo.
                    </div>

                <?php 
                
                    }

                    if($erro_cadastro_video == 3) {
                
                ?>

                    <div class="alert alert-danger alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        Para cadastrar um link é necessário disponibilizar o endereço URL completo. Exemplo: https://www.link.com.br.
                    </div>

                <?php 
                
                    }
                
                ?>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <form class="form-horizontal" action="create-video" enctype="multipart/form-data" method="post"> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Curso</label>
                                <div class="col-sm-10">
                                    <?php echo ucwords($titulo); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Título do Vídeo</label>
                                <div class="col-sm-10">
                                    <input name="titulo-video" class="form-control" type="text" placeholder="Digite o título do vídeo" maxlength="100" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Módulo</label>
                                <div class="col-sm-10">
                                    <select name="modulo" class="form-control" size="1" required>
                                        <option selected value="0">Selecione um módulo</option>

                                        <?php 
                                        
                                            $lista_modulos = new GerenciarModulo();
                                            $lista_modulos = $lista_modulos -> gerarListaModulosPorCodigoCurso($cod_curso);

                                            echo $lista_modulos;
                                        
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Enviar Arquivo</label>
                                <div class="col-sm-10">
                                    <input type="file" id="send-file-upload" name="send-file-upload" accept="video/*">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Ou</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Link do Vídeo</label>
                                <div class="col-sm-10">
                                    <input name="send-video-link" class="form-control" type="text" placeholder="Insira o link do vídeo" maxlength="2000">
                                </div>
                            </div>
                            <input type="hidden" name="cod-course" value="<?php echo $cod_curso; ?>">
                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <button class="btn btn-info" type="submit">Cadastrar</button>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>