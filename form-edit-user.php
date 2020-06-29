<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Editar Usuário</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="./">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="users">Usuários</a>
            </li>
            <li class="breadcrumb-item">Editar Usuário</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">

                <?php 

                    if($erro_edicao == 1) { 

                ?>

                    <div class="alert alert-danger alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        O e-mail <strong><?php echo $erro_email; ?></strong> já está cadastrado.
                    </div>

                <?php 

                    }

                    if($sucesso_edicao_usuario == 1) {

                ?>

                    <div class="alert alert-success alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        Os dados do usuário foram alterados com <strong>sucesso</strong>.
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
                        <form class="form-horizontal" action="edit-user-database" method="post">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nome</label>
                                <div class="col-sm-10">
                                    <input name="nome-edicao-usuario" class="form-control" type="text" placeholder="Digite o nome do usuário" maxlength="100" value="<?php echo $nome_usuario; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">E-mail</label>
                                <div class="col-sm-10">
                                    <input name="email-edicao-usuario" class="form-control" type="email" placeholder="Digite o e-mail do usuário" maxlength="100" value="<?php echo $email_usuario; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Permissão</label>
                                <div class="col-sm-10">
                                        
                                    <select name="permissao-edicao-usuario" class="form-control" size=1 required>

                                        <option value="">Selecione uma permissão...</option>

                                        <?php

                                            if($permissao_usuario == 1) {

                                                echo "<option value=\"1\" selected>Administrador</option>";

                                            }

                                            else {

                                                echo "<option value=\"1\">Administrador</option>";

                                            }

                                            if($permissao_usuario == 2) {

                                                echo "<option value=\"2\" selected>Instrutor</option>";

                                            }  

                                            else {

                                                echo "<option value=\"2\">Instrutor</option>";

                                            }

                                            if($permissao_usuario == 3) {

                                                echo "<option value=\"3\" selected>Usuário</option>";

                                            }

                                            else {

                                                echo "<option value=\"3\">Usuário</option>";

                                            }
        
                                        ?>

                                    </select>

                                    <input type="hidden" name="cod-edicao-usuario" value="<?php echo $cod_usuario; ?>">
                                    <input type="hidden" name="email-usuario" value="<?php echo $email_usuario; ?>">

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <button class="btn btn-info" type="submit">Salvar</button>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>