<?php 

include "validate-session.inc";
include_once "Autoload.inc";

$cod_curso = $_GET["cod-delete-course"];

$excluir_curso = new GerenciarCurso();
$excluir_curso = $excluir_curso -> excluirCurso($cod_curso);

$excluir_modulo = new GerenciarModulo();
$excluir_modulo = $excluir_modulo -> excluirModulo($cod_curso);

header("Location: courses?delete-course=2");

?>