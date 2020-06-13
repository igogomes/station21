<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <a href="users">
                    <div class="ibox bg-success color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">
                            
                                <?php 
                                
                                    $quantidade_usuarios = new GerenciarUsuario();
                                    $quantidade_usuarios = $quantidade_usuarios -> getQuantidadeUsuarios();

                                    echo $quantidade_usuarios;
                                
                                ?>

                            </h2>
                            <div class="m-b-5">
                            
                                <?php 
                                
                                    if($quantidade_usuarios == 1) {

                                        echo "USUÁRIO";

                                    }

                                    else {

                                        echo "USUÁRIOS";

                                    }
                                
                                ?>

                            </div><i class="fa fa-users widget-stat-icon"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="courses"> 
                    <div class="ibox bg-info color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">
                            
                                <?php 
                                    
                                    $quantidade_cursos = new GerenciarCurso();
                                    $quantidade_cursos = $quantidade_cursos -> getQuantidadeCursos();

                                    echo $quantidade_cursos;
                                
                                ?>

                            </h2>
                            <div class="m-b-5">
                            
                                <?php 
                                    
                                    if($quantidade_cursos == 1) {

                                        echo "CURSO";

                                    }

                                    else {

                                        echo "CURSOS";

                                    }
                                
                                ?>

                            </div><i class="fa fa-play-circle widget-stat-icon"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="ibox bg-warning color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">
                        
                            <?php 
                            
                                $quantidade_aprovados = new GerenciarNota();
                                $quantidade_aprovados = $quantidade_aprovados -> obterQuantidadeAprovacoes();

                                echo $quantidade_aprovados;
                            
                            ?>

                        </h2>
                        <div class="m-b-5">
                        
                            <?php 
                            
                                if($quantidade_aprovados == 1) {

                                    echo "APROVAÇÃO";

                                }

                                else {

                                    echo "APROVAÇÕES";

                                }
                            
                            ?>
                        
                        </div><i class="fa fa-trophy money widget-stat-icon"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox">
                    <div class="ibox-body">
                        <div class="flexbox mb-4">
                            <div>
                                <div class="ibox-title" style="font-size: 16px; font-weight: 600;">Novos Usuários</div>
                            </div>
                        </div>
                        <div>
                            <canvas id="bar_chart" style="height:320px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Últimos Acessos</div>
                    </div>
                    <div class="ibox-body" style="height: 350px;">
                        
                        <?php 
                        
                            $tabela_ultimos_acessos = new GerenciarUsuario();
                            $tabela_ultimos_acessos = $tabela_ultimos_acessos -> gerarTabelaUltimosAcessos();

                            echo $tabela_ultimos_acessos;

                        ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Aprovações</div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Usuários</th>
                                    <th>Cursos</th>
                                    <th>Aproveitamento</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php 
                                
                                    $lista_aprovacoes = new GerenciarNota();
                                    $lista_aprovacoes = $lista_aprovacoes -> gerarListaAprovacoesAdmin();

                                    echo $lista_aprovacoes;
                                
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .visitors-table tbody tr td:last-child {
                display: flex;
                align-items: center;
            }

            .visitors-table .progress {
                flex: 1;
            }

            .visitors-table .progress-parcent {
                text-align: right;
                margin-left: 10px;
            }
        </style>
    </div>