<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $cod_categoria = $_GET["cod-delete-category"];

    $verificar_associacao_categoria = new GerenciarCurso();
    $verificar_associacao_categoria = $verificar_associacao_categoria -> verificarCategoriaAssociada($cod_categoria);

    if($verificar_associacao_categoria == 0) {

        $excluir_usuario = new GerenciarCategoria();
        $excluir_usuario = $excluir_usuario -> excluirCategoria($cod_categoria); 

        header("Location: categories?delete-category=2");

    }

    else {

        header("Location: categories?delete-category=3");

    }

?>