<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Cadastrar Categoria</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="courses">Categoria</a>
            </li>
            <li class="breadcrumb-item">Cadastrar Categoria</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">

                <?php 

                    if($erro_categoria == 1) {

                ?>

                    <div class="alert alert-danger alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        A categoria <strong><?php echo $titulo_categoria; ?></strong> já está cadastrada.
                    </div>

                <?php 

                    }

                    if($sucesso_cadastro_categoria == 1) {

                ?>

                    <div class="alert alert-success alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        O cadastro foi realizado com <strong>sucesso</strong>.
                    </div>

                <?php

                    }

                ?>

                <div class="ibox">
                    <div class="ibox-body">
                        <form class="form-horizontal" action="create-category" method="post">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Título</label>
                                <div class="col-sm-10">
                                    <input name="titulo" class="form-control" type="text" placeholder="Digite o título da categoria" maxlength="100" autofocus required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <button class="btn btn-info" type="submit">Cadastrar</button>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>