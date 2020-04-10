<?php 

include "validate-session.inc";
include_once "Autoload.inc";

$cod_categoria = $_GET["cod-delete-category"];

$excluir_usuario = new GerenciarCategoria();
$excluir_usuario = $excluir_usuario -> excluirCategoria($cod_categoria);

header("Location: categories?delete-category=2");

?>