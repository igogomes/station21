<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Meu Perfil</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index">Dashboard</a>
            </li>
            <li class="breadcrumb-item">Meu Perfil</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">

                <?php 

                    if($erro_senha_atual == 1) {

                ?>

                    <div class="alert alert-danger alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        A senha atual fornecida está <strong>incorreta</strong>.
                    </div>

                <?php

                    }

                    if($erro_nova_senha == 1) {

                ?>

                    <div class="alert alert-danger alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        A nova senha e sua confirmação não são <strong>iguais</strong>.
                    </div>

                <?php

                    }

                    if($atualizar_perfil == 1) {

                ?>

                    <div class="alert alert-success alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        Os seus dados foram atualizados com <strong>sucesso</strong>.
                    </div>


                <?php

                    }

                    if($atualizar_perfil == 0) {

                ?>

                    <div class="alert alert-warning alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        <strong>Atenção!</strong> Caso atualize seu e-mail ou senha, será necessária uma nova autenticação no sistema.
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
                        <form class="form-horizontal" action="profile" method="post">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nome</label>
                                <div class="col-sm-10">
                                    <input name="nome" class="form-control" type="text" placeholder="Digite seu nome" maxlength="100" value="<?php if($atualizar_perfil == 1) { echo $nome_usuario_perfil; } else { echo utf8_decode($nome); } ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">E-mail</label>
                                <div class="col-sm-10">
                                    <input name="email" class="form-control" type="email" placeholder="Digite seu e-mail" maxlength="100" value="<?php if($atualizar_perfil == 1) { echo $email_usuario_perfil; } else { echo $email; } ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Senha atual</label>
                                <div class="col-sm-10">
                                    <input name="senha" class="form-control" type="password" placeholder="Digite sua senha atual" maxlength="10" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nova senha</label>
                                <div class="col-sm-10">
                                    <input name="nova-senha" class="form-control" type="password" placeholder="Digite uma nova senha" maxlength="10">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Confirme a nova senha</label>
                                <div class="col-sm-10">
                                    <input name="confirmar-senha" class="form-control" type="password" placeholder="Confirme a nova senha" maxlength="10">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <button class="btn btn-info" type="submit">Atualizar</button>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>