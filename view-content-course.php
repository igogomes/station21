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
    <div class="row">
        <div class="col-md-12">

            <?php 

                if($classificao_curso_usuario == 1 && $sucesso_classificao_curso_usuario == 2) { 

            ?>

                    <div class="alert alert-success alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        Sua classificação para este curso foi atualizada com <strong>sucesso</strong>.
                    </div>

            <?php 

                }

                if($classificao_curso_usuario == 1 && $sucesso_classificao_curso_usuario == 1) {

            ?>

                    <div class="alert alert-success alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        Sua classificação para este curso foi cadastrada com <strong>sucesso</strong>.
                    </div>

            <?php

                }

            ?>

        </div>
    </div>
    <div class="page-content fade-in-up" style="padding-top: 0 !important;">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Instrutor</label>
                            <div class="col-sm-4">
                                <?php echo utf8_encode($instrutor_curso); ?>
                            </div>
                            <div class="col-sm-6 col-form-label" style="text-align: right;">
                                <form action="classify-course" method="POST">
                                    <ul style="list-style: none; display: inline-flex;">
                                        <li>
                                            <span style="padding-right: 20px;">Avalie o curso</span>
                                        </li>
                                        <li>
                                            <input type="radio" id="one" name="grade" value="1" required>
                                        </li>
                                        <li>
                                            <label for="one" style="padding-left: 10px; padding-right: 10px;">1</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="two" name="grade" value="2">
                                        </li>
                                        <li>
                                            <label for="two" style="padding-left: 10px; padding-right: 10px;">2</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="three" name="grade" value="3">
                                        </li>
                                        <li>
                                            <label for="three" style="padding-left: 10px; padding-right: 10px;">3</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="four" name="grade" value="4">
                                        </li>
                                        <li>
                                            <label for="four" style="padding-left: 10px; padding-right: 10px;">4</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="five" name="grade" value="5">
                                        </li>
                                        <li>
                                            <label for="five" style="padding-left: 10px; padding-right: 10px;">5</label>
                                        </li>
                                        <input type="hidden" name="cod-course" value="<?php echo $cod_curso; ?>">
                                        <li>
                                            <button class="btn btn-success" style="margin-left: 20px; margin-top: -5px;">Avaliar</button> 
                                        </li>
                                    </ul>
                                </form>
                            </div>
                            <div class="col-sm-12">
                                Status 100% Concluído
                            </div>
                            <div class="col-sm-12" style="margin-top: 30px;">
                                <button class="btn btn-success">Emitir Certificado</button>
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