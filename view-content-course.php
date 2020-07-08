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
                        Sua avaliação para este curso foi atualizada com <strong>sucesso</strong>.
                    </div>

            <?php 

                }

                if($classificao_curso_usuario == 1 && $sucesso_classificao_curso_usuario == 1) {

            ?>

                    <div class="alert alert-success alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        Sua avaliação para este curso foi cadastrada com <strong>sucesso</strong>.
                    </div>

            <?php

                }

                $obter_presenca_curso = new GerenciarPresenca();
                $obter_presenca_curso = $obter_presenca_curso -> getPresencaPorCodigoUsuarioECodigoCurso($cod_usuario, $cod_curso);

                $obter_nota_curso = new GerenciarNota();
                $obter_nota_curso = $obter_nota_curso -> getNotaCurso($cod_usuario, $cod_curso);

                if($obter_presenca_curso == "100%" && $obter_nota_curso < 70) {

            ?>

                    <div class="alert alert-warning alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        Obtenha a nota mínima para adquirir o certificado deste curso.
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
                            <div class="col-sm-2">
                                <?php echo utf8_encode($instrutor_curso); ?>
                            </div>

                            <?php 
                            
                                if($obter_presenca_curso == "100%" && $obter_nota_curso >= 70) {
                            
                            ?>

                                <div class="col-sm-8 col-form-label" style="text-align: right;">
                                    <form action="classify-course" method="POST">
                                        <ul style="list-style: none; display: inline-flex; padding-left: 0;">
                                            <li>
                                                <span style="padding-right: 20px;">Avalie o curso</span>
                                            </li>
                                            <li>
                                                <span style="margin-right: 15px">
                                                    <input type="text" name="description-grade" placeholder="Insira seu depoimento..." required>
                                                </span>
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

                            <?php 
                            
                                }
                            
                            ?>

                            <div class="col-sm-12">
                                Status: <?php 
                                
                                    echo $obter_presenca_curso;

                                ?> Concluído
                            </div>

                            <?php 
                            
                                if($obter_presenca_curso == "100%" && $obter_nota_curso >= 70) {
                            
                            ?>

                                <div class="col-sm-12" style="margin-top: 30px;">
                                    <form action="generate-certification" method="post">
                                        <input type="hidden" name="cod-course" value="<?php echo $cod_curso; ?>"/>
                                        <input type="hidden" name="cod-user" value="<?php echo $cod_usuario; ?>"/> 
                                        <button class="btn btn-success">Emitir Certificado</button>
                                    </form>
                                </div>

                            <?php 
                            
                                }
                            
                            ?>

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

                                            <?php 
                                            
                                                if($lista_videos_modulo_curso_01 != "<table style=\"width: 100%;\"></table>") {
                                            
                                            ?>

                                                    <strong>Vídeos</strong>
                                                    <br>
                                                    <br>
                                                    <?php echo $lista_videos_modulo_curso_01; ?>
                                                    <br>
                                                    <br>

                                            <?php 
                                            
                                                }

                                                if($lista_textos_modulo_curso_01 != "<table style=\"width: 100%;\"></table>") {
                                            
                                            ?>
                                            
                                                    <strong>Textos</strong>
                                                    <br>
                                                    <br>
                                                    <?php echo $lista_textos_modulo_curso_01; ?>
                                                    <br>
                                                    <br>

                                            <?php 
                                            
                                                }

                                                if($lista_arquivos_modulo_curso_01 != "<table style=\"width: 100%;\"></table>") {
                                            
                                            ?>

                                                    <strong>Arquivos</strong>
                                                    <br>
                                                    <br> 
                                                    <?php echo $lista_arquivos_modulo_curso_01; ?>
                                                    <br>
                                                    <br>

                                            <?php 
                                            
                                                }

                                                if($lista_links_modulo_curso_01 != "<table style=\"width: 100%;\"></table>") {
                                            
                                            ?>

                                                    <strong>Links</strong>
                                                    <br>
                                                    <br>
                                                    <?php echo $lista_links_modulo_curso_01; ?>
                                                    <br>
                                                    <br>

                                            <?php 
                                            
                                                }

                                                if($lista_exercicios_modulo_curso_01 != "<table style=\"width: 100%;\"></table>") {
                                            
                                            ?>

                                                    <strong>Exercício Avaliativo</strong>
                                                    <br>
                                                    <br>
                                                    <?php echo $lista_exercicios_modulo_curso_01; ?>

                                            <?php 
                                        
                                                } 
                                                
                                            ?>
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

                                            <?php 
                                            
                                                if($lista_videos_modulo_curso_02 != "<table style=\"width: 100%;\"></table>") {
                                            
                                            ?>

                                                    <strong>Vídeos</strong>
                                                    <br>
                                                    <br>
                                                    <?php echo $lista_videos_modulo_curso_02; ?>
                                                    <br>
                                                    <br>

                                            <?php 
                                            
                                                }

                                                if($lista_textos_modulo_curso_02 != "<table style=\"width: 100%;\"></table>") {
                                            
                                            ?>

                                                    <strong>Textos</strong>
                                                    <br>
                                                    <br>
                                                    <?php echo $lista_textos_modulo_curso_02; ?>
                                                    <br>
                                                    <br>

                                            <?php 
                                            
                                                }

                                                if($lista_arquivos_modulo_curso_02 != "<table style=\"width: 100%;\"></table>") {
                                            
                                            ?>
                                            
                                                    <strong>Arquivos</strong>
                                                    <br>
                                                    <br> 
                                                    <?php echo $lista_arquivos_modulo_curso_02; ?>
                                                    <br>
                                                    <br>

                                            <?php 
                                            
                                                }

                                                if($lista_links_modulo_curso_02 != "<table style=\"width: 100%;\"></table>") {
                                            
                                            ?>

                                                    <strong>Links</strong>
                                                    <br>
                                                    <br>
                                                    <?php echo $lista_links_modulo_curso_02; ?>
                                                    <br>
                                                    <br>

                                            <?php 
                                            
                                                }

                                                if($lista_exercicios_modulo_curso_02 != "<table style=\"width: 100%;\"></table>") {
                                            
                                            ?>
                                            
                                                    <strong>Exercício Avaliativo</strong>
                                                    <br>
                                                    <br>
                                                    <?php echo $lista_exercicios_modulo_curso_02; ?>

                                            <?php 
                                            
                                                }
                                            
                                            ?>
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

                                            <?php 
                                            
                                                if($lista_videos_modulo_curso_03 != "<table style=\"width: 100%;\"></table>") {
                                            
                                            ?>

                                                    <strong>Vídeos</strong>
                                                    <br>
                                                    <br>
                                                    <?php echo $lista_videos_modulo_curso_03; ?>
                                                    <br>
                                                    <br>

                                            <?php 
                                            
                                                }

                                                if($lista_textos_modulo_curso_03 != "<table style=\"width: 100%;\"></table>") {
                                            
                                            ?>

                                                    <strong>Textos</strong>
                                                    <br>
                                                    <br>
                                                    <?php echo $lista_textos_modulo_curso_03; ?>
                                                    <br>
                                                    <br>

                                            <?php 
                                            
                                                }

                                                if($lista_arquivos_modulo_curso_03 != "<table style=\"width: 100%;\"></table>") {
                                            
                                            ?>

                                                    <strong>Arquivos</strong>
                                                    <br>
                                                    <br> 
                                                    <?php echo $lista_arquivos_modulo_curso_03; ?>
                                                    <br>
                                                    <br>

                                            <?php 
                                            
                                                }

                                                if($lista_links_modulo_curso_03 != "<table style=\"width: 100%;\"></table>") {
                                            
                                            ?>

                                                    <strong>Links</strong>
                                                    <br>
                                                    <br>
                                                    <?php echo $lista_links_modulo_curso_03; ?>
                                                    <br>
                                                    <br>

                                            <?php 
                                            
                                                }

                                                if($lista_exercicios_modulo_curso_03 != "<table style=\"width: 100%;\"></table>") {
                                            
                                            ?>

                                                    <strong>Exercício Avaliativo</strong>
                                                    <br>
                                                    <br>
                                                    <?php echo $lista_exercicios_modulo_curso_03; ?>

                                            <?php 
                                            
                                                }
                                            
                                            ?>

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

                                            <?php 
                                            
                                                if($lista_videos_modulo_curso_04 != "<table style=\"width: 100%;\"></table>") {
                                            
                                            ?>

                                                    <strong>Vídeos</strong>
                                                    <br>
                                                    <br>
                                                    <?php echo $lista_videos_modulo_curso_04; ?>
                                                    <br>
                                                    <br>

                                            <?php 
                                            
                                                }

                                                if($lista_textos_modulo_curso_04 != "<table style=\"width: 100%;\"></table>") {
                                            
                                            ?>

                                                    <strong>Textos</strong>
                                                    <br>
                                                    <br>
                                                    <?php echo $lista_textos_modulo_curso_04; ?>
                                                    <br>
                                                    <br>

                                            <?php 
                                            
                                                }

                                                if($lista_arquivos_modulo_curso_04 != "<table style=\"width: 100%;\"></table>") {
                                            
                                            ?>

                                                    <strong>Arquivos</strong>
                                                    <br>
                                                    <br> 
                                                    <?php echo $lista_arquivos_modulo_curso_04; ?>
                                                    <br>
                                                    <br>

                                            <?php 
                                            
                                                }

                                                if($lista_links_modulo_curso_04 != "<table style=\"width: 100%;\"></table>") {
                                            
                                            ?>

                                                    <strong>Links</strong>
                                                    <br>
                                                    <br>
                                                    <?php echo $lista_links_modulo_curso_04; ?>
                                                    <br>
                                                    <br>

                                            <?php 
                                            
                                                }

                                                if($lista_exercicios_modulo_curso_04 != "<table style=\"width: 100%;\"></table>") {
                                            
                                            ?>

                                                    <strong>Exercício Avaliativo</strong>
                                                    <br>
                                                    <br>
                                                    <?php echo $lista_exercicios_modulo_curso_04; ?>

                                            <?php 
                                            
                                                }
                                            
                                            ?>
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
                                            <?php 

                                                if($obter_presenca_curso == "100%") {
                                            
                                                    if($lista_prova_curso == "<table style=\"width: 100%;\"></table>") { echo "Não existe prova cadastrada para este curso.<br>"; } else { echo $lista_prova_curso; }; 
                                                
                                                }

                                                else {

                                                    echo "Finalize as atividades do curso para realizar a prova.";

                                                }

                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>