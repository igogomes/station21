<div class="content-wrapper">
<!-- START PAGE CONTENT-->
<div class="page-heading">
                <h1 class="page-title">Usuários</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">Usuários</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
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
                                    $tabela_usuarios = $tabela_usuarios -> gerarTabelaUsuarios();

                                    echo $tabela_usuarios;
                                
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>