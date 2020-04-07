<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Cadastrar Curso</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="courses">Cursos</a>
            </li>
            <li class="breadcrumb-item">Cadastrar Curso</li>
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
                                    <input name="titulo" class="form-control" type="text" placeholder="Digite o título do curso" maxlength="100" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Instrutor</label>
                                <div class="col-sm-10">
                                    <select name="permissao" class="form-control" size="1" required>
                                        <option selected value="0">Selecione o instrutor responsável</option>
                                        
                                        <?php 
                                        
                                            $lista_instrutores = new GerenciarUsuario();
                                            $lista_instrutores = $lista_instrutores -> gerarListaInstrutores();

                                            echo $lista_instrutores;
                                        
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-4">
                                    <select name="status" class="form-control" size="1" required>
                                        <option value="1">Publicado</option>
                                        <option selected value="2">Não Publicado</option>
                                    </select>
                                </div>
                                <label class="col-sm-1 col-form-label">Categoria</label>
                                <div class="col-sm-5">
                                    <input name="email" class="form-control" type="email" placeholder="Digite o e-mail do usuário" maxlength="100" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <button class="btn btn-info" type="submit">Cadastrar</button>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>