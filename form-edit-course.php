<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Editar Curso</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="./">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="courses">Cursos</a>
            </li>
            <li class="breadcrumb-item">Editar Curso</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <form class="form-horizontal" action="create-content" method="post">   
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Título</label>
                                <div class="col-sm-10">
                                    <input name ="cod-edit-course" type="hidden" value="<?php echo $cod_curso; ?>">
                                    <input name="edit-course" type="hidden" value="1">
                                    <input name="titulo" class="form-control" type="text" placeholder="Digite o título do curso" maxlength="100" value="<?php echo $titulo_curso; ?>" autofocus required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Instrutor</label>
                                <div class="col-sm-10">

                                    <?php 
                                    
                                        if($permissao == 2) {

                                            echo $nome;
                                    
                                    ?>

                                            <input type="hidden" name="instrutor" value="<?php echo $cod_usuario; ?>"/>

                                    <?php 
                                    
                                        }

                                        else {
                                    
                                    ?>

                                            <select name="instrutor" class="form-control" size="1" required>
                                                <option selected value="0">Selecione o instrutor responsável</option>
                                                
                                                <?php 
                                                
                                                    $lista_instrutores = new GerenciarUsuario();
                                                    $lista_instrutores = $lista_instrutores -> gerarListaInstrutoresPorCodigo($cod_instrutor_curso); 

                                                    echo $lista_instrutores;
                                                
                                                ?>

                                            </select>

                                    <?php 
                                    
                                        }
                                    
                                    ?>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-4">
                                    <select name="status" class="form-control" size="1" required>
                                        
                                        <?php 
                                            
                                            $lista_status = new GerenciarStatus();
                                            $lista_status = $lista_status -> gerarListaStatusPorCodigo($cod_status_curso);

                                            echo $lista_status;
                                        
                                        ?>

                                    </select>
                                </div>
                                <label class="col-sm-1 col-form-label">Categoria</label>
                                <div class="col-sm-5">
                                    <select name="categoria" class="form-control" size="1" required>
                                        <option selected value="0">Selecione uma categoria</option>

                                        <?php 
                                        
                                            $lista_categorias = new GerenciarCategoria();
                                            $lista_categorias = $lista_categorias -> gerarListaCategoriaPorCodigo($cod_categoria_curso);

                                            echo $lista_categorias;
                                        
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Palavras Chave</label>
                                <div class="col-sm-10">
                                    <input name="palavras-chave" class="form-control" type="text" placeholder="Digite as palavras chave separadas por vírgula" maxlength="100" data-role="tagsinput" value="<?php echo $palavras_chave_curso; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Apresentação</label>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <textarea id="summernote" data-plugin="summernote" data-air-mode="true" name="apresentacao-edicao-curso"><?php echo "$apresentacao_curso"; ?></textarea>
                                </div>
                            </div>
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