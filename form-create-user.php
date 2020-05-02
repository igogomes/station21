<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Cadastrar Usuário</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="./">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="users">Usuários</a>
            </li>
            <li class="breadcrumb-item">Cadastrar Usuário</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">

                <?php 

                    if($erro_email_existente == 1) {

                ?>

                    <div class="alert alert-danger alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        O e-mail <strong><?php echo $email_usuario; ?></strong> já está cadastrado.
                    </div>

                <?php 

                    }

                    if($sucesso_cadastro_usuario == 1) {

                ?>

                    <div class="alert alert-success alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        O cadastro foi realizado com <strong>sucesso</strong>.
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
                        <form class="form-horizontal" action="create-user" method="post">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nome</label>
                                <div class="col-sm-10">
                                    <input name="nome" class="form-control" type="text" placeholder="Digite o nome do usuário" maxlength="100" autofocus required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">E-mail</label>
                                <div class="col-sm-10">
                                    <input name="email" class="form-control" type="email" placeholder="Digite o e-mail do usuário" maxlength="100" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Permissão</label>
                                <div class="col-sm-10">
                                    <select name="permissao" class="form-control" size="1" required>
                                        <option selected value="0">Selecione uma permissão</option>
                                        
                                        <?php 
                                        
                                            $lista_permissoes = new GerenciarUsuario();
                                            $lista_permissoes = $lista_permissoes -> gerarListaPermissoes();

                                            echo $lista_permissoes;
                                        
                                        ?>

                                    </select>
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