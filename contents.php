<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $cod_conteudo = (isset($_GET["cod-delete-content"])) ? $_GET["cod-delete-content"] : "";
    $tipo_conteudo = (isset($_GET["type-content"])) ? $_GET["type-content"] : "";
    $cod_exercicio = (isset($_GET["cod-delete-exercise"])) ? $_GET["cod-delete-exercise"] : "";
    $cod_prova = (isset($_GET["cod-delete-test"])) ? $_GET["cod-delete-test"] : "";
    $excluir = (isset($_GET["delete-content"])) ? $_GET["delete-content"] : "";
    
    if($cod_conteudo != "" && $tipo_conteudo == 1 && $excluir == "") {

        $codigo_modulo = new GerenciarConteudo();
        $codigo_modulo = $codigo_modulo -> getCodigoModuloPorCodigoConteudo($cod_conteudo);

        $codigo_curso = new GerenciarModulo();
        $codigo_curso = $codigo_curso -> getCodigoCursoPorCodigoModulo($codigo_modulo);

        header("Location: overview-course?cod-course=$codigo_curso&cod-delete-content=$cod_conteudo&type-content=$tipo_conteudo");

    }

    if($cod_conteudo != "" && $tipo_conteudo == 1 && $excluir == 1) {

        $codigo_modulo = new GerenciarConteudo();
        $codigo_modulo = $codigo_modulo -> getCodigoModuloPorCodigoConteudo($cod_conteudo);

        $codigo_curso = new GerenciarModulo();
        $codigo_curso = $codigo_curso -> getCodigoCursoPorCodigoModulo($codigo_modulo);

        $excluir_conteudo = new GerenciarConteudo();
        $excluir_conteudo = $excluir_conteudo -> excluirConteudo($cod_conteudo);

        header("Location: overview-course?cod-course=$codigo_curso&cod-delete-content=$cod_conteudo&type-content=$tipo_conteudo&success-delete-content=1");

    }

    if($cod_conteudo != "" && $tipo_conteudo == 2 && $excluir == "") {

        $codigo_modulo = new GerenciarConteudo();
        $codigo_modulo = $codigo_modulo -> getCodigoModuloPorCodigoConteudo($cod_conteudo);

        $codigo_curso = new GerenciarModulo();
        $codigo_curso = $codigo_curso -> getCodigoCursoPorCodigoModulo($codigo_modulo);

        header("Location: overview-course?cod-course=$codigo_curso&cod-delete-content=$cod_conteudo&type-content=$tipo_conteudo");

    }

    if($cod_conteudo != "" && $tipo_conteudo == 2 && $excluir == 1) {

        $codigo_modulo = new GerenciarConteudo();
        $codigo_modulo = $codigo_modulo -> getCodigoModuloPorCodigoConteudo($cod_conteudo);

        $codigo_curso = new GerenciarModulo();
        $codigo_curso = $codigo_curso -> getCodigoCursoPorCodigoModulo($codigo_modulo);

        $excluir_conteudo = new GerenciarConteudo();
        $excluir_conteudo = $excluir_conteudo -> excluirConteudo($cod_conteudo);

        header("Location: overview-course?cod-course=$codigo_curso&cod-delete-content=$cod_conteudo&type-content=$tipo_conteudo&success-delete-content=1");

    }

    if($cod_conteudo != "" && $tipo_conteudo == 3 && $excluir == "") {

        $codigo_modulo = new GerenciarConteudo();
        $codigo_modulo = $codigo_modulo -> getCodigoModuloPorCodigoConteudo($cod_conteudo);

        $codigo_curso = new GerenciarModulo();
        $codigo_curso = $codigo_curso -> getCodigoCursoPorCodigoModulo($codigo_modulo);

        header("Location: overview-course?cod-course=$codigo_curso&cod-delete-content=$cod_conteudo&type-content=$tipo_conteudo");

    }

    if($cod_conteudo != "" && $tipo_conteudo == 3 && $excluir == 1) {

        $codigo_modulo = new GerenciarConteudo();
        $codigo_modulo = $codigo_modulo -> getCodigoModuloPorCodigoConteudo($cod_conteudo);

        $codigo_curso = new GerenciarModulo();
        $codigo_curso = $codigo_curso -> getCodigoCursoPorCodigoModulo($codigo_modulo);

        $excluir_conteudo = new GerenciarConteudo();
        $excluir_conteudo = $excluir_conteudo -> excluirConteudo($cod_conteudo);

        header("Location: overview-course?cod-course=$codigo_curso&cod-delete-content=$cod_conteudo&type-content=$tipo_conteudo&success-delete-content=1");

    }

    if($cod_conteudo != "" && $tipo_conteudo == 4 && $excluir == "") {

        $codigo_modulo = new GerenciarConteudo();
        $codigo_modulo = $codigo_modulo -> getCodigoModuloPorCodigoConteudo($cod_conteudo);

        $codigo_curso = new GerenciarModulo();
        $codigo_curso = $codigo_curso -> getCodigoCursoPorCodigoModulo($codigo_modulo);

        header("Location: overview-course?cod-course=$codigo_curso&cod-delete-content=$cod_conteudo&type-content=$tipo_conteudo");

    }

    if($cod_conteudo != "" && $tipo_conteudo == 4 && $excluir == 1) {

        $codigo_modulo = new GerenciarConteudo();
        $codigo_modulo = $codigo_modulo -> getCodigoModuloPorCodigoConteudo($cod_conteudo);

        $codigo_curso = new GerenciarModulo();
        $codigo_curso = $codigo_curso -> getCodigoCursoPorCodigoModulo($codigo_modulo);

        $excluir_conteudo = new GerenciarConteudo();
        $excluir_conteudo = $excluir_conteudo -> excluirConteudo($cod_conteudo);

        header("Location: overview-course?cod-course=$codigo_curso&cod-delete-content=$cod_conteudo&type-content=$tipo_conteudo&success-delete-content=1");

    }

    if($cod_exercicio != "" && $excluir == "") {

        $tipo_conteudo = 5;

        $codigo_modulo = new GerenciarExercicio();
        $codigo_modulo = $codigo_modulo -> getCodigoModuloPorCodigoExercicio($cod_exercicio);

        $codigo_curso = new GerenciarModulo();
        $codigo_curso = $codigo_curso -> getCodigoCursoPorCodigoModulo($codigo_modulo);

        header("Location: overview-course?cod-course=$codigo_curso&cod-delete-exercise=$cod_exercicio&type-content=$tipo_conteudo&type-evaluation=1");

    }

    if($cod_exercicio != "" && $excluir != "") {

        $tipo_conteudo = 5;

        $codigo_modulo = new GerenciarExercicio();
        $codigo_modulo = $codigo_modulo -> getCodigoModuloPorCodigoExercicio($cod_exercicio);

        $codigo_curso = new GerenciarModulo();
        $codigo_curso = $codigo_curso -> getCodigoCursoPorCodigoModulo($codigo_modulo);

        $excluir_questoes_exercicio = new GerenciarQuestao();
        $excluir_questoes_exercicio = $excluir_questoes_exercicio -> excluirQuestaoCodigoExercicio($cod_exercicio);

        $excluir_exercicio = new GerenciarExercicio();
        $excluir_exercicio = $excluir_exercicio -> excluirExercicio($cod_exercicio);

        header("Location: overview-course?cod-course=$codigo_curso&cod-delete-exercise=$cod_exercicio&type-content=$tipo_conteudo&type-evaluation=1&success-delete-content=1");

    }

    if($cod_prova != "" && $excluir == "") {

        $tipo_conteudo = 5;

        $codigo_curso = new GerenciarProva();
        $codigo_curso = $codigo_curso -> getCodigoCursoPorCodigoProva($cod_prova);

        header("Location: overview-course?cod-course=$codigo_curso&cod-delete-test=$cod_prova&type-content=$tipo_conteudo&type-evaluation=2");

    }

    if($cod_prova != "" && $excluir != "") {

        $tipo_conteudo = 5;

        $codigo_curso = new GerenciarProva();
        $codigo_curso = $codigo_curso -> getCodigoCursoPorCodigoProva($cod_prova);

        $excluir_questoes_prova = new GerenciarQuestao();
        $excluir_questoes_prova = $excluir_questoes_prova -> excluirQuestaoCodigoProva($cod_prova);

        $excluir_prova = new GerenciarProva();
        $excluir_prova = $excluir_prova -> excluirProva($cod_prova);

        header("Location: overview-course?cod-course=$codigo_curso&cod-delete-test=$cod_prova&type-content=$tipo_conteudo&type-evaluation=2&success-delete-content=1");

    } 

?>