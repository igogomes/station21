<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $cod_prova = $_POST["cod-prova"];

    $cod_questao_01 = $_POST["cod-questao-01"];
    $enunciado_questao_01 = $_POST["enunciado-questao-01"];
    $primeira_alternativa_questao_01 = $_POST["primeira-alternativa-questao-01"];
    $segunda_alternativa_questao_01 = $_POST["segunda-alternativa-questao-01"];
    $terceira_alternativa_questao_01 = $_POST["terceira-alternativa-questao-01"];
    $quarta_alternativa_questao_01 = $_POST["quarta-alternativa-questao-01"];
    $resposta_questao_01 = $_POST["resposta-questao-01"];

    $cod_questao_02 = $_POST["cod-questao-02"];
    $enunciado_questao_02 = $_POST["enunciado-questao-02"];
    $primeira_alternativa_questao_02 = $_POST["primeira-alternativa-questao-02"];
    $segunda_alternativa_questao_02 = $_POST["segunda-alternativa-questao-02"];
    $terceira_alternativa_questao_02 = $_POST["terceira-alternativa-questao-02"];
    $quarta_alternativa_questao_02 = $_POST["quarta-alternativa-questao-02"];
    $resposta_questao_02 = $_POST["resposta-questao-02"];

    $cod_questao_03 = $_POST["cod-questao-03"];
    $enunciado_questao_03 = $_POST["enunciado-questao-03"];
    $primeira_alternativa_questao_03 = $_POST["primeira-alternativa-questao-03"];
    $segunda_alternativa_questao_03 = $_POST["segunda-alternativa-questao-03"];
    $terceira_alternativa_questao_03 = $_POST["terceira-alternativa-questao-03"];
    $quarta_alternativa_questao_03 = $_POST["quarta-alternativa-questao-03"];
    $resposta_questao_03 = $_POST["resposta-questao-03"];

    $cod_questao_04 = $_POST["cod-questao-04"];
    $enunciado_questao_04 = $_POST["enunciado-questao-04"];
    $primeira_alternativa_questao_04 = $_POST["primeira-alternativa-questao-04"];
    $segunda_alternativa_questao_04 = $_POST["segunda-alternativa-questao-04"];
    $terceira_alternativa_questao_04 = $_POST["terceira-alternativa-questao-04"];
    $quarta_alternativa_questao_04 = $_POST["quarta-alternativa-questao-04"];
    $resposta_questao_04 = $_POST["resposta-questao-04"];

    $cod_questao_05 = $_POST["cod-questao-05"];
    $enunciado_questao_05 = $_POST["enunciado-questao-05"];
    $primeira_alternativa_questao_05 = $_POST["primeira-alternativa-questao-05"];
    $segunda_alternativa_questao_05 = $_POST["segunda-alternativa-questao-05"];
    $terceira_alternativa_questao_05 = $_POST["terceira-alternativa-questao-05"];
    $quarta_alternativa_questao_05 = $_POST["quarta-alternativa-questao-05"];
    $resposta_questao_05 = $_POST["resposta-questao-05"];

    $cod_questao_06 = $_POST["cod-questao-06"];
    $enunciado_questao_06 = $_POST["enunciado-questao-06"];
    $primeira_alternativa_questao_06 = $_POST["primeira-alternativa-questao-06"];
    $segunda_alternativa_questao_06 = $_POST["segunda-alternativa-questao-06"];
    $terceira_alternativa_questao_06 = $_POST["terceira-alternativa-questao-06"];
    $quarta_alternativa_questao_06 = $_POST["quarta-alternativa-questao-06"];
    $resposta_questao_06 = $_POST["resposta-questao-06"];

    $cod_questao_07 = $_POST["cod-questao-07"];
    $enunciado_questao_07 = $_POST["enunciado-questao-07"];
    $primeira_alternativa_questao_07 = $_POST["primeira-alternativa-questao-07"];
    $segunda_alternativa_questao_07 = $_POST["segunda-alternativa-questao-07"];
    $terceira_alternativa_questao_07 = $_POST["terceira-alternativa-questao-07"];
    $quarta_alternativa_questao_07 = $_POST["quarta-alternativa-questao-07"];
    $resposta_questao_07 = $_POST["resposta-questao-07"];

    $cod_questao_08 = $_POST["cod-questao-08"];
    $enunciado_questao_08 = $_POST["enunciado-questao-08"];
    $primeira_alternativa_questao_08 = $_POST["primeira-alternativa-questao-08"];
    $segunda_alternativa_questao_08 = $_POST["segunda-alternativa-questao-08"];
    $terceira_alternativa_questao_08 = $_POST["terceira-alternativa-questao-08"];
    $quarta_alternativa_questao_08 = $_POST["quarta-alternativa-questao-08"];
    $resposta_questao_08 = $_POST["resposta-questao-08"];

    $cod_questao_09 = $_POST["cod-questao-09"];
    $enunciado_questao_09 = $_POST["enunciado-questao-09"];
    $primeira_alternativa_questao_09 = $_POST["primeira-alternativa-questao-09"];
    $segunda_alternativa_questao_09 = $_POST["segunda-alternativa-questao-09"];
    $terceira_alternativa_questao_09 = $_POST["terceira-alternativa-questao-09"];
    $quarta_alternativa_questao_09 = $_POST["quarta-alternativa-questao-09"];
    $resposta_questao_09 = $_POST["resposta-questao-09"];

    $cod_questao_10 = $_POST["cod-questao-10"];
    $enunciado_questao_10 = $_POST["enunciado-questao-10"];
    $primeira_alternativa_questao_10 = $_POST["primeira-alternativa-questao-10"];
    $segunda_alternativa_questao_10 = $_POST["segunda-alternativa-questao-10"];
    $terceira_alternativa_questao_10 = $_POST["terceira-alternativa-questao-10"];
    $quarta_alternativa_questao_10 = $_POST["quarta-alternativa-questao-10"];
    $resposta_questao_10 = $_POST["resposta-questao-10"];

    $atualizar_questao_01 = new GerenciarQuestao();
    $atualizar_questao_01 = $atualizar_questao_01 -> atualizarDadosQuestao($cod_questao_01, $enunciado_questao_01, $primeira_alternativa_questao_01, $segunda_alternativa_questao_01, $terceira_alternativa_questao_01, $quarta_alternativa_questao_01, $resposta_questao_01);
    
    $atualizar_questao_02 = new GerenciarQuestao();
    $atualizar_questao_02 = $atualizar_questao_02 -> atualizarDadosQuestao($cod_questao_02, $enunciado_questao_02, $primeira_alternativa_questao_02, $segunda_alternativa_questao_02, $terceira_alternativa_questao_02, $quarta_alternativa_questao_02, $resposta_questao_02);

    $atualizar_questao_03 = new GerenciarQuestao();
    $atualizar_questao_03 = $atualizar_questao_03 -> atualizarDadosQuestao($cod_questao_03, $enunciado_questao_03, $primeira_alternativa_questao_03, $segunda_alternativa_questao_03, $terceira_alternativa_questao_03, $quarta_alternativa_questao_03, $resposta_questao_03);

    $atualizar_questao_04 = new GerenciarQuestao();
    $atualizar_questao_04 = $atualizar_questao_04 -> atualizarDadosQuestao($cod_questao_04, $enunciado_questao_04, $primeira_alternativa_questao_04, $segunda_alternativa_questao_04, $terceira_alternativa_questao_04, $quarta_alternativa_questao_04, $resposta_questao_04);

    $atualizar_questao_05 = new GerenciarQuestao();
    $atualizar_questao_05 = $atualizar_questao_05 -> atualizarDadosQuestao($cod_questao_05, $enunciado_questao_05, $primeira_alternativa_questao_05, $segunda_alternativa_questao_05, $terceira_alternativa_questao_05, $quarta_alternativa_questao_05, $resposta_questao_05);

    $atualizar_questao_06 = new GerenciarQuestao();
    $atualizar_questao_06 = $atualizar_questao_06 -> atualizarDadosQuestao($cod_questao_06, $enunciado_questao_06, $primeira_alternativa_questao_06, $segunda_alternativa_questao_06, $terceira_alternativa_questao_06, $quarta_alternativa_questao_06, $resposta_questao_06);

    $atualizar_questao_07 = new GerenciarQuestao();
    $atualizar_questao_07 = $atualizar_questao_07 -> atualizarDadosQuestao($cod_questao_07, $enunciado_questao_07, $primeira_alternativa_questao_07, $segunda_alternativa_questao_07, $terceira_alternativa_questao_07, $quarta_alternativa_questao_07, $resposta_questao_07);

    $atualizar_questao_08 = new GerenciarQuestao();
    $atualizar_questao_08 = $atualizar_questao_08 -> atualizarDadosQuestao($cod_questao_08, $enunciado_questao_08, $primeira_alternativa_questao_08, $segunda_alternativa_questao_08, $terceira_alternativa_questao_08, $quarta_alternativa_questao_08, $resposta_questao_08);

    $atualizar_questao_09 = new GerenciarQuestao();
    $atualizar_questao_09 = $atualizar_questao_09 -> atualizarDadosQuestao($cod_questao_09, $enunciado_questao_09, $primeira_alternativa_questao_09, $segunda_alternativa_questao_09, $terceira_alternativa_questao_09, $quarta_alternativa_questao_09, $resposta_questao_09);

    $atualizar_questao_10 = new GerenciarQuestao();
    $atualizar_questao_10 = $atualizar_questao_10 -> atualizarDadosQuestao($cod_questao_10, $enunciado_questao_10, $primeira_alternativa_questao_10, $segunda_alternativa_questao_10, $terceira_alternativa_questao_10, $quarta_alternativa_questao_10, $resposta_questao_10);

    header("Location: edit-content?cod-test=$cod_prova&edit-content=1");

?>