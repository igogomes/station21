<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $cod_conteudo = $_POST["cod-content"];
    $cod_modulo = $_POST["modulo"];
    $texto = $_POST["texto"];
    $titulo = $_POST["titulo-texto"];

    $atualizar_texto = new GerenciarConteudo();
    $atualizar_texto = $atualizar_texto -> atualizarDadosConteudo($cod_conteudo, $cod_modulo, "", "", $texto, $titulo);

    header("Location: edit-content?cod-content=$cod_conteudo&content-type=2&edit-content=1"); 

?>