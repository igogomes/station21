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
                <div class="col-md-12">

                    <?php 

                        if($inscricao_curso == 1 && $resultado_inscricao_curso == 2) { 

                    ?>

                        <div class="alert alert-danger alert-dismissable fade show">
                            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                            Você já está inscrito(a) no curso <strong><?php echo $titulo_curso_inscricao; ?></strong>.
                        </div>

                    <?php 

                        }

                        if($inscricao_curso == 1 && $resultado_inscricao_curso == 1) {

                    ?>

                        <div class="alert alert-success alert-dismissable fade show">
                            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                            Sua inscrição no curso <strong><?php echo $titulo_curso_inscricao; ?></strong> foi realizada com <strong>sucesso</strong>.
                        </div>

                    <?php

                        } 

                        if($remover_inscricao_curso == 1 && $erro_remover_inscricao_curso == 1) {

                    ?>

                            <div class="alert alert-danger alert-dismissable fade show">
                                <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                                Não é possível remover sua inscrição do curso <strong><?php echo $titulo_curso_remover_inscricao; ?></strong> porque você já concluiu o mesmo.
                            </div>

                    <?php

                        }

                        if($remover_inscricao_curso == 1 && $erro_remover_inscricao_curso == 2) {

                    ?>

                            <div class="alert alert-danger alert-dismissable fade show">
                                <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                                Ocorreu um <strong>erro</strong> na tentativa de remover sua inscrição.
                            </div>

                    <?php 
                    
                        }

                        if($remover_inscricao_curso == 1 && $confirmar_remover_inscricao_curso == 1) {
                    
                    ?>

                            <div class="alert alert-danger alert-dismissable fade show">
                                <a href="courses" class="close" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </a>
                                <h4>Atenção!</h4>
                                <p>Você realmente deseja remover sua inscrição do curso <strong><?php echo $titulo_curso_remover_inscricao; ?></strong>? Todo seu progresso será perdido.</p>
                                <p>
                                    <a href="unsubscribe-course?cod-course=<?php echo $cod_curso_remover_inscricao; ?>&unsubscribe-course=1" class="btn btn-danger" style="color:#fff;">Sim</a>
                                    <a href="courses" class="btn btn-default" style="color:#000;">Não</a>
                                </p>
                            </div>

                    <?php 
                    
                        }

                        if($remover_inscricao_curso == 1 && $inscricao_curso_remocao_sucesso == 1) {

                    ?>

                        <div class="alert alert-success alert-dismissable fade show">
                            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                            Sua inscrição no curso <strong><?php echo $titulo_curso_remover_inscricao; ?></strong> foi removida com <strong>sucesso</strong>.
                        </div>

                    <?php 
                    
                        }
                    
                    ?>

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
                                <th>Status Vídeos</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                
                                $tabela_meus_cursos = new GerenciarCurso();
                                $tabela_meus_cursos = $tabela_meus_cursos -> gerarTabelaMeusCursos($cod_usuario);

                                echo $tabela_meus_cursos;

                                if($tabela_meus_cursos == "") {
                            
                            ?>

                                    <tr>
                                        <td colspan="4"><div style="text-align: center;">Não foram encontradas inscrições em cursos</div></td>
                                    </tr>

                            <?php 
                            
                                }
                            
                            ?>

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