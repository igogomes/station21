<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Prova</h1>
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
            <li class="breadcrumb-item">Prova</li> 
        </ol>
    </div>
    <div class="row">
        <div class="col-md-12">

            <?php

                if($verificar_nota_prova != 0) {
                        
            ?>

                <div class="alert alert-warning alert-dismissable fade show" style="margin-bottom: -15px;">
                    <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                    Você já realizou esta prova. Caso realize novamente, apenas a maior nota obtida será considerada. 
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
                        <form action="finish-test" method="post">
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
                                    <strong>Questão 06</strong>
                                </div>
                                <div class="col-sm-12 ml-sm-auto"> 
                                    <?php echo $enunciado_questao_06; ?> 
                                </div>
                                <div class="col-sm-12 ml-sm-auto">
                                    <ul style="list-style: none; margin-left: 0; padding-left: 0;">
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="one" name="questao-06" value="1" required>
                                            <?php echo $primeira_alternativa_06; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="two" name="questao-06" value="2">
                                            <?php echo $segunda_alternativa_06; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="three" name="questao-06" value="3">
                                            <?php echo $terceira_alternativa_06; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 20px;">
                                            <input type="radio" id="four" name="questao-06" value="4">
                                            <?php echo $quarta_alternativa_06; ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 ml-sm-auto"> 
                                    <strong>Questão 07</strong>
                                </div>
                                <div class="col-sm-12 ml-sm-auto"> 
                                    <?php echo $enunciado_questao_07; ?> 
                                </div>
                                <div class="col-sm-12 ml-sm-auto">
                                    <ul style="list-style: none; margin-left: 0; padding-left: 0;">
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="one" name="questao-07" value="1" required>
                                            <?php echo $primeira_alternativa_07; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="two" name="questao-07" value="2">
                                            <?php echo $segunda_alternativa_07; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="three" name="questao-07" value="3">
                                            <?php echo $terceira_alternativa_07; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 20px;">
                                            <input type="radio" id="four" name="questao-07" value="4">
                                            <?php echo $quarta_alternativa_07; ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 ml-sm-auto"> 
                                    <strong>Questão 08</strong>
                                </div>
                                <div class="col-sm-12 ml-sm-auto"> 
                                    <?php echo $enunciado_questao_08; ?> 
                                </div>
                                <div class="col-sm-12 ml-sm-auto">
                                    <ul style="list-style: none; margin-left: 0; padding-left: 0;">
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="one" name="questao-08" value="1" required>
                                            <?php echo $primeira_alternativa_08; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="two" name="questao-08" value="2">
                                            <?php echo $segunda_alternativa_08; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="three" name="questao-08" value="3">
                                            <?php echo $terceira_alternativa_08; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 20px;">
                                            <input type="radio" id="four" name="questao-08" value="4">
                                            <?php echo $quarta_alternativa_08; ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 ml-sm-auto"> 
                                    <strong>Questão 09</strong>
                                </div>
                                <div class="col-sm-12 ml-sm-auto"> 
                                    <?php echo $enunciado_questao_09; ?> 
                                </div>
                                <div class="col-sm-12 ml-sm-auto">
                                    <ul style="list-style: none; margin-left: 0; padding-left: 0;">
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="one" name="questao-09" value="1" required>
                                            <?php echo $primeira_alternativa_09; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="two" name="questao-09" value="2">
                                            <?php echo $segunda_alternativa_09; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="three" name="questao-09" value="3">
                                            <?php echo $terceira_alternativa_09; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 20px;">
                                            <input type="radio" id="four" name="questao-09" value="4">
                                            <?php echo $quarta_alternativa_09; ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 ml-sm-auto"> 
                                    <strong>Questão 10</strong>
                                </div>
                                <div class="col-sm-12 ml-sm-auto"> 
                                    <?php echo $enunciado_questao_10; ?> 
                                </div>
                                <div class="col-sm-12 ml-sm-auto">
                                    <ul style="list-style: none; margin-left: 0; padding-left: 0;">
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="one" name="questao-10" value="1" required>
                                            <?php echo $primeira_alternativa_10; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="two" name="questao-10" value="2">
                                            <?php echo $segunda_alternativa_10; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 10px;">
                                            <input type="radio" id="three" name="questao-10" value="3">
                                            <?php echo $terceira_alternativa_10; ?>
                                        </li>
                                        <li style="padding-top: 10px; padding-bottom: 20px;">
                                            <input type="radio" id="four" name="questao-10" value="4">
                                            <?php echo $quarta_alternativa_10; ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 ml-sm-auto"> 
                                    <input type="hidden" name="cod-usuario" value="<?php echo $cod_usuario; ?>">
                                    <input type="hidden" name="cod-curso" value="<?php echo $cod_curso; ?>">
                                    <input type="hidden" name="cod-test" value="<?php echo $cod_prova; ?>">
                                    <input type="hidden" name="cod-questao-01" value="<?php echo $cod_questao_01; ?>">
                                    <input type="hidden" name="cod-questao-02" value="<?php echo $cod_questao_02; ?>">
                                    <input type="hidden" name="cod-questao-03" value="<?php echo $cod_questao_03; ?>">
                                    <input type="hidden" name="cod-questao-04" value="<?php echo $cod_questao_04; ?>">
                                    <input type="hidden" name="cod-questao-05" value="<?php echo $cod_questao_05; ?>">
                                    <input type="hidden" name="cod-questao-06" value="<?php echo $cod_questao_06; ?>">
                                    <input type="hidden" name="cod-questao-07" value="<?php echo $cod_questao_07; ?>">
                                    <input type="hidden" name="cod-questao-08" value="<?php echo $cod_questao_08; ?>">
                                    <input type="hidden" name="cod-questao-09" value="<?php echo $cod_questao_09; ?>">
                                    <input type="hidden" name="cod-questao-10" value="<?php echo $cod_questao_10; ?>">
                                    <button class="btn btn-info">Finalizar</button>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>