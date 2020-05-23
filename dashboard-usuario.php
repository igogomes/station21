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
                            <div class="m-b-5">CURSOS ATIVOS</div><i class="fa fa-play-circle widget-stat-icon"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="ibox bg-warning color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">7</h2>
                        <div class="m-b-5">CURSOS CONCLUÍDOS</div><i class="fa fa-trophy money widget-stat-icon"></i>
                    </div>
                </div>
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
                                    <th>Data</th>
                                    <th>Aproveitamento</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Empregabilidade</td>
                                    <td>Atividade de Revisão 01</td>
                                    <td>14/12/2019</td>
                                    <td>80%</td>
                                </tr>
                                <tr>
                                    <td>Atendimento ao Cliente</td>
                                    <td>Avaliação Final</td>
                                    <td>05/10/2019</td>
                                    <td>70%</td>
                                </tr>
                                <tr>
                                    <td>Técnicas de Negociação</td>
                                    <td>Atividade Avaliativa 01</td>
                                    <td>29/09/2019</td>
                                    <td>20%</td>
                                </tr>
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
                                    <th>Data</th>
                                    <th>Aproveitamento</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>HTML</td>
                                    <td>08/12/2019</td>
                                    <td>80%</td>
                                </tr>
                                <tr>
                                    <td>Marketing Digital</td>
                                    <td>07/11/2019</td>
                                    <td>70%</td>
                                </tr>
                                <tr>
                                    <td>Atendimento ao Cliente</td>
                                    <td>05/10/2019</td>
                                    <td>80%</td>
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