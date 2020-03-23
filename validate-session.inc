<?php 

    session_start();
    ob_start();

    include_once "Autoload.inc";

    if(IsSet($_SESSION["email"])) {
            
        $email = $_SESSION["email"];
        
    }

    if(IsSet($_SESSION["senha"])) {
        
        $senha = $_SESSION["senha"];
        
    }

    if(IsSet($_SESSION["permissao"])) {

        $permissao = $_SESSION["permissao"];

    }

    if(!(empty($email) OR empty($senha))) {

        $localizar_usuario = new AutenticarUsuario();
        $localizar_usuario = $localizar_usuario -> localizarUsuario($email);

        $validar_acesso = new AutenticarUsuario();
        $validar_acesso = $validar_acesso -> validarAcesso($email, $senha);

        if($localizar_usuario == 0) {

            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            unset($_SESSION['permissao']);
            $_SESSION["aviso"] = "Acesso não autorizado.";
            header("Location: login");
    
        }
    
        else if($localizar_usuario > 1) {
    
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            unset($_SESSION['permissao']);
            $_SESSION["aviso"] = "Acesso não autorizado.";
            header("Location: login");
    
        }
    
        else {
    
            if($validar_acesso == 0) {
    
                unset($_SESSION['email']);
                unset($_SESSION['senha']);
                unset($_SESSION['permissao']);
                $_SESSION["aviso"] = "Acesso não autorizado.";
                header("Location: login");
    
            }
    
            else if($validar_acesso > 1) {
    
                unset($_SESSION['email']);
                unset($_SESSION['senha']);
                unset($_SESSION['permissao']);
                $_SESSION["aviso"] = "Acesso não autorizado.";
                header("Location: login");
    
            }
    
        }

    }

    else {

        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        unset($_SESSION['permissao']);
        $_SESSION["aviso"] = "Acesso não autorizado.";
        header("Location: login");

    }

?>