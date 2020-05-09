<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Editar Link</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="./">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="courses">Cursos</a>
            </li>
            <li class="breadcrumb-item">Editar Link</li> 
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">

                <?php 

                    if($erro_editar_link == 1) {
                
                ?>

                    <div class="alert alert-danger alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        Para cadastrar um link é necessário disponibilizar o endereço URL completo. Exemplo: https://www.link.com.br.
                    </div>

                <?php 
                
                    }
            
                    if($tipo_conteudo_edicao == 4 && $edicao_conteudo == 1) {
                
                ?>
        
                    <div class="alert alert-success alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        O link foi cadastrado com <strong>sucesso</strong>.
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
                        <form class="form-horizontal" action="edit-link" enctype="multipart/form-data" method="post"> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Curso</label>
                                <div class="col-sm-10">
                                    <?php echo ucwords($titulo_curso); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Título do Link</label>
                                <div class="col-sm-10">
                                    <input name="titulo-link" class="form-control" type="text" placeholder="Digite o título do link" maxlength="100" value="<?php echo utf8_encode($titulo_conteudo); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Módulo</label>
                                <div class="col-sm-10">
                                    <?php 

                                        $titulo_modulo = new GerenciarModulo();
                                        $titulo_modulo = $titulo_modulo -> getTituloModuloPorCodigo($cod_modulo);

                                        echo $titulo_modulo;

                                    ?>
                                    <input type="hidden" name="modulo" value="<?php echo $cod_modulo; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Link</label>
                                <div class="col-sm-10">
                                    <input name="link" class="form-control" type="text" placeholder="Insira o link do vídeo. Exemplo: https://www.link.com.br" maxlength="2000" value="<?php echo $link_conteudo; ?>" required>
                                </div>
                            </div>
                            <input type="hidden" name="cod-content" value="<?php echo $cod_conteudo; ?>">
                            <div class="form-group row">
                                <div class="col-sm-12 ml-sm-auto">
                                    <button class="btn btn-info" type="submit">Cadastrar</button>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>