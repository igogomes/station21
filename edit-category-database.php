<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $cod_categoria = $_POST["cod-edicao-categoria"];
    $categoria = $_POST['titulo-edicao-categoria'];
    $titulo_original_categoria = $_POST['titulo-categoria'];

    if($categoria != $titulo_original_categoria) {

        $verificar_categoria_existente = new GerenciarCategoria();
        $verificar_categoria_existente = $verificar_categoria_existente -> verificarCategoriaExistente($categoria);

        if($verificar_categoria_existente == 0) {

            $atualizar_dados_categoria = new GerenciarCategoria();
            $atualizar_dados_categoria = $atualizar_dados_categoria -> atualizarDadosCategoria($cod_categoria, $categoria);

            header("Location: edit-category?cod-category=$cod_categoria&sucesso-edicao=1");

        }

        else {

            header("Location: edit-category?cod-category=$cod_categoria&erro-edicao=1&erro-categoria=$categoria");

        }

    }

    else {

        header("Location: edit-category?cod-category=$cod_categoria&erro-edicao=1&erro-categoria=$categoria");

    }

?>