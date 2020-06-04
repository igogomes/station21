<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Nota do Exercício</h1>
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
            <li class="breadcrumb-item">
                <?php echo $titulo_modulo; ?>
            </li>
            <li class="breadcrumb-item">Nota do Exercício</li> 
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <form action="finish-exercise" method="post">
                            <div class="form-group row">
                                <div class="col-sm-6 ml-sm-auto" style="padding-top: 70px; padding-bottom: 70px;"> 
                                    <span style="font-size: 18px;">A sua nota para o exercício do</span> <br>
                                    <span style="font-size: 24px; font-weight: bold;"><?php echo $titulo_modulo; ?></span> <br>
                                    <span style="font-size: 18px;">do curso de</span> <br>
                                    <span style="font-size: 24px; font-weight: bold;"><?php echo $titulo_curso; ?></span> <br>
                                    <span style="font-size: 18px;">é:</span> 
                                </div>
                                <div class="col-sm-6 ml-sm-auto" style="padding-top: 70px; padding-bottom: 70px; text-align: center;"> 
                                <span style="font-size: 75px; border: 5px solid <?php if($ultima_nota_exercicio >= 0 && $ultima_nota_exercicio <= 5) { echo "#E74C3C;"; } else if($ultima_nota_exercicio > 5 && $ultima_nota_exercicio < 7) { echo "#F39C12;"; } else { echo "#2ECC71;"; } ?> border-radius: 50%; <?php if(strlen($ultima_nota_exercicio) == 1) { echo "padding: 20px 50px;"; } else { echo "padding: 20px 30px;"; } ?> color: <?php if($ultima_nota_exercicio >= 0 && $ultima_nota_exercicio <= 5) { echo "#E74C3C;"; } else if($ultima_nota_exercicio > 5 && $ultima_nota_exercicio < 7) { echo "#F39C12;"; } else { echo "#2ECC71;"; } ?>"><?php echo $ultima_nota_exercicio; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 ml-sm-auto"> 
                                    <a href="view-course?cod-course=<?php echo $cod_curso; ?>" class="btn btn-info">Voltar</a>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>