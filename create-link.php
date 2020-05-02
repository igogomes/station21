<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $cod_curso = $_POST["cod-course"];
    $cod_modulo = $_POST["modulo"];
    $link = $_POST["link"];
    $titulo = $_POST["titulo-link"];

    if ($cod_modulo == 0 || $cod_modulo == "") {

        header("Location: create-link-content?cod-course=$cod_curso&erro-link=1");

    }

    else if(strstr($link, "http") == FALSE && strstr($link, ":") == FALSE) {

        header("Location: create-link-content?cod-course=$cod_curso&erro-link=2");

    }

    else {

        $cadastrar_link = new GerenciarConteudo();
        $cadastrar_link = $cadastrar_link -> setConteudo($cod_modulo, 4, '', $link, '', $titulo);

        header("Location: create-content?cod-curso=$cod_curso&content-type=4&create-content=1"); 

    }

?>