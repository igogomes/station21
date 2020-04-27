<?php 

include "validate-session.inc";
include_once "Autoload.inc";

$cod_curso = $_GET["cod-delete-course"];

$excluir_curso = new GerenciarCurso();
$excluir_curso = $excluir_curso -> excluirCurso($cod_curso);

header("Location: courses?delete-course=2");

?>