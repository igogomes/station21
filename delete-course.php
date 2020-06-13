<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $cod_curso = $_GET["cod-delete-course"];

    $excluir_questoes_exercicios_curso = new GerenciarQuestao();
    $excluir_questoes_exercicios_curso = $excluir_questoes_exercicios_curso -> excluirQuestoesExercicioCodigoCurso($cod_curso);

    $excluir_questoes_prova_curso = new GerenciarQuestao();
    $excluir_questoes_prova_curso = $excluir_questoes_prova_curso -> excluirQuestoesProvaCodigoCurso($cod_curso);

    $excluir_exercicios_curso = new GerenciarExercicio();
    $excluir_exercicios_curso = $excluir_exercicios_curso -> excluirExerciciosCodigoCurso($cod_curso);

    $excluir_prova_curso = new GerenciarProva();
    $excluir_prova_curso = $excluir_prova_curso -> excluirProvaCodigoCurso($cod_curso);

    $excluir_conteudo_curso = new GerenciarConteudo();
    $excluir_conteudo_curso = $excluir_conteudo_curso -> excluirConteudoCodigoCurso($cod_curso);

    $excluir_modulo = new GerenciarModulo();
    $excluir_modulo = $excluir_modulo -> excluirModulo($cod_curso);

    $excluir_presenca = new GerenciarPresenca();
    $excluir_presenca = $excluir_presenca -> excluirPresencaCodigoCurso($cod_curso);

    $excluir_inscricao = new GerenciarInscricao();
    $excluir_inscricao = $excluir_inscricao -> excluirInscricaoCodigoCurso($cod_curso);

    $excluir_avaliacao = new GerenciarAvaliacao();
    $excluir_avaliacao = $excluir_avaliacao -> excluirAvaliacaoCodigoCurso($cod_curso);

    $excluir_nota = new GerenciarNota();
    $excluir_nota = $excluir_nota -> excluirNotaCodigoCurso($cod_curso);

    $excluir_curso = new GerenciarCurso();
    $excluir_curso = $excluir_curso -> excluirCurso($cod_curso);

    header("Location: courses?delete-course=2");

?>