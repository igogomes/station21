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
                                <div class="col-sm-12">
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
                                <label class="col-sm-12 col-form-label">Enunciado</label>
                                <div class="col-sm-12">
                                    <textarea name="enunciado-exercicio" class="form-control" placeholder="Digite o enunciado" rows="5" required><?php echo $enunciado_questao_01; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Primeira alternativa</label>
                                <div class="col-sm-12">
                                    <input name="primeira-alternativa-exercicio" class="form-control" type="text" placeholder="Digite o texto da primeira alternativa" value="<?php echo $primeira_alternativa_01; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Segunda alternativa</label>
                                <div class="col-sm-12">
                                    <input name="segunda-alternativa-exercicio" class="form-control" type="text" placeholder="Digite o texto da segunda alternativa" value="<?php echo $segunda_alternativa_01; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Terceira alternativa</label>
                                <div class="col-sm-12">
                                    <input name="terceira-alternativa-exercicio" class="form-control" type="text" placeholder="Digite o texto da terceira alternativa" value="<?php echo $terceira_alternativa_01; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Quarta alternativa</label>
                                <div class="col-sm-12">
                                    <input name="quarta-alternativa-exercicio" class="form-control" type="text" placeholder="Digite o texto da quarta alternativa" value="<?php echo $quarta_alternativa_01; ?>" required>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">É a resposta</label>
                                <div class="col-sm-10">
                                    <select name="resposta" class="form-control" size="1" style="width: 25%;" required>
                                        <option selected value="1">Primeira alternativa</option>
                                        <option value="2">Segunda alternativa</option>
                                        <option value="3">Terceira alternativa</option>
                                        <option value="4">Quarta alternativa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label"><strong>Segunda Questão</strong></label>
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
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">É a resposta</label>
                                <div class="col-sm-10">
                                    <select name="resposta" class="form-control" size="1" style="width: 25%;" required>
                                        <option selected value="1">Primeira alternativa</option>
                                        <option value="2">Segunda alternativa</option>
                                        <option value="3">Terceira alternativa</option>
                                        <option value="4">Quarta alternativa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label"><strong>Terceira Questão</strong></label>
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
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">É a resposta</label>
                                <div class="col-sm-10">
                                    <select name="resposta" class="form-control" size="1" style="width: 25%;" required>
                                        <option selected value="1">Primeira alternativa</option>
                                        <option value="2">Segunda alternativa</option>
                                        <option value="3">Terceira alternativa</option>
                                        <option value="4">Quarta alternativa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label"><strong>Quarta Questão</strong></label>
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
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">É a resposta</label>
                                <div class="col-sm-10">
                                    <select name="resposta" class="form-control" size="1" style="width: 25%;" required>
                                        <option selected value="1">Primeira alternativa</option>
                                        <option value="2">Segunda alternativa</option>
                                        <option value="3">Terceira alternativa</option>
                                        <option value="4">Quarta alternativa</option>
                                    </select>
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