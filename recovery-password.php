<?php 

    session_start();
    ob_start();

    include_once "Autoload.inc";

    $email = $_POST["email"];

    $verificar_email = new GerenciarUsuario();
    $verificar_email = $verificar_email -> verificarEmailExistente($email);

    if($verificar_email != 0) {

        $recuperar_senha = new Mensageiro();
        $recuperar_senha = $recuperar_senha ->  emailRecuperarSenha($email);

        $_SESSION["aviso"] = "Senha enviada para seu e-mail com sucesso.";

        header("Location: forgot-password");
        close();

    }

    else {

        $_SESSION["erro"] = "Este e-mail não está cadastrado.";

        header("Location: forgot-password"); 
        close();

    }

?>