<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Meus Cursos</h1>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="./">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">Cursos</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12" style="text-align:right">
                    <a href="my-courses">
                        <button class="btn btn-success">Ver Mais</button> 
                    </a>
                </div>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Cursos</th>
                                <th>Instrutor</th>
                                <th>Status</th>
                                <th>Ações</th>
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
        <br>
        <h1 class="page-title">Outros Cursos</h1>
            <div class="row">
                <div class="col-lg-12 col-md-12" style="text-align:right">
                    <a href="other-courses">
                        <button class="btn btn-success">Ver Mais</button> 
                    </a>
                </div>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Cursos</th>
                                <th>Instrutor</th>
                                <th>Avaliação</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                
                                $tabela_outros_cursos = new GerenciarCurso();
                                $tabela_outros_cursos = $tabela_outros_cursos -> gerarTabelaOutrosCursos();

                                echo $tabela_outros_cursos;

                                if($tabela_outros_cursos == "") {
                            
                            ?>

                                    <tr>
                                        <td colspan="4"><div style="text-align: center;">Não foram encontrados outros cursos</div></td>
                                    </tr>

                            <?php 
                            
                                }
                            
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        <br>
        <h1 class="page-title">Novos Cursos</h1>
            <div class="row">
                <div class="col-lg-12 col-md-12" style="text-align:right">
                    <a href="new-courses">
                        <button class="btn btn-success">Ver Mais</button> 
                    </a>
                </div>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Cursos</th>
                                <th>Instrutor</th>
                                <th>Avaliação</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                            
                                $tabela_novos_cursos = new GerenciarCurso();
                                $tabela_novos_cursos = $tabela_novos_cursos -> gerarTabelaNovosCursos();

                                echo $tabela_novos_cursos;

                                if($tabela_novos_cursos == "") {
                            
                            ?>

                                    <tr>
                                        <td colspan="4"><div style="text-align: center;">Não foram encontrados novos cursos</div></td>
                                    </tr>

                            <?php 
                            
                                }
                            
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>