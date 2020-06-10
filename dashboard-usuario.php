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
                                
                                    $quantidade_cursos_ativos = new GerenciarInscricao();
                                    $quantidade_cursos_ativos = $quantidade_cursos_ativos -> verificarCursosAtivos($cod_usuario);

                                    echo $quantidade_cursos_ativos;
                                
                                ?>

                            </h2>
                            <div class="m-b-5">
                            
                                <?php 
                                
                                    if($quantidade_cursos_ativos == 0) {

                                        echo "CURSOS ATIVOS";

                                    }

                                    else if($quantidade_cursos_ativos == 1) {

                                        echo "CURSO ATIVO";

                                    }

                                    else {

                                        echo "CURSOS ATIVOS";

                                    }
                                
                                ?>
                            
                            </div><i class="fa fa-play-circle widget-stat-icon"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6">
                <a href="courses">
                    <div class="ibox bg-warning color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">
                            
                                <?php 
                                
                                    $quantidade_cursos_concluidos = new GerenciarNota();
                                    $quantidade_cursos_concluidos = $quantidade_cursos_concluidos -> verificarCursosConcluidos($cod_usuario);
                                
                                    echo $quantidade_cursos_concluidos;

                                ?>
                            
                            </h2>
                            <div class="m-b-5">
                            
                                <?php 
                                    
                                    if($quantidade_cursos_concluidos == 0) {

                                        echo "CURSOS CONCLUÍDOS";

                                    }

                                    else if($quantidade_cursos_concluidos == 1) {

                                        echo "CURSO CONCLUÍDO";

                                    }

                                    else {

                                        echo "CURSOS CONCLUÍDOS";

                                    }
                                
                                ?>

                            </div><i class="fa fa-trophy money widget-stat-icon"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Últimas Atividades</div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Curso</th>
                                    <th>Atividade</th>
                                    <th>Nota</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php 
                                
                                    $lista_ultimas_atividades = new GerenciarNota();
                                    $lista_ultimas_atividades = $lista_ultimas_atividades -> gerarListaUltimasAtividades($cod_usuario);

                                    echo $lista_ultimas_atividades;
                                
                                ?>

                            </tbody>
                        </table>
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
                                    <th>Curso</th>
                                    <th>Aproveitamento</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php 
                                
                                    $lista_aprovacoes = new GerenciarNota();
                                    $lista_aprovacoes = $lista_aprovacoes -> gerarListaAprovacoes($cod_usuario);

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