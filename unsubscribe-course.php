<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $email = $_SESSION['email'];

    $cod_usuario = new GerenciarUsuario();
    $cod_usuario = $cod_usuario -> getCodigoUsuarioPorEmail($email);

    $cod_curso = (isset($_GET["cod-course"])) ? $_GET["cod-course"] : "";
    $remover_inscricao_curso = (isset($_GET["unsubscribe-course"])) ? $_GET["unsubscribe-course"] : "";

    if($remover_inscricao_curso == "") {

        $verificar_inscricao = new GerenciarInscricao();
        $verificar_inscricao = $verificar_inscricao -> verificarInscricao($cod_usuario, $cod_curso);

        if($verificar_inscricao != 0) {

            $obter_presenca_curso = new GerenciarPresenca();
            $obter_presenca_curso = $obter_presenca_curso -> getPresencaPorCodigoUsuarioECodigoCurso($cod_usuario, $cod_curso);

            $obter_nota_curso = new GerenciarNota();
            $obter_nota_curso = $obter_nota_curso -> getNotaCurso($cod_usuario, $cod_curso);

            if($obter_presenca_curso == "100%" && $obter_nota_curso >= 70) { 

                header("Location: courses?unsubscribe-course=1&cod-unsubscribe-course=$cod_curso&erro-unsubscribe=1");

            }

            else {

                header("Location: courses?unsubscribe-course=1&cod-unsubscribe-course=$cod_curso&confirm-unsubscribe=1");

            }

        }

        else {

            header("Location: courses?unsubscribe-course=1&cod-unsubscribe-course=$cod_curso&erro-unsubscribe=2");

        }

    }

    else if($remover_inscricao_curso == 1) {

        $excluir_avaliacao = new GerenciarAvaliacao();
        $excluir_avaliacao = $excluir_avaliacao -> excluirAvaliacao($cod_usuario, $cod_curso);

        $excluir_presenca = new GerenciarPresenca();
        $excluir_presenca = $excluir_presenca -> excluirPresenca($cod_usuario, $cod_curso);

        $excluir_inscricao = new GerenciarInscricao();
        $excluir_inscricao = $excluir_inscricao -> excluirInscricao($cod_usuario, $cod_curso);

        $excluir_nota = new GerenciarNota();
        $excluir_nota = $excluir_nota -> excluirNota($cod_usuario, $cod_curso);

        header("Location: courses?unsubscribe-course=1&cod-unsubscribe-course=$cod_curso&success-unsubscribe=1");

    }

    else {

        header("Location: courses?unsubscribe-course=1&cod-unsubscribe-course=$cod_curso&erro-unsubscribe=2");

    }

?>