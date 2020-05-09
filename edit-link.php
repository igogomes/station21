<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $cod_conteudo = $_POST["cod-content"];
    $cod_modulo = $_POST["modulo"];
    $link = $_POST["link"];
    $titulo = $_POST["titulo-link"];

    if(strstr($link, "http") == FALSE && strstr($link, ":") == FALSE) {

        header("Location: edit-content?cod-content=$cod_conteudo&erro-link=1");

    }

    else {

        $atualizar_link = new GerenciarConteudo();
        $atualizar_link = $atualizar_link -> atualizarDadosConteudo($cod_conteudo, $cod_modulo, "", $link, "", $titulo);

        header("Location: edit-content?cod-content=$cod_conteudo&content-type=4&edit-content=1");

    }

?>