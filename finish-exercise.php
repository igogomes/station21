<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];
    $permissao = $_SESSION['permissao'];

    $nota = 0;
    $exercise = "";

    $cod_usuario = $_POST["cod-usuario"];
    $cod_curso = $_POST["cod-curso"];
    $cod_exercicio = $_POST["cod-exercicio"];
    $cod_prova = "";

    $escolha_questao_01 = $_POST["questao-01"];
    $escolha_questao_02 = $_POST["questao-02"];
    $escolha_questao_03 = $_POST["questao-03"];
    $escolha_questao_04 = $_POST["questao-04"];
    $escolha_questao_05 = $_POST["questao-05"];

    $cod_questao_01 = $_POST["cod-questao-01"];
    $cod_questao_02 = $_POST["cod-questao-02"];
    $cod_questao_03 = $_POST["cod-questao-03"];
    $cod_questao_04 = $_POST["cod-questao-04"];
    $cod_questao_05 = $_POST["cod-questao-05"];

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

    if($escolha_questao_01 == $resposta_questao_01) {

        $nota += 2;

    }

    if($escolha_questao_02 == $resposta_questao_02) {

        $nota += 2;

    }

    if($escolha_questao_03 == $resposta_questao_03) {

        $nota += 2;

    }

    if($escolha_questao_04 == $resposta_questao_04) {

        $nota += 2;

    }

    if($escolha_questao_05 == $resposta_questao_05) {

        $nota += 2;

    }

    $verificar_nota_exercicio = new GerenciarNota();
    $verificar_nota_exercicio = $verificar_nota_exercicio -> verificarNotaExercicio($cod_usuario, $cod_curso, $cod_exercicio);

    if($verificar_nota_exercicio == 0) {

        $registrar_nota = new GerenciarNota();
        $registrar_nota = $registrar_nota -> setNota($cod_usuario, $cod_curso, $cod_exercicio, $cod_prova, $nota);

    }

    else {

        $obter_nota_exercicio = new GerenciarNota();
        $obter_nota_exercicio = $obter_nota_exercicio -> getNotaExercicio($cod_usuario, $cod_curso, $cod_exercicio);

        if($nota > $obter_nota_exercicio) {

            $atualizar_nota = new GerenciarNota();
            $atualizar_nota = $atualizar_nota -> atualizarNotaExercicio($cod_usuario, $cod_curso, $cod_exercicio, $nota);

        }

    }

    $exercise = base64_encode($nota);

    header("Location: result-evaluation?cod-course=$cod_curso&cod-exercise=$cod_exercicio&exercise=$exercise");

?>