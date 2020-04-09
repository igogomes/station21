<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $cod_usuario = $_POST["cod-edicao-usuario"];
    $nome = utf8_decode($_POST['nome-edicao-usuario']);
    $email_original = $_POST['email-usuario'];
    $email = $_POST['email-edicao-usuario'];
    $permissao = $_POST['permissao-edicao-usuario'];

    if($email_original != $email) {

        $verificar_email_existente = new GerenciarUsuario();
        $verificar_email_existente = $verificar_email_existente -> verificarEmailExistente($email);

        if($verificar_email_existente == 0) {

            $atualizar_dados_usuario = new GerenciarUsuario();
            $atualizar_dados_usuario = $atualizar_dados_usuario -> atualizarDadosUsuario($cod_usuario, $nome, $email, $permissao);

            header("Location: edit-user?cod-user=$cod_usuario&sucesso-edicao=1");

        }

        else {

            header("Location: edit-user?cod-user=$cod_usuario&erro-edicao=1&erro-email=$email");

        }

    }

    else {

        $atualizar_dados_usuario = new GerenciarUsuario();
        $atualizar_dados_usuario = $atualizar_dados_usuario -> atualizarDadosUsuario($cod_usuario, $nome, $email, $permissao);

        header("Location: edit-user?cod-user=$cod_usuario&sucesso-edicao=1");

    }

?>