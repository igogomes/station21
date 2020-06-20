<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Relatórios</h1>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="./">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">Relatórios</li>
                </ol>
            </div>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="width: 85%;">Nome</th>
                                <th style="width: 15%;">Ações</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th style="width: 85%;">Nome</th>
                                <th style="width: 15%;">Ações</th>
                            </tr>
                        </tfoot>
                        <tbody>
                                
                            <?php 
                                        
                                $tabela_usuarios = new GerenciarUsuario(); 
                                $tabela_usuarios = $tabela_usuarios -> gerarTabelaRelatorioUsuarios();

                                echo $tabela_usuarios;
                                        
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>