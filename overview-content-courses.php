<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title"><?php echo $titulo_curso; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="./">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="courses">Cursos</a>
            </li>
            <li class="breadcrumb-item"><?php echo $titulo_curso; ?></li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">

                <?php 

                    if($cod_conteudo_excluir != "" && $tipo_conteudo_excluir == 1 && $sucesso_excluir_conteudo == "") {

                ?>

                    <div class="alert alert-danger alert-dismissable fade show">
                        <a href="overview-course?cod-course=<?php echo $cod_curso; ?>" class="close" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </a>
                        <h4>Atenção!</h4>
                        <p>Você realmente deseja excluir o vídeo <strong><?php echo $titulo_conteudo_excluir; ?></strong>?</p>
                        <p>
                            <a href="contents?cod-course=<?php echo $cod_curso; ?>&cod-delete-content=<?php echo $cod_conteudo_excluir; ?>&type-content=<?php echo $tipo_conteudo_excluir; ?>&delete-content=1" class="btn btn-danger" style="color:#fff;">Sim</a>
                            <a href="overview-course?cod-course=<?php echo $cod_curso; ?>" class="btn btn-default" style="color:#000;">Não</a>
                        </p>
                    </div>

                <?php

                    } 

                    if($cod_conteudo_excluir != "" && $tipo_conteudo_excluir == 1 && $sucesso_excluir_conteudo == 1) {

                ?>

                    <div class="alert alert-success alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        O vídeo foi excluído com <strong>sucesso</strong>.
                    </div>

                <?php 
                
                    }

                    if($cod_conteudo_excluir != "" && $tipo_conteudo_excluir == 2 && $sucesso_excluir_conteudo == "") {
                
                ?>

                    <div class="alert alert-danger alert-dismissable fade show">
                        <a href="overview-course?cod-course=<?php echo $cod_curso; ?>" class="close" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </a>
                        <h4>Atenção!</h4>
                        <p>Você realmente deseja excluir o texto <strong><?php echo $titulo_conteudo_excluir; ?></strong>?</p>
                        <p>
                            <a href="contents?cod-course=<?php echo $cod_curso; ?>&cod-delete-content=<?php echo $cod_conteudo_excluir; ?>&type-content=<?php echo $tipo_conteudo_excluir; ?>&delete-content=1" class="btn btn-danger" style="color:#fff;">Sim</a>
                            <a href="overview-course?cod-course=<?php echo $cod_curso; ?>" class="btn btn-default" style="color:#000;">Não</a>
                        </p>
                    </div>

                <?php 
                
                    }

                    if($cod_conteudo_excluir != "" && $tipo_conteudo_excluir == 2 && $sucesso_excluir_conteudo == 1) {
                
                ?>

                    <div class="alert alert-success alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        O texto foi excluído com <strong>sucesso</strong>.
                    </div>  

                <?php 
            
                    }

                    if($cod_conteudo_excluir != "" && $tipo_conteudo_excluir == 3 && $sucesso_excluir_conteudo == "") {
                    
                ?>

                    <div class="alert alert-danger alert-dismissable fade show">
                        <a href="overview-course?cod-course=<?php echo $cod_curso; ?>" class="close" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </a>
                        <h4>Atenção!</h4>
                        <p>Você realmente deseja excluir o arquivo <strong><?php echo $titulo_conteudo_excluir; ?></strong>?</p>
                        <p>
                            <a href="contents?cod-course=<?php echo $cod_curso; ?>&cod-delete-content=<?php echo $cod_conteudo_excluir; ?>&type-content=<?php echo $tipo_conteudo_excluir; ?>&delete-content=1" class="btn btn-danger" style="color:#fff;">Sim</a>
                            <a href="overview-course?cod-course=<?php echo $cod_curso; ?>" class="btn btn-default" style="color:#000;">Não</a>
                        </p>
                    </div> 

                <?php 
            
                    } 
                    
                    if($cod_conteudo_excluir != "" && $tipo_conteudo_excluir == 3 && $sucesso_excluir_conteudo == 1) {
                    
                ?>

                    <div class="alert alert-success alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        O arquivo foi excluído com <strong>sucesso</strong>.
                    </div>                         

                <?php 
                
                    }
                    
                    if($cod_conteudo_excluir != "" && $tipo_conteudo_excluir == 4 && $sucesso_excluir_conteudo == "") {
                    
                ?>

                    <div class="alert alert-danger alert-dismissable fade show">
                        <a href="overview-course?cod-course=<?php echo $cod_curso; ?>" class="close" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </a>
                        <h4>Atenção!</h4>
                        <p>Você realmente deseja excluir o link <strong><?php echo $titulo_conteudo_excluir; ?></strong>?</p>
                        <p>
                            <a href="contents?cod-course=<?php echo $cod_curso; ?>&cod-delete-content=<?php echo $cod_conteudo_excluir; ?>&type-content=<?php echo $tipo_conteudo_excluir; ?>&delete-content=1" class="btn btn-danger" style="color:#fff;">Sim</a>
                            <a href="overview-course?cod-course=<?php echo $cod_curso; ?>" class="btn btn-default" style="color:#000;">Não</a>
                        </p>
                    </div>

                <?php 
                
                    }

                    if($cod_conteudo_excluir != "" && $tipo_conteudo_excluir == 4 && $sucesso_excluir_conteudo == 1) {
                    
                ?>

                    <div class="alert alert-success alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        O link foi excluído com <strong>sucesso</strong>.
                    </div>        

                <?php 
            
                    } 

                    if($cod_exercicio_excluir != "" && $tipo_conteudo_excluir == 5 && $tipo_avaliacao_excluir == 1 && $sucesso_excluir_conteudo == "") {
                    
                ?>

                    <div class="alert alert-danger alert-dismissable fade show">
                        <a href="overview-course?cod-course=<?php echo $cod_curso; ?>" class="close" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </a>
                        <h4>Atenção!</h4>
                        <p>Você realmente deseja excluir o exercício?</p>
                        <p>
                            <a href="contents?cod-course=<?php echo $cod_curso; ?>&cod-delete-exercise=<?php echo $cod_exercicio_excluir; ?>&type-evaluation=1&type-content=<?php echo $tipo_conteudo_excluir; ?>&delete-content=1" class="btn btn-danger" style="color:#fff;">Sim</a>
                            <a href="overview-course?cod-course=<?php echo $cod_curso; ?>" class="btn btn-default" style="color:#000;">Não</a>
                        </p>
                    </div>

                <?php 
                
                    }

                    if($cod_exercicio_excluir != "" && $tipo_conteudo_excluir == 5 && $tipo_avaliacao_excluir == 1 && $sucesso_excluir_conteudo == 1) {
                
                ?>

                    <div class="alert alert-success alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        O exercício foi excluído com <strong>sucesso</strong>.
                    </div>  

                <?php 
            
                    }

                    if($cod_prova_excluir != "" && $tipo_conteudo_excluir == 5 && $tipo_avaliacao_excluir == 2 && $sucesso_excluir_conteudo == "") {
                    
                ?>

                    <div class="alert alert-danger alert-dismissable fade show">
                        <a href="overview-course?cod-course=<?php echo $cod_curso; ?>" class="close" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </a>
                        <h4>Atenção!</h4>
                        <p>Você realmente deseja excluir a prova?</p>
                        <p>
                            <a href="contents?cod-course=<?php echo $cod_curso; ?>&cod-delete-test=<?php echo $cod_prova_excluir; ?>&type-evaluation=2&type-content=<?php echo $tipo_conteudo_excluir; ?>&delete-content=1" class="btn btn-danger" style="color:#fff;">Sim</a>
                            <a href="overview-course?cod-course=<?php echo $cod_curso; ?>" class="btn btn-default" style="color:#000;">Não</a>
                        </p>
                    </div>

                <?php 
            
                    }

                    if($cod_prova_excluir != "" && $tipo_conteudo_excluir == 5 && $tipo_avaliacao_excluir == 2 && $sucesso_excluir_conteudo == 1) {
                    
                ?>

                    <div class="alert alert-success alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        A prova foi excluída com <strong>sucesso</strong>.
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
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Título</label>
                            <div class="col-sm-10">
                                <?php echo $titulo_curso; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Instrutor</label>
                            <div class="col-sm-10">
                                <?php echo utf8_encode($instrutor_curso); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-4">
                                <?php echo  utf8_encode($status); ?>
                            </div>
                            <label class="col-sm-1 col-form-label">Categoria</label>
                            <div class="col-sm-5">
                                <?php echo utf8_encode($categoria); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <br>
                                <h4 class="page-title">Conteúdo</h4>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="ibox" style="border: 1px solid #eee; -webkit-box-shadow: none; box-shadow: none;">
                                    <div class="ibox-head">
                                        <div class="ibox-title">Apresentação</div>
                                        <div class="ibox-tools">
                                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                        </div>
                                    </div>
                                    <div class="ibox-body">
                                        <?php echo $apresentacao; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="ibox" style="border: 1px solid #eee; -webkit-box-shadow: none; box-shadow: none;">
                                    <div class="ibox-head">
                                        <div class="ibox-title">Módulo 01</div>
                                            <div class="ibox-tools">
                                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                            </div>
                                        </div>
                                        <div class="ibox-body">
                                            <strong>Vídeos</strong>
                                            <br>
                                            <br>
                                            <?php if($lista_videos_modulo_curso_01 == "<table style=\"width: 100%;\"></table>") { echo "Não existem vídeos cadastrados para este módulo.<br>"; } else { echo $lista_videos_modulo_curso_01; }; ?>
                                            <br>
                                            <br>
                                            <strong>Textos</strong>
                                            <br>
                                            <br>
                                            <?php if($lista_textos_modulo_curso_01 == "<table style=\"width: 100%;\"></table>") { echo "Não existem textos cadastrados para este módulo.<br>"; } else { echo $lista_textos_modulo_curso_01; }; ?>
                                            <br>
                                            <br>
                                            <strong>Arquivos</strong>
                                            <br>
                                            <br> 
                                            <?php if($lista_arquivos_modulo_curso_01 == "<table style=\"width: 100%;\"></table>") { echo "Não existem textos cadastrados para este módulo.<br>"; } else { echo $lista_arquivos_modulo_curso_01; }; ?>
                                            <br>
                                            <br>
                                            <strong>Links</strong>
                                            <br>
                                            <br>
                                            <?php if($lista_links_modulo_curso_01 == "<table style=\"width: 100%;\"></table>") { echo "Não existem links cadastrados para este módulo.<br>"; } else { echo $lista_links_modulo_curso_01; }; ?>
                                            <br>
                                            <br>
                                            <strong>Exercício Avaliativo</strong>
                                            <br>
                                            <br>
                                            <?php if($lista_exercicios_modulo_curso_01 == "<table style=\"width: 100%;\"></table>") { echo "Não existem exercícios cadastrados para este módulo.<br>"; } else { echo $lista_exercicios_modulo_curso_01; }; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="ibox" style="border: 1px solid #eee; -webkit-box-shadow: none; box-shadow: none;">
                                        <div class="ibox-head">
                                            <div class="ibox-title">Módulo 02</div>
                                            <div class="ibox-tools">
                                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                            </div>
                                        </div>
                                        <div class="ibox-body">
                                            <strong>Vídeos</strong>
                                            <br>
                                            <br>
                                            <?php if($lista_videos_modulo_curso_02 == "<table style=\"width: 100%;\"></table>") { echo "Não existem vídeos cadastrados para este módulo.<br>"; } else { echo $lista_videos_modulo_curso_02; }; ?>
                                            <br>
                                            <br>
                                            <strong>Textos</strong>
                                            <br>
                                            <br>
                                            <?php if($lista_textos_modulo_curso_02 == "<table style=\"width: 100%;\"></table>") { echo "Não existem textos cadastrados para este módulo.<br>"; } else { echo $lista_textos_modulo_curso_02; }; ?>
                                            <br>
                                            <br>
                                            <strong>Arquivos</strong>
                                            <br>
                                            <br> 
                                            <?php if($lista_arquivos_modulo_curso_02 == "<table style=\"width: 100%;\"></table>") { echo "Não existem textos cadastrados para este módulo.<br>"; } else { echo $lista_arquivos_modulo_curso_02; }; ?>
                                            <br>
                                            <br>
                                            <strong>Links</strong>
                                            <br>
                                            <br>
                                            <?php if($lista_links_modulo_curso_02 == "<table style=\"width: 100%;\"></table>") { echo "Não existem links cadastrados para este módulo.<br>"; } else { echo $lista_links_modulo_curso_02; }; ?>
                                            <br>
                                            <br>
                                            <strong>Exercício Avaliativo</strong>
                                            <br>
                                            <br>
                                            <?php if($lista_exercicios_modulo_curso_02 == "<table style=\"width: 100%;\"></table>") { echo "Não existem exercícios cadastrados para este módulo.<br>"; } else { echo $lista_exercicios_modulo_curso_02; }; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="ibox" style="border: 1px solid #eee; -webkit-box-shadow: none; box-shadow: none;">
                                        <div class="ibox-head">
                                            <div class="ibox-title">Módulo 03</div>
                                            <div class="ibox-tools">
                                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                            </div>
                                        </div>
                                        <div class="ibox-body">
                                            <strong>Vídeos</strong>
                                            <br>
                                            <br>
                                            <?php if($lista_videos_modulo_curso_03 == "<table style=\"width: 100%;\"></table>") { echo "Não existem vídeos cadastrados para este módulo.<br>"; } else { echo $lista_videos_modulo_curso_03; }; ?>
                                            <br>
                                            <br>
                                            <strong>Textos</strong>
                                            <br>
                                            <br>
                                            <?php if($lista_textos_modulo_curso_03 == "<table style=\"width: 100%;\"></table>") { echo "Não existem textos cadastrados para este módulo.<br>"; } else { echo $lista_textos_modulo_curso_03; }; ?>
                                            <br>
                                            <br>
                                            <strong>Arquivos</strong>
                                            <br>
                                            <br> 
                                            <?php if($lista_arquivos_modulo_curso_03 == "<table style=\"width: 100%;\"></table>") { echo "Não existem textos cadastrados para este módulo.<br>"; } else { echo $lista_arquivos_modulo_curso_03; }; ?>
                                            <br>
                                            <br>
                                            <strong>Links</strong>
                                            <br>
                                            <br>
                                            <?php if($lista_links_modulo_curso_03 == "<table style=\"width: 100%;\"></table>") { echo "Não existem links cadastrados para este módulo.<br>"; } else { echo $lista_links_modulo_curso_03; }; ?>
                                            <br>
                                            <br>
                                            <strong>Exercício Avaliativo</strong>
                                            <br>
                                            <br>
                                            <?php if($lista_exercicios_modulo_curso_03 == "<table style=\"width: 100%;\"></table>") { echo "Não existem exercícios cadastrados para este módulo.<br>"; } else { echo $lista_exercicios_modulo_curso_03; }; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="ibox" style="border: 1px solid #eee; -webkit-box-shadow: none; box-shadow: none;">
                                        <div class="ibox-head">
                                            <div class="ibox-title">Módulo 04</div>
                                            <div class="ibox-tools">
                                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                            </div>
                                        </div>
                                        <div class="ibox-body">
                                            <strong>Vídeos</strong>
                                            <br>
                                            <br>
                                            <?php if($lista_videos_modulo_curso_04 == "<table style=\"width: 100%;\"></table>") { echo "Não existem vídeos cadastrados para este módulo.<br>"; } else { echo $lista_videos_modulo_curso_04; }; ?>
                                            <br>
                                            <br>
                                            <strong>Textos</strong>
                                            <br>
                                            <br>
                                            <?php if($lista_textos_modulo_curso_04 == "<table style=\"width: 100%;\"></table>") { echo "Não existem textos cadastrados para este módulo.<br>"; } else { echo $lista_textos_modulo_curso_04; }; ?>
                                            <br>
                                            <br>
                                            <strong>Arquivos</strong>
                                            <br>
                                            <br> 
                                            <?php if($lista_arquivos_modulo_curso_04 == "<table style=\"width: 100%;\"></table>") { echo "Não existem textos cadastrados para este módulo.<br>"; } else { echo $lista_arquivos_modulo_curso_04; }; ?>
                                            <br>
                                            <br>
                                            <strong>Links</strong>
                                            <br>
                                            <br>
                                            <?php if($lista_links_modulo_curso_04 == "<table style=\"width: 100%;\"></table>") { echo "Não existem links cadastrados para este módulo.<br>"; } else { echo $lista_links_modulo_curso_04; }; ?>
                                            <br>
                                            <br>
                                            <strong>Exercício Avaliativo</strong>
                                            <br>
                                            <br>
                                            <?php if($lista_exercicios_modulo_curso_04 == "<table style=\"width: 100%;\"></table>") { echo "Não existem exercícios cadastrados para este módulo.<br>"; } else { echo $lista_exercicios_modulo_curso_04; }; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="ibox" style="border: 1px solid #eee; -webkit-box-shadow: none; box-shadow: none;">
                                        <div class="ibox-head">
                                            <div class="ibox-title">Prova</div>
                                            <div class="ibox-tools">
                                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                            </div>
                                        </div>
                                        <div class="ibox-body">
                                            <?php if($lista_prova_curso == "<table style=\"width: 100%;\"></table>") { echo "Não existe prova cadastrada para este curso.<br>"; } else { echo $lista_prova_curso; }; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>