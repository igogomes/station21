<?php 

    session_start();
    ob_start();

    include_once "Autoload.inc";

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $localizar_usuario = new AutenticarUsuario();
    $localizar_usuario = $localizar_usuario -> localizarUsuario($email);

    $validar_acesso = new AutenticarUsuario();
    $validar_acesso = $validar_acesso -> validarAcesso($email, $senha);

    if($email == "" || $senha == "") {

        $_SESSION["aviso"] = "Os campos são obrigatórios.";
        header("Location: login");
        close();

    }

    if($localizar_usuario == 0) {

        $_SESSION["aviso"] = "Usuário não encontrado.";
        header("Location: login");
        close();

    }

    else if($localizar_usuario > 1) {

        $_SESSION["aviso"] = "Erro! Informe o administrador.";
        header("Location: login");
        close();

    }

    else {

        if($validar_acesso == 0) {

            $_SESSION["aviso"] = "Usuário ou senha inválido.";
            header("Location: login");
            close();

        }

        else if($validar_acesso > 1) {

            $_SESSION["aviso"] = "Erro! Informe o administrador.";
            header("Location: login");
            close();

        }

        else {

            $permissao = new AutenticarUsuario();
            $permissao = $permissao -> getPermissao($email);

            $atualizar_ultimo_acesso = new GerenciarUsuario();
            $atualizar_ultimo_acesso = $atualizar_ultimo_acesso -> AtualizarUltimoAcesso($email);

            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['permissao'] = $permissao;
            header("Location: index");

        }

    }

?>