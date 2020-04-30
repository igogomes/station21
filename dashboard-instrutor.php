<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-6 col-md-6">
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
                                    
                                    if($quantidade_cursos == 1 || $quantidade_cursos == 0) {

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
            <div class="col-lg-6 col-md-6">
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
                            
                                if($quantidade_usuarios == 1 || $quantidade_usuarios == 0) {

                                    echo "USUÁRIO";

                                }

                                else {

                                    echo "USUÁRIOS";

                                }
                            
                            ?>

                        </div><i class="fa fa-users widget-stat-icon"></i>
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
                        <div class="ibox-title">Últimos Inscritos</div>
                    </div>
                    <div class="ibox-body" style="height: 350px;">
                        
                        <?php 
                        
                            $tabela_ultimos_cadastros = new GerenciarUsuario();
                            $tabela_ultimos_cadastros = $tabela_ultimos_cadastros -> gerarTabelaUltimosCadastros();

                            echo $tabela_ultimos_cadastros;

                        ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Cursos</div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Cursos</th>
                                    <th>Última Atualização</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Atendimento ao Cliente</td>
                                    <td>01/02/2019</td>
                                    <td>Publicado</td>
                                </tr>
                                <tr>
                                    <td>Inbound Marketing</td>
                                    <td>05/07/2019</td>
                                    <td>Não Publicado</td>
                                </tr>
                                <tr>
                                    <td>Técnicas de Comunicação</td>
                                    <td>19/05/2019</td>
                                    <td>Publicado</td>
                                </tr>
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