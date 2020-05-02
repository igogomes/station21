<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $cod_curso = $_POST["cod-course"];
    $cod_modulo = $_POST["modulo"];
    $texto = $_POST["texto"];
    $titulo = $_POST["titulo-texto"];

    if ($cod_modulo == 0 || $cod_modulo == "") {

        header("Location: create-text-content?cod-course=$cod_curso&erro-texto=1");

    }

    else {

        $cadastrar_texto = new GerenciarConteudo();
        $cadastrar_texto = $cadastrar_texto -> setConteudo($cod_modulo, 2, '', '', $texto, $titulo);

        header("Location: create-content?cod-curso=$cod_curso&content-type=2&create-content=1"); 

    }

?>