<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Cadastrar Exercício</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="./">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="courses">Cursos</a>
            </li>
            <li class="breadcrumb-item">Cadastrar Exercício</li> 
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <form class="form-horizontal" action="create-exercise-content" method="post"> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Curso</label>
                                <div class="col-sm-8">
                                    <?php echo ucwords($titulo); ?>
                                </div>
                                <label class="col-sm-2 col-form-label" style="text-align: right;"><?php echo $numero_exercicio; ?> / 5 </label>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Módulo</label>
                                <div class="col-sm-10">
                                    <?php echo $titulo_modulo; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Enunciado</label>
                                <div class="col-sm-12">
                                    <textarea name="enunciado-exercicio" class="form-control" placeholder="Digite o enunciado" rows="5" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Primeira alternativa</label>
                                <div class="col-sm-12">
                                    <input name="primeira-alternativa-exercicio" class="form-control" type="text" placeholder="Digite o texto da primeira alternativa" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Segunda alternativa</label>
                                <div class="col-sm-12">
                                    <input name="segunda-alternativa-exercicio" class="form-control" type="text" placeholder="Digite o texto da segunda alternativa" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Terceira alternativa</label>
                                <div class="col-sm-12">
                                    <input name="terceira-alternativa-exercicio" class="form-control" type="text" placeholder="Digite o texto da terceira alternativa" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Quarta alternativa</label>
                                <div class="col-sm-12">
                                    <input name="quarta-alternativa-exercicio" class="form-control" type="text" placeholder="Digite o texto da quarta alternativa" required>
                                </div>
                            </div> 
                            <input type="hidden" name="cod-course" value="<?php echo $cod_curso; ?>">
                            <input type="hidden" name="module" value="<?php echo $modulo; ?>">
                            <input type="hidden" name="cod-exercise" value="<?php echo $cod_exercicio; ?>">
                            <input type="hidden" name="exercise-number" value="<?php echo $numero_exercicio = $numero_exercicio + 1; ?>">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">É a resposta</label>
                                <div class="col-sm-4">
                                    <select name="resposta" class="form-control" size="1" required>
                                        <option selected value="1">Primeira alternativa</option>
                                        <option value="2">Segunda alternativa</option>
                                        <option value="3">Terceira alternativa</option>
                                        <option value="4">Quarta alternativa</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 ml-sm-auto" style="text-align: right;">
                                    <button class="btn btn-info" type="submit"><?php if($numero_exercicio < 6) { echo "Próximo"; } else { echo "Finalizar"; } ?></button>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>