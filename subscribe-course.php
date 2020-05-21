<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $email = $_SESSION['email'];

    $cod_usuario = new GerenciarUsuario();
    $cod_usuario = $cod_usuario -> getCodigoUsuarioPorEmail($email);

    $cod_curso = (isset($_GET["cod-course"])) ? $_GET["cod-course"] : "";

    $verificar_inscricao = new GerenciarInscricao();
    $verificar_inscricao = $verificar_inscricao -> verificarInscricao($cod_usuario, $cod_curso);

    if($verificar_inscricao == 0) { 

        $inscrever_usuario = new GerenciarInscricao();
        $inscrever_usuario = $inscrever_usuario -> setInscricao($cod_curso, $cod_usuario);

        header("Location: courses?subscribe-course=1&success-subscribe=1&cod-subscribe-course=$cod_curso"); 

    }

    else {

        header("Location: courses?subscribe-course=1&success-subscribe=2&cod-subscribe-course=$cod_curso"); 

    }

?>