<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Cadastrar Avaliação</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="./">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="courses">Cursos</a>
            </li>
            <li class="breadcrumb-item">Cadastrar Avaliação</li> 
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">

                <?php 

                    if($erro_cadastro_avaliacao == 1) {

                ?>

                    <div class="alert alert-danger alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        É necessário selecionar um módulo para cadastrar uma avaliação.
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
                        <form class="form-horizontal" action="create-evaluation" enctype="multipart/form-data" method="post"> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Curso</label>
                                <div class="col-sm-10">
                                    <?php echo ucwords($titulo); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Módulo</label>
                                <div class="col-sm-10">
                                    <select name="modulo" class="form-control" size="1" required>
                                        <option value="0" selected>Selecione um módulo</option>

                                        <?php 
                                        
                                            $lista_modulos = new GerenciarModulo();
                                            $lista_modulos = $lista_modulos -> gerarListaModulosPorCodigoCurso($cod_curso);

                                            echo $lista_modulos; 
                                        
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tipo</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="exercicio" name="evaluation" value="1">
                                    <label for="exercicio">Exercício</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio" id="prova" name="evaluation" value="2">
                                    <label for="prova">Prova</label>
                                </div>
                            </div>
                            <input type="hidden" name="cod-course" value="<?php echo $cod_curso; ?>">
                            <div class="form-group row">
                                <div class="col-sm-12 ml-sm-auto">
                                    <button class="btn btn-info" type="submit">Cadastrar</button>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>