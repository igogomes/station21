<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Editar Categoria</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="categories">Categorias</a>
            </li>
            <li class="breadcrumb-item">Editar Categoria</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">

                <?php 

                    if($erro_edicao == 1) { 

                ?>

                    <div class="alert alert-danger alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        A categoria <strong><?php echo $erro_categoria; ?></strong> já está cadastrada.
                    </div>

                <?php 

                    }

                    if($sucesso_edicao_categoria == 1) {

                ?>

                    <div class="alert alert-success alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        Os dados da categoria foram alterados com <strong>sucesso</strong>.
                    </div>

                <?php

                    }

                ?>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <form class="form-horizontal" action="edit-category-database" method="post">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Categoria</label>
                                <div class="col-sm-10">
                                    <input name="titulo-edicao-categoria" class="form-control" type="text" placeholder="Digite o título da categoria" maxlength="100" value="<?php echo utf8_encode($titulo); ?>" required>
                                </div> 

                                <input type="hidden" name="cod-edicao-categoria" value="<?php echo $cod_categoria; ?>">
                                <input type="hidden" name="titulo-categoria" value="<?php echo $titulo; ?>">

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <button class="btn btn-info" type="submit">Salvar</button>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>