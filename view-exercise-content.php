<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Exercício</h1>
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
            <li class="breadcrumb-item">
                <?php echo $titulo_modulo; ?>
            </li>
            <li class="breadcrumb-item">Exercício</li> 
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <form action="finish-exercise" method="post">
                            <div class="form-group row">
                                <div class="col-sm-12 ml-sm-auto"> 
                                    <strong>Questão 01</strong>
                                </div>
                                <div class="col-sm-12 ml-sm-auto"> 
                                    <?php echo $enunciado_questao_01; ?> 
                                </div>
                                <div class="col-sm-12 ml-sm-auto">
                                    <ul style="list-style: none; margin-left: 0; padding-left: 0;">
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="one" name="<?php echo $cod_questao_01; ?>" value="1" required>
                                            <?php echo $primeira_alternativa_01; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="two" name="<?php echo $cod_questao_01; ?>" value="2">
                                            <?php echo $segunda_alternativa_01; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="three" name="<?php echo $cod_questao_01; ?>" value="3">
                                            <?php echo $terceira_alternativa_01; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 20px;">
                                            <input type="radio" id="four" name="<?php echo $cod_questao_01; ?>" value="4">
                                            <?php echo $quarta_alternativa_01; ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 ml-sm-auto"> 
                                    <strong>Questão 02</strong>
                                </div>
                                <div class="col-sm-12 ml-sm-auto"> 
                                    <?php echo $enunciado_questao_02; ?> 
                                </div>
                                <div class="col-sm-12 ml-sm-auto">
                                    <ul style="list-style: none; margin-left: 0; padding-left: 0;">
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="one" name="<?php echo $cod_questao_02; ?>" value="1" required>
                                            <?php echo $primeira_alternativa_02; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="two" name="<?php echo $cod_questao_02; ?>" value="2">
                                            <?php echo $segunda_alternativa_02; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="three" name="<?php echo $cod_questao_02; ?>" value="3">
                                            <?php echo $terceira_alternativa_02; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 20px;">
                                            <input type="radio" id="four" name="<?php echo $cod_questao_02; ?>" value="4">
                                            <?php echo $quarta_alternativa_02; ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 ml-sm-auto"> 
                                    <strong>Questão 03</strong>
                                </div>
                                <div class="col-sm-12 ml-sm-auto"> 
                                    <?php echo $enunciado_questao_03; ?> 
                                </div>
                                <div class="col-sm-12 ml-sm-auto">
                                    <ul style="list-style: none; margin-left: 0; padding-left: 0;">
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="one" name="<?php echo $cod_questao_03; ?>" value="1" required>
                                            <?php echo $primeira_alternativa_03; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="two" name="<?php echo $cod_questao_03; ?>" value="2">
                                            <?php echo $segunda_alternativa_03; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="three" name="<?php echo $cod_questao_03; ?>" value="3">
                                            <?php echo $terceira_alternativa_03; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 20px;">
                                            <input type="radio" id="four" name="<?php echo $cod_questao_03; ?>" value="4">
                                            <?php echo $quarta_alternativa_03; ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 ml-sm-auto"> 
                                    <strong>Questão 04</strong>
                                </div>
                                <div class="col-sm-12 ml-sm-auto"> 
                                    <?php echo $enunciado_questao_04; ?> 
                                </div>
                                <div class="col-sm-12 ml-sm-auto">
                                    <ul style="list-style: none; margin-left: 0; padding-left: 0;">
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="one" name="<?php echo $cod_questao_04; ?>" value="1" required>
                                            <?php echo $primeira_alternativa_04; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="two" name="<?php echo $cod_questao_04; ?>" value="2">
                                            <?php echo $segunda_alternativa_04; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="three" name="<?php echo $cod_questao_04; ?>" value="3">
                                            <?php echo $terceira_alternativa_04; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 20px;">
                                            <input type="radio" id="four" name="<?php echo $cod_questao_04; ?>" value="4">
                                            <?php echo $quarta_alternativa_04; ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 ml-sm-auto"> 
                                    <strong>Questão 05</strong>
                                </div>
                                <div class="col-sm-12 ml-sm-auto"> 
                                    <?php echo $enunciado_questao_05; ?> 
                                </div>
                                <div class="col-sm-12 ml-sm-auto">
                                    <ul style="list-style: none; margin-left: 0; padding-left: 0;">
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="one" name="<?php echo $cod_questao_05; ?>" value="1" required>
                                            <?php echo $primeira_alternativa_05; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="two" name="<?php echo $cod_questao_05; ?>" value="2">
                                            <?php echo $segunda_alternativa_05; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="three" name="<?php echo $cod_questao_05; ?>" value="3">
                                            <?php echo $terceira_alternativa_05; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 20px;">
                                            <input type="radio" id="four" name="<?php echo $cod_questao_05; ?>" value="4">
                                            <?php echo $quarta_alternativa_05; ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 ml-sm-auto"> 
                                    <button class="btn btn-info">Finalizar</button>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>