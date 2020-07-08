<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $email = $_SESSION['email'];

    $cod_usuario = new GerenciarUsuario();
    $cod_usuario = $cod_usuario -> getCodigoUsuarioPorEmail($email);

    $cod_curso = (isset($_POST["cod-course"])) ? $_POST["cod-course"] : "";
    $nota_curso = (isset($_POST["grade"])) ? $_POST["grade"] : "";
    $descricao_avaliacao_curso = (isset($_POST["description-grade"])) ? $_POST["description-grade"] : "";

    $descricao_avaliacao_curso = utf8_decode($descricao_avaliacao_curso);

    $verificar_avaliacao = new GerenciarAvaliacao();
    $verificar_avaliacao = $verificar_avaliacao -> verificarAvaliacaoExistente($cod_curso, $cod_usuario);

    if($verificar_avaliacao == 0) {

        $cadastrar_avaliacao = new GerenciarAvaliacao();
        $cadastrar_avaliacao = $cadastrar_avaliacao -> setAvaliacao($cod_curso, $cod_usuario, $nota_curso, $descricao_avaliacao_curso);

        header("Location: view-course?cod-course=$cod_curso&classify-course=1&success-classify=1"); 

    }

    else {

        $atualizar_avaliacao = new GerenciarAvaliacao();
        $atualizar_avaliacao = $atualizar_avaliacao -> atualizarAvaliacao($cod_curso, $cod_usuario, $nota_curso, $descricao_avaliacao_curso);

        header("Location: view-course?cod-course=$cod_curso&classify-course=1&success-classify=2"); 

    }

?>