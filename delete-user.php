<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $cod_usuario = (isset($_GET["cod-user"])) ? $_GET["cod-user"] : "";
    $cod_instrutor_substituicao = (isset($_POST["cod-user-replace"])) ? $_POST["cod-user-replace"] : "";

    if($cod_instrutor_substituicao != "") {

        $cod_usuario = (isset($_POST["cod-user"])) ? $_POST["cod-user"] : "";

    }

    $permissao = new GerenciarUsuario();
    $permissao = $permissao -> getPermissaoPorCodigoUsuario($cod_usuario);
    
    if($permissao == 1) {

        $excluir_usuario = new GerenciarUsuario();
        $excluir_usuario = $excluir_usuario -> excluirUsuario($cod_usuario);

        header("Location: users?delete-user=2");

    }

    if($permissao == 2) {

        $quantidade_instrutores = new GerenciarUsuario();
        $quantidade_instrutores = $quantidade_instrutores -> getQuantidadeInstrutores();

    }

    if($permissao == 2 && $cod_instrutor_substituicao == "" && $quantidade_instrutores > 1) {

        header("Location: users?cod-user-instructor=$cod_usuario&replace-user=1");

    }

    if($permissao == 2 && $cod_instrutor_substituicao != "" && $quantidade_instrutores > 1) {

        $substituir_instrutor = new GerenciarCurso();
        $substituir_instrutor = $substituir_instrutor -> substituirInstrutorCursos($cod_usuario, $cod_instrutor_substituicao);

        $excluir_usuario = new GerenciarUsuario();
        $excluir_usuario = $excluir_usuario -> excluirUsuario($cod_usuario);

        header("Location: users?delete-user=2");

    }

    if($permissao == 2 && $quantidade_instrutores <= 1) {

        header("Location: users?erro-replace-user=1");

    }

    if($permissao == 3) { 

        $excluir_avaliacoes = new GerenciarAvaliacao();
        $excluir_avaliacoes = $excluir_avaliacoes -> excluirAvaliacaoPorCodigoUsuario($cod_usuario);

        $excluir_inscricoes = new GerenciarInscricao();
        $excluir_inscricoes = $excluir_inscricoes -> excluirInscricaoPorCodigoUsuario($cod_usuario);

        $excluir_notas = new GerenciarNota();
        $excluir_notas = $excluir_notas -> excluirNotaPorCodigoUsuario($cod_usuario);

        $excluir_presenca = new GerenciarPresenca();
        $excluir_presenca = $excluir_presenca -> excluirPresencaPorCodigoUsuario($cod_usuario);

        $excluir_usuario = new GerenciarUsuario();
        $excluir_usuario = $excluir_usuario -> excluirUsuario($cod_usuario);

        header("Location: users?delete-user=2");

    }

?>