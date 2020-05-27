<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title"><?php echo utf8_encode($titulo_conteudo); ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="./">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="courses">Cursos</a>
            </li>
            <li class="breadcrumb-item">
                <a href="view-course?cod-course=<?php echo $cod_curso; ?>"><?php echo utf8_encode($titulo_curso); ?></a>
            </li>
            <li class="breadcrumb-item"><?php echo utf8_encode($titulo_conteudo); ?></li> 
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <div class="form-group row">
                            <div class="col-sm-12" style="display: flex; justify-content: center; padding-top: 50px; padding-bottom: 50px;">

                                <?php 

                                    if(strstr($arquivo_conteudo, 'youtube') && strstr($arquivo_conteudo, 'watch')) {

                                        $link_embed_youtube = new GerenciarConteudo();
                                        $link_embed_youtube = $link_embed_youtube -> gerarLinkVideoYouTube($arquivo_conteudo);

                                ?>

                                    <iframe width="640px" height="360px" src="<?php echo $link_embed_youtube; ?>" style="border: none;">
                                    </iframe>

                                <?php 
                                
                                    }

                                    else if(strstr($arquivo_conteudo, 'vimeo') && strstr($arquivo_conteudo, 'player') == false) {

                                        $link_embed_vimeo = new GerenciarConteudo();
                                        $link_embed_vimeo = $link_embed_vimeo -> gerarLinkVideoVimeo($arquivo_conteudo);

                                ?>

                                    <iframe width="840px" height="560px" src="<?php echo $link_embed_vimeo; ?>" style="border: none;">
                                    </iframe>

                                <?php

                                    }

                                    else if(strstr($arquivo_conteudo, 'http')) {
                                
                                ?>

                                    <a href="<?php echo $arquivo_conteudo; ?>" target="_blank" class="btn btn-success btn-fix btn-lg" style="margin-top: 30px;">Clique aqui para assistir o vídeo</a>

                                <?php 
                                
                                    }

                                    else {
                                
                                ?>

                                        <video width="640px" height="360px" controls="controls" style="border: none;">
                                            <source src="<?php echo $arquivo_conteudo; ?>">
                                        </video>   

                                <?php 
                                
                                    }
                                
                                ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 ml-sm-auto"> 
                                <a href="view-course?cod-course=<?php echo $cod_curso; ?>" class="btn btn-info" type="submit">Voltar</a>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>