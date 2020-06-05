<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];
    $permissao = $_SESSION['permissao'];

    $nota = 0;
    $test = "";

    $cod_usuario = $_POST["cod-usuario"];
    $cod_curso = $_POST["cod-curso"];
    $cod_prova = $_POST["cod-test"];
    $cod_exercicio = "";

    $escolha_questao_01 = $_POST["questao-01"];
    $escolha_questao_02 = $_POST["questao-02"];
    $escolha_questao_03 = $_POST["questao-03"];
    $escolha_questao_04 = $_POST["questao-04"];
    $escolha_questao_05 = $_POST["questao-05"];
    $escolha_questao_06 = $_POST["questao-06"];
    $escolha_questao_07 = $_POST["questao-07"];
    $escolha_questao_08 = $_POST["questao-08"];
    $escolha_questao_09 = $_POST["questao-09"];
    $escolha_questao_10 = $_POST["questao-10"];

    $cod_questao_01 = $_POST["cod-questao-01"];
    $cod_questao_02 = $_POST["cod-questao-02"];
    $cod_questao_03 = $_POST["cod-questao-03"];
    $cod_questao_04 = $_POST["cod-questao-04"];
    $cod_questao_05 = $_POST["cod-questao-05"];
    $cod_questao_06 = $_POST["cod-questao-06"];
    $cod_questao_07 = $_POST["cod-questao-07"];
    $cod_questao_08 = $_POST["cod-questao-08"];
    $cod_questao_09 = $_POST["cod-questao-09"];
    $cod_questao_10 = $_POST["cod-questao-10"];

    $resposta_questao_01 = new GerenciarQuestao();
    $resposta_questao_01 = $resposta_questao_01 -> getRespostaPorCodigoQuestao($cod_questao_01);

    $resposta_questao_02 = new GerenciarQuestao();
    $resposta_questao_02 = $resposta_questao_02 -> getRespostaPorCodigoQuestao($cod_questao_02);

    $resposta_questao_03 = new GerenciarQuestao();
    $resposta_questao_03 = $resposta_questao_03 -> getRespostaPorCodigoQuestao($cod_questao_03);

    $resposta_questao_04 = new GerenciarQuestao();
    $resposta_questao_04 = $resposta_questao_04 -> getRespostaPorCodigoQuestao($cod_questao_04);

    $resposta_questao_05 = new GerenciarQuestao();
    $resposta_questao_05 = $resposta_questao_05 -> getRespostaPorCodigoQuestao($cod_questao_05);

    $resposta_questao_06 = new GerenciarQuestao();
    $resposta_questao_06 = $resposta_questao_06 -> getRespostaPorCodigoQuestao($cod_questao_06);

    $resposta_questao_07 = new GerenciarQuestao();
    $resposta_questao_07 = $resposta_questao_07 -> getRespostaPorCodigoQuestao($cod_questao_07);

    $resposta_questao_08 = new GerenciarQuestao();
    $resposta_questao_08 = $resposta_questao_08 -> getRespostaPorCodigoQuestao($cod_questao_08);

    $resposta_questao_09 = new GerenciarQuestao();
    $resposta_questao_09 = $resposta_questao_09 -> getRespostaPorCodigoQuestao($cod_questao_09);

    $resposta_questao_10 = new GerenciarQuestao();
    $resposta_questao_10 = $resposta_questao_10 -> getRespostaPorCodigoQuestao($cod_questao_10);

    if($escolha_questao_01 == $resposta_questao_01) {

        $nota += 6;

    }

    if($escolha_questao_02 == $resposta_questao_02) {

        $nota += 6;

    }

    if($escolha_questao_03 == $resposta_questao_03) {

        $nota += 6;

    }

    if($escolha_questao_04 == $resposta_questao_04) {

        $nota += 6;

    }

    if($escolha_questao_05 == $resposta_questao_05) {

        $nota += 6;

    }

    if($escolha_questao_06 == $resposta_questao_06) {

        $nota += 6;

    }

    if($escolha_questao_07 == $resposta_questao_07) {

        $nota += 6;

    }

    if($escolha_questao_08 == $resposta_questao_08) {

        $nota += 6;

    }

    if($escolha_questao_09 == $resposta_questao_09) {

        $nota += 6;

    }

    if($escolha_questao_10 == $resposta_questao_10) {

        $nota += 6;

    }

    $verificar_nota_prova = new GerenciarNota();
    $verificar_nota_prova = $verificar_nota_prova -> verificarNotaProva($cod_usuario, $cod_curso, $cod_prova);

    if($verificar_nota_prova == 0) {

        $registrar_nota = new GerenciarNota();
        $registrar_nota = $registrar_nota -> setNota($cod_usuario, $cod_curso, $cod_exercicio, $cod_prova, $nota);

    }

    else {

        $obter_nota_prova = new GerenciarNota();
        $obter_nota_prova = $obter_nota_prova -> getNotaProva($cod_usuario, $cod_curso, $cod_prova);

        if($nota > $obter_nota_prova) {

            $atualizar_nota = new GerenciarNota();
            $atualizar_nota = $atualizar_nota -> atualizarNotaProva($cod_usuario, $cod_curso, $cod_prova, $nota);

        }

    }

    $test = base64_encode($nota);

    header("Location: result-evaluation?cod-course=$cod_curso&cod-test=$cod_prova&test=$test");

?>