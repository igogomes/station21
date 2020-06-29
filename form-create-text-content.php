<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Cadastrar Texto</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="./">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="courses">Cursos</a>
            </li>
            <li class="breadcrumb-item">Cadastrar Texto</li> 
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">

                <?php 

                    if($erro_cadastro_texto == 1) {

                ?>

                    <div class="alert alert-danger alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        É necessário selecionar um módulo para cadastrar um texto.
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
                        <form class="form-horizontal" action="create-text" enctype="multipart/form-data" method="post"> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Curso</label>
                                <div class="col-sm-10">
                                    <?php echo ucwords($titulo); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Título do Texto</label>
                                <div class="col-sm-10">
                                    <input name="titulo-texto" class="form-control" type="text" placeholder="Digite o título do texto" maxlength="100" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Módulo</label>
                                <div class="col-sm-10">
                                    <select name="modulo" class="form-control" size="1" required>
                                        <option value="" selected>Selecione um módulo</option>

                                        <?php 
                                        
                                            $lista_modulos = new GerenciarModulo();
                                            $lista_modulos = $lista_modulos -> gerarListaModulosPorCodigoCurso($cod_curso);

                                            echo $lista_modulos; 
                                        
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <textarea id="summernote" data-plugin="summernote" data-air-mode="true" name="texto" required>
                                    </textarea>
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