<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Relatórios Cursos</h1>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="./">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="./reports">Relatórios</a>
                    </li>
                    <li class="breadcrumb-item">Relatórios Cursos</li>
                </ol>
            </div>
        </div>
        <div class="page-content fade-in-up"> 
            <div class="ibox">
                <div class="ibox-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <?php echo utf8_encode($nome_usuario); ?>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom: 30px;">
                        <label class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-sm-10">
                            <?php echo $email_usuario; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Cursos</th>
                                    <th>Status Vídeos</th>
                                    <th>Aprovação</th> 
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Cursos</th>
                                    <th>Status Vídeos</th>
                                    <th>Aprovação</th>
                                    <th>Ações</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                    
                                <?php 
                                            
                                    $tabela_relatorios_usuario = new GerenciarCurso();
                                    $tabela_relatorios_usuario = $tabela_relatorios_usuario -> gerarTabelaCursosPorUsuario($cod_usuario);

                                    echo $tabela_relatorios_usuario;
                                            
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>