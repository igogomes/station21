<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Outros Cursos</h1>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="./">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="courses">Cursos</a>
                        </li>
                        <li class="breadcrumb-item">Outros Cursos</li>
                    </ol>
                </div>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Cursos</th>
                                    <th>Instrutor</th>
                                    <th>Avaliação</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Cursos</th>
                                    <th>Instrutor</th>
                                    <th>Avaliação</th>
                                    <th>Ações</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                    
                                <?php 
                                            
                                    $tabela_outros_cursos = new GerenciarCurso();
                                    $tabela_outros_cursos = $tabela_outros_cursos -> gerarTabelaCompletaOutrosCursos();

                                    echo $tabela_outros_cursos; 
                                            
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>