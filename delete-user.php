<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $cod_usuario = $_GET["cod-user"];

    $permissao = new GerenciarUsuario();
    $permissao = $permissao -> getPermissaoPorCodigoUsuario($cod_usuario);

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

    }

    if($permissao == 1) {

        $excluir_usuario = new GerenciarUsuario();
        $excluir_usuario = $excluir_usuario -> excluirUsuario($cod_usuario);

    }

    header("Location: users?delete-user=2");

?>