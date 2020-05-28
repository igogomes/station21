<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title"><?php echo utf8_encode($titulo_conteudo); ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="./">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="courses">Cursos</a>
            </li>
            <li class="breadcrumb-item">
                <a href="view-course?cod-course=<?php echo $cod_curso; ?>"><?php echo utf8_encode($titulo_curso); ?></a>
            </li>
            <li class="breadcrumb-item"><?php echo utf8_encode($titulo_conteudo); ?></li> 
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <div class="form-group row">
                            <div class="col-sm-12">

                                <?php 

                                    $exibir_texto = new GerenciarConteudo();
                                    $exibir_texto = $exibir_texto -> getTextoPorCodigoConteudo($cod_conteudo);

                                    echo $exibir_texto;

                                ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 ml-sm-auto"> 
                                <a href="view-course?cod-course=<?php echo $cod_curso; ?>" class="btn btn-info" type="submit">Voltar</a>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>