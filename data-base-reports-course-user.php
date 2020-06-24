<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Relatório do Curso de <?php echo $titulo_curso; ?></h1>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="./">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="./reports">Relatórios</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="./view-report-user?cod-user=<?php echo $cod_usuario; ?>">Relatórios Cursos</a>
                    </li>
                    <li class="breadcrumb-item">Relatório do Curso de <?php echo $titulo_curso; ?></li>
                </ol>
            </div>
        </div>
        <div class="page-content fade-in-up"> 
            <div class="ibox">
                <div class="ibox-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <?php echo $nome_usuario; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-sm-10">
                            <?php echo $email_usuario; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Curso</label>
                        <div class="col-sm-10">
                            <?php echo $titulo_curso; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <?php echo $presenca_curso . " dos vídeos assistidos"; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <table class="table table-striped table-hover" style="width: 98%; margin-left: auto; margin-right: auto;">
                            <thead>
                                <tr>
                                    <th>Atividade</th>
                                    <th>Valor</th>
                                    <th>Nota</th>
                                </tr>
                            </thead>
                            <tbody>
                                    
                                <?php 
                                            
                                    $tabela_relatorio_notas = new GerenciarNota();
                                    $tabela_relatorio_notas = $tabela_relatorio_notas -> gerarRelatorioNotasExerciciosUsuarioPorCurso($cod_usuario, $cod_curso);

                                    echo $tabela_relatorio_notas;
                                            
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-10 col-form-label">
                        
                            <?php 
                            
                                $nota_curso = new GerenciarNota();
                                $nota_curso = $nota_curso -> getNotaCurso($cod_usuario, $cod_curso);

                                if($nota_curso >= 70) {

                                    echo "<strong>Aprovado(a)</strong>";

                                }
                            
                            ?>

                        </label>
                        <div class="col-sm-2">

                            <?php 
                                
                                $nota_curso = new GerenciarNota();
                                $nota_curso = $nota_curso -> getNotaCurso($cod_usuario, $cod_curso);

                                if($nota_curso >= 70) {
                            
                            ?>

                                    <form action="generate-certification" method="post">
                                        <input type="hidden" name="cod-course" value="<?php echo $cod_curso; ?>"/>
                                        <input type="hidden" name="cod-user" value="<?php echo $cod_usuario; ?>"/> 
                                        <button class="btn btn-success">Emitir Certificado</button>
                                    </form>

                            <?php 
                            
                                }
                            
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>