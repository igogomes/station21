<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Usuários</h1>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="./">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">Usuários</li>
                </ol>
            </div>
            <div class="col-lg-6 col-md-6" style="text-align:right">
                <a href="create-user">
                    <button class="btn btn-success">Cadastrar</button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <?php 

                    if($excluir_usuario == 1) {

                ?>

                        <div class="alert alert-danger alert-dismissable fade show">
                            <a href="users" class="close" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                            <h4>Atenção!</h4>
                            <p>Você realmente deseja excluir o usuário <strong><?php echo utf8_encode($nome_excluir_usuario); ?></strong>?</p>
                            <p>
                                <a href="delete-user?cod-user=<?php echo $cod_excluir_usuario; ?>" class="btn btn-danger" style="color:#fff;">Sim</a>
                                <a href="users" class="btn btn-default" style="color:#000;">Não</a>
                            </p>
                        </div>

                <?php

                    }

                    if($excluir_usuario == 2) {
                        
                ?>

                        <div class="alert alert-success alert-dismissable fade show">
                            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                            Os dados do usuário foram excluídos com <strong>sucesso</strong>.
                        </div>

                <?php

                    }

                    if($cod_instrutor != "" && $substituir_usuario == 1) {

                ?>

                        <div class="alert alert-danger alert-dismissable fade show">
                            <a href="users" class="close" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                            <h4>Atenção!</h4>
                            <p>Para prosseguir com a exclusão do usuário <strong><?php echo utf8_encode($nome_excluir_usuario); ?></strong> é necessário selecionar outro usuário, ao qual os cursos associados a este usuário serão relacionados.</p>
                            <p>

                                <form action="delete-user" method="post">

                                    <select name="cod-user-replace" class="form-control" size="1" style="width: 40%; margin-bottom: 15px;" required>
                                        <option selected value="">Selecione o(a) novo(a) instrutor(a) responsável</option>
                                            
                                        <?php 
                                            
                                            $lista_instrutores = new GerenciarUsuario();
                                            $lista_instrutores = $lista_instrutores -> gerarListaInstrutoresExcludente($cod_instrutor);

                                            echo $lista_instrutores;
                                            
                                        ?>
                                    </select>

                                    <input type="hidden" name="cod-user" value="<?php echo $cod_instrutor; ?>"/>

                                    <button class="btn btn-danger" style="color:#fff;">Finalizar Exclusão</button>

                                </form>

                            </p>
                        </div>

                <?php 
                
                    }

                    if($erro_excluir_instrutor == 1) {
                
                ?>

                        <div class="alert alert-danger alert-dismissable fade show">
                            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                            O instrutor cadastrado é o único registrado no sistema e possui curso(s) associado(s). É necessário o cadastro de outro instrutor para que sua exclusão seja finalizada ou, o curso associado ao mesmo também precisa ser excluído.
                        </div>


                <?php 
                
                    }
                
                ?>

            </div>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover table-striped-users-admin-mobile" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Data de Cadastro</th>
                                <th>Permissão</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Data de Cadastro</th>
                                <th>Permissão</th>
                                <th>Ações</th>
                            </tr>
                        </tfoot>
                        <tbody>
                                
                            <?php 
                                        
                                $tabela_usuarios = new GerenciarUsuario();
                                $tabela_usuarios = $tabela_usuarios -> gerarTabelaUsuarios($codigo_usuario_autenticado);

                                echo $tabela_usuarios;
                                        
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>