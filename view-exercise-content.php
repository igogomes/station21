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
                <a href="view-course?cod-course=<?php echo $cod_curso; ?>"><?php echo $titulo_curso; ?></a>
            </li>
            <li class="breadcrumb-item">
                <?php echo $titulo_modulo; ?>
            </li>
            <li class="breadcrumb-item">Exercício</li> 
        </ol>
    </div>
    <div class="row">
        <div class="col-md-12">

            <?php

                if($verificar_nota_exercicio != 0) {
                        
            ?>

                <div class="alert alert-warning alert-dismissable fade show" style="margin-bottom: -15px;">
                    <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                    Você já realizou este exercício. Caso realize novamente, apenas a maior nota obtida será considerada. 
                </div>

            <?php

                }

            ?>

        </div>
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
                                            <input type="radio" id="one" name="questao-01" value="1" required>
                                            <?php echo $primeira_alternativa_01; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="two" name="questao-01" value="2">
                                            <?php echo $segunda_alternativa_01; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="three" name="questao-01" value="3">
                                            <?php echo $terceira_alternativa_01; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 20px;">
                                            <input type="radio" id="four" name="questao-01" value="4">
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
                                            <input type="radio" id="one" name="questao-02" value="1" required>
                                            <?php echo $primeira_alternativa_02; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="two" name="questao-02" value="2">
                                            <?php echo $segunda_alternativa_02; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="three" name="questao-02" value="3">
                                            <?php echo $terceira_alternativa_02; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 20px;">
                                            <input type="radio" id="four" name="questao-02" value="4">
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
                                            <input type="radio" id="one" name="questao-03" value="1" required>
                                            <?php echo $primeira_alternativa_03; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="two" name="questao-03" value="2">
                                            <?php echo $segunda_alternativa_03; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="three" name="questao-03" value="3">
                                            <?php echo $terceira_alternativa_03; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 20px;">
                                            <input type="radio" id="four" name="questao-03" value="4">
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
                                            <input type="radio" id="one" name="questao-04" value="1" required>
                                            <?php echo $primeira_alternativa_04; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="two" name="questao-04" value="2">
                                            <?php echo $segunda_alternativa_04; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="three" name="questao-04" value="3">
                                            <?php echo $terceira_alternativa_04; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 20px;">
                                            <input type="radio" id="four" name="questao-04" value="4">
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
                                            <input type="radio" id="one" name="questao-05" value="1" required>
                                            <?php echo $primeira_alternativa_05; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="two" name="questao-05" value="2">
                                            <?php echo $segunda_alternativa_05; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="three" name="questao-05" value="3">
                                            <?php echo $terceira_alternativa_05; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 20px;">
                                            <input type="radio" id="four" name="questao-05" value="4">
                                            <?php echo $quarta_alternativa_05; ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 ml-sm-auto"> 
                                    <input type="hidden" name="cod-usuario" value="<?php echo $cod_usuario; ?>">
                                    <input type="hidden" name="cod-curso" value="<?php echo $cod_curso; ?>">
                                    <input type="hidden" name="cod-exercicio" value="<?php echo $cod_exercicio; ?>">
                                    <input type="hidden" name="cod-questao-01" value="<?php echo $cod_questao_01; ?>">
                                    <input type="hidden" name="cod-questao-02" value="<?php echo $cod_questao_02; ?>">
                                    <input type="hidden" name="cod-questao-03" value="<?php echo $cod_questao_03; ?>">
                                    <input type="hidden" name="cod-questao-04" value="<?php echo $cod_questao_04; ?>">
                                    <input type="hidden" name="cod-questao-05" value="<?php echo $cod_questao_05; ?>">
                                    <button class="btn btn-info">Finalizar</button>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>