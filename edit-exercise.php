<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $cod_exercicio = $_POST["cod-exercicio"];

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

    $atualizar_questao_01 = new GerenciarQuestao();
    $atualizar_questao_01 = $atualizar_questao_01 -> atualizarDadosQuestao($cod_questao_01, $enunciado_questao_01, $primeira_alternativa_questao_01, $segunda_alternativa_questao_01, $terceira_alternativa_questao_01, $quarta_alternativa_questao_01, $resposta_questao_01);
    
    $atualizar_questao_02 = new GerenciarQuestao();
    $atualizar_questao_02 = $atualizar_questao_02 -> atualizarDadosQuestao($cod_questao_02, $enunciado_questao_02, $primeira_alternativa_questao_02, $segunda_alternativa_questao_02, $terceira_alternativa_questao_02, $quarta_alternativa_questao_02, $resposta_questao_02);

    $atualizar_questao_03 = new GerenciarQuestao();
    $atualizar_questao_03 = $atualizar_questao_03 -> atualizarDadosQuestao($cod_questao_03, $enunciado_questao_03, $primeira_alternativa_questao_03, $segunda_alternativa_questao_03, $terceira_alternativa_questao_03, $quarta_alternativa_questao_03, $resposta_questao_03);

    $atualizar_questao_04 = new GerenciarQuestao();
    $atualizar_questao_04 = $atualizar_questao_04 -> atualizarDadosQuestao($cod_questao_04, $enunciado_questao_04, $primeira_alternativa_questao_04, $segunda_alternativa_questao_04, $terceira_alternativa_questao_04, $quarta_alternativa_questao_04, $resposta_questao_04);

    header("Location: edit-content?cod-exercise=$cod_exercicio&edit-content=1");

?>