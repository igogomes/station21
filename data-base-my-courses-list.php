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
                        <li class="breadcrumb-item">
                            <a href="courses">Cursos</a>
                        </li>
                        <li class="breadcrumb-item">Meus Cursos</li>
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
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Cursos</th>
                                    <th>Instrutor</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                    
                                <?php 
                                            
                                    $tabela_meus_cursos = new GerenciarCurso();
                                    $tabela_meus_cursos = $tabela_meus_cursos -> gerarTabelaCompletaMeusCursos($cod_usuario);

                                    if($tabela_meus_cursos != "") {

                                        echo $tabela_meus_cursos; 

                                    }

                                    else {

                                        echo "<tr>
                                                <td colspan=\"4\">Você não está inscrito(a) em nenhum curso ainda.</td>
                                              </tr>";

                                    }
                                            
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>