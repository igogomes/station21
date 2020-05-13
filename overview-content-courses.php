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