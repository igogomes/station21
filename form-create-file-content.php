<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Cadastrar Arquivo</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="./">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="courses">Cursos</a>
            </li>
            <li class="breadcrumb-item">Cadastrar Arquivo</li> 
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">

                <?php 

                    if($erro_cadastro_arquivo == 1) {

                ?>

                    <div class="alert alert-danger alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        É necessário enviar um arquivo válido para realizar o cadastro.
                    </div>

                <?php 
                
                    }

                    if($erro_cadastro_arquivo == 2) {
                
                ?>

                    <div class="alert alert-danger alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        É necessário selecionar um módulo para cadastrar um arquivo.
                    </div>  

                <?php 
                
                    }

                    if($erro_cadastro_arquivo == 3) {
                
                ?>

                    <div class="alert alert-danger alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        Para cadastrar vídeos, <a href="create-video-content?cod-course=<?php echo $cod_curso; ?>">clique aqui</a>.
                    </div>   

                <?php 
                
                    }

                    if($erro_cadastro_arquivo == 4) {
                
                ?>

                    <div class="alert alert-danger alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        O formato do arquivo não é adequado para upload.
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
                        <form class="form-horizontal" action="create-file" enctype="multipart/form-data" method="post"> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Curso</label>
                                <div class="col-sm-10">
                                    <?php echo ucwords($titulo); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Título do Arquivo</label>
                                <div class="col-sm-10">
                                    <input name="titulo-arquivo" class="form-control" type="text" placeholder="Digite o título do arquivo" maxlength="100" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Módulo</label>
                                <div class="col-sm-10">
                                    <select name="modulo" class="form-control" size="1" required>
                                        <option value="" selected>Selecione um módulo</option>

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
                                    <input type="file" id="send-file-upload" name="send-file-upload">
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