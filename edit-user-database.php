<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $cod_usuario = $_POST["cod-edicao-usuario"];
    $nome = utf8_decode($_POST['nome-edicao-usuario']);
    $email = $_POST['email-edicao-usuario'];
    $permissao = $_POST['permissao-edicao-usuario'];

    $atualizar_dados_usuario = new GerenciarUsuario();
    $atualizar_dados_usuario = $atualizar_dados_usuario -> atualizarDadosUsuario($cod_usuario, $nome, $email, $permissao);

    header("Location: edit-user?cod-user=$cod_usuario&sucesso-edicao=1");

?>