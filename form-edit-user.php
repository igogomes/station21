<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Editar Usuário</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index">Dashboard</a>
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
                        <form class="form-horizontal" action="edit-user" method="post">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nome</label>
                                <div class="col-sm-10">
                                    <input name="nome-edicao-usuario" class="form-control" type="text" placeholder="Digite o nome do usuário" maxlength="100" value="<?php if($nome_edicao_usuario != "") { echo $nome_edicao_usuario; } else { echo $nome_usuario; } ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">E-mail</label>
                                <div class="col-sm-10">
                                    <input name="email-edicao-usuario" class="form-control" type="email" placeholder="Digite o e-mail do usuário" maxlength="100" value="<?php if($email_edicao_usuario != "") { echo $email_edicao_usuario; } else { echo $email_usuario; } ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Permissão</label>
                                <div class="col-sm-10">
                                        
                                    <?php 

                                        if($permissao_edicao_usuario != "" && $permissao_usuario == "") {

                                            echo "<select name=\"permissao-edicao-usuario\" class=\"form-control\" size=\"1\" required>";
                                                echo "<option selected value=\"0\">Selecione uma permissão edição</option>";

                                                $lista_permissoes_edicao_usuario = new GerenciarUsuario();
                                                $lista_permissoes_edicao_usuario = $lista_permissoes_edicao_usuario -> gerarListaPermissoesComSelecao($permissao_edicao_usuario);
                                                echo $lista_permissoes_edicao_usuario;

                                            echo "</select>";

                                        }

                                        else if($permissao_usuario != "" && $permissao_edicao_usuario == "") {

                                            echo "<select name=\"permissao-usuario\" class=\"form-control\" size=\"1\" required>";
                                                echo "<option selected value=\"0\">Selecione uma permissão comum</option>";

                                                $lista_permissoes_usuario = new GerenciarUsuario();
                                                $lista_permissoes_usuario = $lista_permissoes_usuario -> gerarListaPermissoesComSelecao($permissao_usuario);
                                                echo $lista_permissoes_usuario;

                                            echo "</select>";

                                        }
                                            
                                    ?>

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