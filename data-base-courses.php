<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Cursos</h1>
        <div class="row">
            <div class="col-md-12">

                <?php 

                    if($excluir_curso == 1) {

                ?>

                <div class="alert alert-danger alert-dismissable fade show">
                    <a href="courses" class="close" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                    <h4>Atenção!</h4>
                    <p>Você realmente deseja excluir o curso <?php echo $titulo_curso_excluir; ?>? Todas as informações relacionadas ao mesmo serão 
                    excluídas, usuários inscritos serão desvinculados e seus progressos serão perdidos.</p>
                    <p>
                        <a href="delete-course?cod-delete-course=<?php echo $cod_excluir_curso; ?>" class="btn btn-danger" style="color:#fff;">Sim</a>
                        <a href="courses" class="btn btn-default" style="color:#000;">Não</a>
                    </p>
                </div>

                <?php

                    }

                    if($excluir_curso == 2) {
                        
                ?>

                    <div class="alert alert-success alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        Os dados do curso foram excluídos com <strong>sucesso</strong>.
                    </div>

                <?php

                    }

                    if($erro_cadastro_curso == 1) {

                ?>

                    <div class="alert alert-danger alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        O curso <strong><?php echo $titulo_curso_cadastrado; ?></strong> já está cadastrado.
                    </div>        

                <?php 
                
                    }

                ?>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="./">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">Cursos</li>
                </ol>
            </div>
            <div class="col-lg-6 col-md-6" style="text-align:right">
                <a href="create-course">
                    <button class="btn btn-success">Cadastrar</button>
                </a>
            </div>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Curso</th>
                                <th>Instrutor</th>
                                <th>Última Atualização</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Curso</th>
                                <th>Instrutor</th>
                                <th>Última Atualização</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </tfoot>
                        <tbody>
                                
                            <?php 
                                        
                                $tabela_cursos = new GerenciarCurso();
                                $tabela_cursos = $tabela_cursos -> gerarTabelaCursos();

                                echo $tabela_cursos; 
                                        
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>