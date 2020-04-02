<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $cod_usuario = $_GET["cod-user"];

    $excluir_usuario = new GerenciarUsuario();
    $excluir_usuario = $excluir_usuario -> excluirUsuario($cod_usuario);

    header("Location: users?delete-user=2");

?>