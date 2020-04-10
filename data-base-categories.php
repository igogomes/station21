<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Categorias</h1>
        <div class="row">
            <div class="col-md-12">

                <?php 

                    if($excluir_categoria == 1) {

                ?>

                    <div class="alert alert-danger alert-dismissable fade show">
                        <a href="categories" class="close" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </a>
                        <h4>Atenção!</h4>
                        <p>Você realmente deseja excluir a categoria <strong><?php echo utf8_encode($titulo_categoria_excluir); ?></strong>?</p>
                        <p>
                            <a href="delete-category?cod-delete-category=<?php echo $cod_excluir_categoria; ?>" class="btn btn-danger" style="color:#fff;">Sim</a>
                            <a href="categories" class="btn btn-default" style="color:#000;">Não</a>
                        </p>
                    </div>

                <?php

                    }

                    if($excluir_categoria == 2) {
                        
                ?>

                    <div class="alert alert-success alert-dismissable fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                        Os dados da categoria foram excluídos com <strong>sucesso</strong>.
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
                        <a href="index">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">Categorias</li> 
                </ol>
            </div>
            <div class="col-lg-6 col-md-6" style="text-align:right">
                <a href="create-category">
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
                                <th>Categoria</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Categoria</th>
                                <th>Ações</th>
                            </tr>
                        </tfoot>
                        <tbody>
                                
                            <?php 
                                        
                                $tabela_categorias = new GerenciarCategoria();
                                $tabela_categorias = $tabela_categorias -> gerarTabelaCategorias();

                                echo $tabela_categorias; 
                                        
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>