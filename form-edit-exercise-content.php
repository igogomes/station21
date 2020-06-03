<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Editar Exercício</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="./">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="courses">Cursos</a>
            </li>
            <li class="breadcrumb-item">Editar Exercício</li> 
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">

                <?php 

                    if($cod_tipo == 5 && $edicao_conteudo == 1) {
                
                ?>
        
                    <div class="alert alert-success alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        O exercício foi cadastrado com <strong>sucesso</strong>.
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
                        <form class="form-horizontal" action="edit-exercise" method="post"> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Curso</label>
                                <div class="col-sm-10">
                                    <?php echo ucwords($titulo_curso); ?>
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
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label"><strong>Primeira Questão</strong></label>
                            </div>
                            <div class="form-group row">
                                <input type="hidden" name="cod-questao-01" value="<?php echo $cod_questao_01; ?>">
                                <label class="col-sm-12 col-form-label">Enunciado</label>
                                <div class="col-sm-12">
                                    <textarea name="enunciado-questao-01" class="form-control" placeholder="Digite o enunciado" rows="5" required><?php echo $enunciado_questao_01; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Primeira alternativa</label>
                                <div class="col-sm-12">
                                    <input name="primeira-alternativa-questao-01" class="form-control" type="text" placeholder="Digite o texto da primeira alternativa" value="<?php echo $primeira_alternativa_01; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Segunda alternativa</label>
                                <div class="col-sm-12">
                                    <input name="segunda-alternativa-questao-01" class="form-control" type="text" placeholder="Digite o texto da segunda alternativa" value="<?php echo $segunda_alternativa_01; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Terceira alternativa</label>
                                <div class="col-sm-12">
                                    <input name="terceira-alternativa-questao-01" class="form-control" type="text" placeholder="Digite o texto da terceira alternativa" value="<?php echo $terceira_alternativa_01; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Quarta alternativa</label>
                                <div class="col-sm-12">
                                    <input name="quarta-alternativa-questao-01" class="form-control" type="text" placeholder="Digite o texto da quarta alternativa" value="<?php echo $quarta_alternativa_01; ?>" required>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">É a resposta</label>
                                <div class="col-sm-10">
                                    <select name="resposta-questao-01" class="form-control" size="1" style="width: 25%;" required>

                                        <?php 

                                            if($resposta_alternativa_01 == 1) { 

                                                echo "<option selected value=\"1\">Primeira alternativa</option>";

                                            }

                                            else {

                                                echo "<option value=\"1\">Primeira alternativa</option>";

                                            }

                                            if($resposta_alternativa_01 == 2) { 

                                                echo "<option selected value=\"2\">Segunda alternativa</option>";

                                            }

                                            else {

                                                echo "<option value=\"2\">Segunda alternativa</option>";

                                            }

                                            if($resposta_alternativa_01 == 3) { 

                                                echo "<option selected value=\"3\">Terceira alternativa</option>";

                                            }

                                            else {

                                                echo "<option value=\"3\">Terceira alternativa</option>";

                                            }

                                            if($resposta_alternativa_01 == 4) { 

                                                echo "<option selected value=\"4\">Quarta alternativa</option>";

                                            }

                                            else {

                                                echo "<option value=\"4\">Quarta alternativa</option>";

                                            }

                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label"><strong>Segunda Questão</strong></label>
                            </div>
                            <div class="form-group row">
                                <input type="hidden" name="cod-questao-02" value="<?php echo $cod_questao_02; ?>">
                                <label class="col-sm-12 col-form-label">Enunciado</label>
                                <div class="col-sm-12">
                                    <textarea name="enunciado-questao-02" class="form-control" placeholder="Digite o enunciado" rows="5" required><?php echo $enunciado_questao_02; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Primeira alternativa</label>
                                <div class="col-sm-12">
                                    <input name="primeira-alternativa-questao-02" class="form-control" type="text" placeholder="Digite o texto da primeira alternativa" value="<?php echo $primeira_alternativa_02; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Segunda alternativa</label>
                                <div class="col-sm-12">
                                    <input name="segunda-alternativa-questao-02" class="form-control" type="text" placeholder="Digite o texto da segunda alternativa" value="<?php echo $segunda_alternativa_02; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Terceira alternativa</label>
                                <div class="col-sm-12">
                                    <input name="terceira-alternativa-questao-02" class="form-control" type="text" placeholder="Digite o texto da terceira alternativa" value="<?php echo $terceira_alternativa_02; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Quarta alternativa</label>
                                <div class="col-sm-12">
                                    <input name="quarta-alternativa-questao-02" class="form-control" type="text" placeholder="Digite o texto da quarta alternativa" value="<?php echo $quarta_alternativa_02; ?>" required>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">É a resposta</label>
                                <div class="col-sm-10">
                                    <select name="resposta-questao-02" class="form-control" size="1" style="width: 25%;" required>
                                        
                                        <?php 

                                            if($resposta_alternativa_02 == 1) { 

                                                echo "<option selected value=\"1\">Primeira alternativa</option>";

                                            }

                                            else {

                                                echo "<option value=\"1\">Primeira alternativa</option>";

                                            }

                                            if($resposta_alternativa_02 == 2) { 

                                                echo "<option selected value=\"2\">Segunda alternativa</option>";

                                            }

                                            else {

                                                echo "<option value=\"2\">Segunda alternativa</option>";

                                            }

                                            if($resposta_alternativa_02 == 3) { 

                                                echo "<option selected value=\"3\">Terceira alternativa</option>";

                                            }

                                            else {

                                                echo "<option value=\"3\">Terceira alternativa</option>";

                                            }

                                            if($resposta_alternativa_02 == 4) { 

                                                echo "<option selected value=\"4\">Quarta alternativa</option>";

                                            }

                                            else {

                                                echo "<option value=\"4\">Quarta alternativa</option>";

                                            }

                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label"><strong>Terceira Questão</strong></label>
                            </div>
                            <div class="form-group row">
                                <input type="hidden" name="cod-questao-03" value="<?php echo $cod_questao_03; ?>">
                                <label class="col-sm-12 col-form-label">Enunciado</label>
                                <div class="col-sm-12">
                                    <textarea name="enunciado-questao-03" class="form-control" placeholder="Digite o enunciado" rows="5" required><?php echo $enunciado_questao_03; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Primeira alternativa</label>
                                <div class="col-sm-12">
                                    <input name="primeira-alternativa-questao-03" class="form-control" type="text" placeholder="Digite o texto da primeira alternativa" value="<?php echo $primeira_alternativa_03; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Segunda alternativa</label>
                                <div class="col-sm-12">
                                    <input name="segunda-alternativa-questao-03" class="form-control" type="text" placeholder="Digite o texto da segunda alternativa" value="<?php echo $segunda_alternativa_03; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Terceira alternativa</label>
                                <div class="col-sm-12">
                                    <input name="terceira-alternativa-questao-03" class="form-control" type="text" placeholder="Digite o texto da terceira alternativa" value="<?php echo $terceira_alternativa_03; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Quarta alternativa</label>
                                <div class="col-sm-12">
                                    <input name="quarta-alternativa-questao-03" class="form-control" type="text" placeholder="Digite o texto da quarta alternativa" value="<?php echo $quarta_alternativa_03; ?>" required>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">É a resposta</label>
                                <div class="col-sm-10">
                                    <select name="resposta-questao-03" class="form-control" size="1" style="width: 25%;" required>
                                        
                                        <?php 

                                            if($resposta_alternativa_03 == 1) { 

                                                echo "<option selected value=\"1\">Primeira alternativa</option>";

                                            }

                                            else {

                                                echo "<option value=\"1\">Primeira alternativa</option>";

                                            }

                                            if($resposta_alternativa_03 == 2) { 

                                                echo "<option selected value=\"2\">Segunda alternativa</option>";

                                            }

                                            else {

                                                echo "<option value=\"2\">Segunda alternativa</option>";

                                            }

                                            if($resposta_alternativa_03 == 3) { 

                                                echo "<option selected value=\"3\">Terceira alternativa</option>";

                                            }

                                            else {

                                                echo "<option value=\"3\">Terceira alternativa</option>";

                                            }

                                            if($resposta_alternativa_03 == 4) { 

                                                echo "<option selected value=\"4\">Quarta alternativa</option>";

                                            }

                                            else {

                                                echo "<option value=\"4\">Quarta alternativa</option>";

                                            }

                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label"><strong>Quarta Questão</strong></label>
                            </div>
                            <div class="form-group row">
                                <input type="hidden" name="cod-questao-04" value="<?php echo $cod_questao_04; ?>">
                                <label class="col-sm-12 col-form-label">Enunciado</label>
                                <div class="col-sm-12">
                                    <textarea name="enunciado-questao-04" class="form-control" placeholder="Digite o enunciado" rows="5" required><?php echo $enunciado_questao_04; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Primeira alternativa</label>
                                <div class="col-sm-12">
                                    <input name="primeira-alternativa-questao-04" class="form-control" type="text" placeholder="Digite o texto da primeira alternativa" value="<?php echo $primeira_alternativa_04; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Segunda alternativa</label>
                                <div class="col-sm-12">
                                    <input name="segunda-alternativa-questao-04" class="form-control" type="text" placeholder="Digite o texto da segunda alternativa" value="<?php echo $segunda_alternativa_04; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Terceira alternativa</label>
                                <div class="col-sm-12">
                                    <input name="terceira-alternativa-questao-04" class="form-control" type="text" placeholder="Digite o texto da terceira alternativa" value="<?php echo $terceira_alternativa_04; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Quarta alternativa</label>
                                <div class="col-sm-12">
                                    <input name="quarta-alternativa-questao-04" class="form-control" type="text" placeholder="Digite o texto da quarta alternativa" value="<?php echo $quarta_alternativa_04; ?>" required>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">É a resposta</label>
                                <div class="col-sm-10">
                                    <select name="resposta-questao-04" class="form-control" size="1" style="width: 25%;" required>
                                        
                                    <?php 

                                        if($resposta_alternativa_04 == 1) { 

                                            echo "<option selected value=\"1\">Primeira alternativa</option>";

                                        }

                                        else {

                                            echo "<option value=\"1\">Primeira alternativa</option>";

                                        }

                                        if($resposta_alternativa_04 == 2) { 

                                            echo "<option selected value=\"2\">Segunda alternativa</option>";

                                        }

                                        else {

                                            echo "<option value=\"2\">Segunda alternativa</option>";

                                        }

                                        if($resposta_alternativa_04 == 3) { 

                                            echo "<option selected value=\"3\">Terceira alternativa</option>";

                                        }

                                        else {

                                            echo "<option value=\"3\">Terceira alternativa</option>";

                                        }

                                        if($resposta_alternativa_04 == 4) { 

                                            echo "<option selected value=\"4\">Quarta alternativa</option>";

                                        }

                                        else {

                                            echo "<option value=\"4\">Quarta alternativa</option>";

                                        }

                                    ?>

                                    </select>
                                    <input type="hidden" name="cod-exercicio" value="<?php echo $cod_exercicio; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label"><strong>Quinta Questão</strong></label>
                            </div>
                            <div class="form-group row">
                                <input type="hidden" name="cod-questao-05" value="<?php echo $cod_questao_05; ?>">
                                <label class="col-sm-12 col-form-label">Enunciado</label>
                                <div class="col-sm-12">
                                    <textarea name="enunciado-questao-05" class="form-control" placeholder="Digite o enunciado" rows="5" required><?php echo $enunciado_questao_05; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Primeira alternativa</label>
                                <div class="col-sm-12">
                                    <input name="primeira-alternativa-questao-05" class="form-control" type="text" placeholder="Digite o texto da primeira alternativa" value="<?php echo $primeira_alternativa_05; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Segunda alternativa</label>
                                <div class="col-sm-12">
                                    <input name="segunda-alternativa-questao-05" class="form-control" type="text" placeholder="Digite o texto da segunda alternativa" value="<?php echo $segunda_alternativa_05; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Terceira alternativa</label>
                                <div class="col-sm-12">
                                    <input name="terceira-alternativa-questao-05" class="form-control" type="text" placeholder="Digite o texto da terceira alternativa" value="<?php echo $terceira_alternativa_05; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Quarta alternativa</label>
                                <div class="col-sm-12">
                                    <input name="quarta-alternativa-questao-05" class="form-control" type="text" placeholder="Digite o texto da quarta alternativa" value="<?php echo $quarta_alternativa_05; ?>" required>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">É a resposta</label>
                                <div class="col-sm-10">
                                    <select name="resposta-questao-05" class="form-control" size="1" style="width: 25%;" required>
                                        
                                    <?php 

                                        if($resposta_alternativa_05 == 1) { 

                                            echo "<option selected value=\"1\">Primeira alternativa</option>";

                                        }

                                        else {

                                            echo "<option value=\"1\">Primeira alternativa</option>";

                                        }

                                        if($resposta_alternativa_05 == 2) { 

                                            echo "<option selected value=\"2\">Segunda alternativa</option>";

                                        }

                                        else {

                                            echo "<option value=\"2\">Segunda alternativa</option>";

                                        }

                                        if($resposta_alternativa_05 == 3) { 

                                            echo "<option selected value=\"3\">Terceira alternativa</option>";

                                        }

                                        else {

                                            echo "<option value=\"3\">Terceira alternativa</option>";

                                        }

                                        if($resposta_alternativa_05 == 4) { 

                                            echo "<option selected value=\"4\">Quarta alternativa</option>";

                                        }

                                        else {

                                            echo "<option value=\"4\">Quarta alternativa</option>";

                                        }

                                    ?>

                                    </select>
                                    <input type="hidden" name="cod-exercicio" value="<?php echo $cod_exercicio; ?>">
                                </div>
                            </div>
                            <div class="col-sm-12 ml-sm-auto" style="text-align: right;">
                                <button class="btn btn-info" type="submit">Finalizar</button>
                            </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>