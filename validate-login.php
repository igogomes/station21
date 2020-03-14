<?php 

    session_start();
    ob_start();

    include_once "Autoload.inc";

    $login = $_POST["user"];
    $senha = $_POST["password"];

    $login = preg_replace('/[^[:alnum:]_]/', '',$login);
    $senha = preg_replace('/[^[:alnum:]_]/', '',$senha);

    $registrar_login = new AutenticarUsuario();
    $registrar_login = $registrar_login -> removerCaracteresEspeciais($login);

    $localizar_usuario = new AutenticarUsuario();
    $localizar_usuario = $localizar_usuario -> localizarUsuario($registrar_login);

    $validar_acesso = new AutenticarUsuario();
    $validar_acesso = $validar_acesso -> validarAcesso($registrar_login, $senha);

    if($login == "" || $senha == "") {

        $_SESSION["aviso"] = "Os campos são obrigatórios";
        header("Location: login");

    }

    if($localizar_usuario == 0) {

        $_SESSION["aviso"] = "Usuário não encontrado.";
        header("Location: login");

    }

    else if($localizar_usuario > 1) {

        $_SESSION["aviso"] = "Erro! Informe o administrador.";
        header("Location: login");

    }

    else {

        if($validar_acesso == 0) {

            $_SESSION["aviso"] = "Usuário ou senha inválido.";
            header("Location: login");

        }

        else if($validar_acesso > 1) {

            $_SESSION["aviso"] = "Erro! Informe o administrador.";
            header("Location: login");

        }

        else {

            $_SESSION['user'] = $registrar_login;
            $_SESSION['password'] = $senha;
            header("Location: index");

        }

    }

?>