<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];
    $permissao = $_SESSION['permissao'];

    $nome = new AutenticarUsuario();
    $nome = utf8_encode($nome -> getNomeUsuario($email));

    $cod_conteudo = (isset($_GET["cod-content"])) ? $_GET["cod-content"] : "";
    $tipo_conteudo_edicao = (isset($_GET["content-type"])) ? $_GET["content-type"] : "";
    $edicao_conteudo = (isset($_GET["edit-content"])) ? $_GET["edit-content"] : "";
    $cod_exercicio = (isset($_GET["cod-exercise"])) ? $_GET["cod-exercise"] : "";
    $cod_prova = (isset($_GET["cod-test"])) ? $_GET["cod-test"] : "";

    $cod_modulo = new GerenciarConteudo();
    $cod_modulo = $cod_modulo -> getCodigoModuloPorCodigoConteudo($cod_conteudo);

    $cod_curso = new GerenciarModulo();
    $cod_curso = $cod_curso -> getCodigoCursoPorCodigoModulo($cod_modulo); 

    $titulo_curso = new GerenciarCurso();
    $titulo_curso = $titulo_curso -> getTituloCursoPorCodigo($cod_curso);

    $cod_tipo = new GerenciarConteudo();
    $cod_tipo = $cod_tipo -> getTipoConteudoPorCodigoConteudo($cod_conteudo); 

    if($cod_exercicio != "") {

        $cod_tipo = 5;
        $cod_tipo_avaliacao = 1;

        $cod_modulo = new GerenciarExercicio();
        $cod_modulo = $cod_modulo -> getCodigoModuloPorCodigoExercicio($cod_exercicio); 

        $cod_curso = new GerenciarModulo();
        $cod_curso = $cod_curso -> getCodigoCursoPorCodigoModulo($cod_modulo);

        $titulo_curso = new GerenciarCurso();
        $titulo_curso = $titulo_curso -> getTituloCursoPorCodigo($cod_curso);

        $cod_questao_01 = new GerenciarQuestao();
        $cod_questao_01 = $cod_questao_01 -> getCodigoQuestaoPorCodigoExercicioEPosicao($cod_exercicio, 1);

        $enunciado_questao_01 = new GerenciarQuestao();
        $enunciado_questao_01 = utf8_encode($enunciado_questao_01 -> getEnunciadoPorCodigoQuestao($cod_questao_01));

        $primeira_alternativa_01 = new GerenciarQuestao();
        $primeira_alternativa_01 = utf8_encode($primeira_alternativa_01 -> getPrimeiraAlternativaPorCodigoQuestao($cod_questao_01));

        $segunda_alternativa_01 = new GerenciarQuestao();
        $segunda_alternativa_01 = utf8_encode($segunda_alternativa_01 -> getSegundaAlternativaPorCodigoQuestao($cod_questao_01));

        $terceira_alternativa_01 = new GerenciarQuestao();
        $terceira_alternativa_01 = utf8_encode($terceira_alternativa_01 -> getTerceiraAlternativaPorCodigoQuestao($cod_questao_01));

        $quarta_alternativa_01 = new GerenciarQuestao();
        $quarta_alternativa_01 = utf8_encode($quarta_alternativa_01 -> getQuartaAlternativaPorCodigoQuestao($cod_questao_01));

        $resposta_alternativa_01 = new GerenciarQuestao();
        $resposta_alternativa_01 = $resposta_alternativa_01 -> getRespostaPorCodigoQuestao($cod_questao_01);

        $cod_questao_02 = new GerenciarQuestao();
        $cod_questao_02 = $cod_questao_02 -> getCodigoQuestaoPorCodigoExercicioEPosicao($cod_exercicio, 2);

        $enunciado_questao_02 = new GerenciarQuestao();
        $enunciado_questao_02 = utf8_encode($enunciado_questao_02 -> getEnunciadoPorCodigoQuestao($cod_questao_02));

        $primeira_alternativa_02 = new GerenciarQuestao();
        $primeira_alternativa_02 = utf8_encode($primeira_alternativa_02 -> getPrimeiraAlternativaPorCodigoQuestao($cod_questao_02));

        $segunda_alternativa_02 = new GerenciarQuestao();
        $segunda_alternativa_02 = utf8_encode($segunda_alternativa_02 -> getSegundaAlternativaPorCodigoQuestao($cod_questao_02));

        $terceira_alternativa_02 = new GerenciarQuestao();
        $terceira_alternativa_02 = utf8_encode($terceira_alternativa_02 -> getTerceiraAlternativaPorCodigoQuestao($cod_questao_02));

        $quarta_alternativa_02 = new GerenciarQuestao();
        $quarta_alternativa_02 = utf8_encode($quarta_alternativa_02 -> getQuartaAlternativaPorCodigoQuestao($cod_questao_02));

        $resposta_alternativa_02 = new GerenciarQuestao();
        $resposta_alternativa_02 = $resposta_alternativa_02 -> getRespostaPorCodigoQuestao($cod_questao_02);

        $cod_questao_03 = new GerenciarQuestao();
        $cod_questao_03 = $cod_questao_03 -> getCodigoQuestaoPorCodigoExercicioEPosicao($cod_exercicio, 3);

        $enunciado_questao_03 = new GerenciarQuestao();
        $enunciado_questao_03 = utf8_encode($enunciado_questao_03 -> getEnunciadoPorCodigoQuestao($cod_questao_03));

        $primeira_alternativa_03 = new GerenciarQuestao();
        $primeira_alternativa_03 = utf8_encode($primeira_alternativa_03 -> getPrimeiraAlternativaPorCodigoQuestao($cod_questao_03));

        $segunda_alternativa_03 = new GerenciarQuestao();
        $segunda_alternativa_03 = utf8_encode($segunda_alternativa_03 -> getSegundaAlternativaPorCodigoQuestao($cod_questao_03));

        $terceira_alternativa_03 = new GerenciarQuestao();
        $terceira_alternativa_03 = utf8_encode($terceira_alternativa_03 -> getTerceiraAlternativaPorCodigoQuestao($cod_questao_03));

        $quarta_alternativa_03 = new GerenciarQuestao();
        $quarta_alternativa_03 = utf8_encode($quarta_alternativa_03 -> getQuartaAlternativaPorCodigoQuestao($cod_questao_03));

        $resposta_alternativa_03 = new GerenciarQuestao();
        $resposta_alternativa_03 = $resposta_alternativa_03 -> getRespostaPorCodigoQuestao($cod_questao_03);

        $cod_questao_04 = new GerenciarQuestao();
        $cod_questao_04 = $cod_questao_04 -> getCodigoQuestaoPorCodigoExercicioEPosicao($cod_exercicio, 4);

        $enunciado_questao_04 = new GerenciarQuestao();
        $enunciado_questao_04 = utf8_encode($enunciado_questao_04 -> getEnunciadoPorCodigoQuestao($cod_questao_04));

        $primeira_alternativa_04 = new GerenciarQuestao();
        $primeira_alternativa_04 = utf8_encode($primeira_alternativa_04 -> getPrimeiraAlternativaPorCodigoQuestao($cod_questao_04));

        $segunda_alternativa_04 = new GerenciarQuestao();
        $segunda_alternativa_04 = utf8_encode($segunda_alternativa_04 -> getSegundaAlternativaPorCodigoQuestao($cod_questao_04));

        $terceira_alternativa_04 = new GerenciarQuestao();
        $terceira_alternativa_04 = utf8_encode($terceira_alternativa_04 -> getTerceiraAlternativaPorCodigoQuestao($cod_questao_04));

        $quarta_alternativa_04 = new GerenciarQuestao();
        $quarta_alternativa_04 = utf8_encode($quarta_alternativa_04 -> getQuartaAlternativaPorCodigoQuestao($cod_questao_04));

        $resposta_alternativa_04 = new GerenciarQuestao();
        $resposta_alternativa_04 = $resposta_alternativa_04 -> getRespostaPorCodigoQuestao($cod_questao_04);

    }

    if($cod_prova != "") {

        $cod_tipo = 5;
        $cod_tipo_avaliacao = 2;

        $cod_curso = new GerenciarProva();
        $cod_curso = $cod_curso -> getCodigoCursoPorCodigoProva($cod_prova);

        $titulo_curso = new GerenciarCurso();
        $titulo_curso = $titulo_curso -> getTituloCursoPorCodigo($cod_curso);

        $cod_questao_01 = new GerenciarQuestao();
        $cod_questao_01 = $cod_questao_01 -> getCodigoQuestaoPorCodigoProvaEPosicao($cod_prova, 1);

        $enunciado_questao_01 = new GerenciarQuestao();
        $enunciado_questao_01 = utf8_encode($enunciado_questao_01 -> getEnunciadoPorCodigoQuestao($cod_questao_01));

        $primeira_alternativa_01 = new GerenciarQuestao();
        $primeira_alternativa_01 = utf8_encode($primeira_alternativa_01 -> getPrimeiraAlternativaPorCodigoQuestao($cod_questao_01));

        $segunda_alternativa_01 = new GerenciarQuestao();
        $segunda_alternativa_01 = utf8_encode($segunda_alternativa_01 -> getSegundaAlternativaPorCodigoQuestao($cod_questao_01));

        $terceira_alternativa_01 = new GerenciarQuestao();
        $terceira_alternativa_01 = utf8_encode($terceira_alternativa_01 -> getTerceiraAlternativaPorCodigoQuestao($cod_questao_01));

        $quarta_alternativa_01 = new GerenciarQuestao();
        $quarta_alternativa_01 = utf8_encode($quarta_alternativa_01 -> getQuartaAlternativaPorCodigoQuestao($cod_questao_01));

        $resposta_alternativa_01 = new GerenciarQuestao();
        $resposta_alternativa_01 = $resposta_alternativa_01 -> getRespostaPorCodigoQuestao($cod_questao_01);

        $cod_questao_02 = new GerenciarQuestao();
        $cod_questao_02 = $cod_questao_02 -> getCodigoQuestaoPorCodigoProvaEPosicao($cod_prova, 2);

        $enunciado_questao_02 = new GerenciarQuestao();
        $enunciado_questao_02 = utf8_encode($enunciado_questao_02 -> getEnunciadoPorCodigoQuestao($cod_questao_02));

        $primeira_alternativa_02 = new GerenciarQuestao();
        $primeira_alternativa_02 = utf8_encode($primeira_alternativa_02 -> getPrimeiraAlternativaPorCodigoQuestao($cod_questao_02));

        $segunda_alternativa_02 = new GerenciarQuestao();
        $segunda_alternativa_02 = utf8_encode($segunda_alternativa_02 -> getSegundaAlternativaPorCodigoQuestao($cod_questao_02));

        $terceira_alternativa_02 = new GerenciarQuestao();
        $terceira_alternativa_02 = utf8_encode($terceira_alternativa_02 -> getTerceiraAlternativaPorCodigoQuestao($cod_questao_02));

        $quarta_alternativa_02 = new GerenciarQuestao();
        $quarta_alternativa_02 = utf8_encode($quarta_alternativa_02 -> getQuartaAlternativaPorCodigoQuestao($cod_questao_02));

        $resposta_alternativa_02 = new GerenciarQuestao();
        $resposta_alternativa_02 = $resposta_alternativa_02 -> getRespostaPorCodigoQuestao($cod_questao_02);

        $cod_questao_03 = new GerenciarQuestao();
        $cod_questao_03 = $cod_questao_03 -> getCodigoQuestaoPorCodigoProvaEPosicao($cod_prova, 3);
        
        $enunciado_questao_03 = new GerenciarQuestao();
        $enunciado_questao_03 = utf8_encode($enunciado_questao_03 -> getEnunciadoPorCodigoQuestao($cod_questao_03));

        $primeira_alternativa_03 = new GerenciarQuestao();
        $primeira_alternativa_03 = utf8_encode($primeira_alternativa_03 -> getPrimeiraAlternativaPorCodigoQuestao($cod_questao_03));

        $segunda_alternativa_03 = new GerenciarQuestao();
        $segunda_alternativa_03 = utf8_encode($segunda_alternativa_03 -> getSegundaAlternativaPorCodigoQuestao($cod_questao_03));

        $terceira_alternativa_03 = new GerenciarQuestao();
        $terceira_alternativa_03 = utf8_encode($terceira_alternativa_03 -> getTerceiraAlternativaPorCodigoQuestao($cod_questao_03));

        $quarta_alternativa_03 = new GerenciarQuestao();
        $quarta_alternativa_03 = utf8_encode($quarta_alternativa_03 -> getQuartaAlternativaPorCodigoQuestao($cod_questao_03));

        $resposta_alternativa_03 = new GerenciarQuestao();
        $resposta_alternativa_03 = $resposta_alternativa_03 -> getRespostaPorCodigoQuestao($cod_questao_03);

        $cod_questao_04 = new GerenciarQuestao();
        $cod_questao_04 = $cod_questao_04 -> getCodigoQuestaoPorCodigoProvaEPosicao($cod_prova, 4);

        $enunciado_questao_04 = new GerenciarQuestao();
        $enunciado_questao_04 = utf8_encode($enunciado_questao_04 -> getEnunciadoPorCodigoQuestao($cod_questao_04));

        $primeira_alternativa_04 = new GerenciarQuestao();
        $primeira_alternativa_04 = utf8_encode($primeira_alternativa_04 -> getPrimeiraAlternativaPorCodigoQuestao($cod_questao_04));

        $segunda_alternativa_04 = new GerenciarQuestao();
        $segunda_alternativa_04 = utf8_encode($segunda_alternativa_04 -> getSegundaAlternativaPorCodigoQuestao($cod_questao_04));

        $terceira_alternativa_04 = new GerenciarQuestao();
        $terceira_alternativa_04 = utf8_encode($terceira_alternativa_04 -> getTerceiraAlternativaPorCodigoQuestao($cod_questao_04));

        $quarta_alternativa_04 = new GerenciarQuestao();
        $quarta_alternativa_04 = utf8_encode($quarta_alternativa_04 -> getQuartaAlternativaPorCodigoQuestao($cod_questao_04));

        $resposta_alternativa_04 = new GerenciarQuestao();
        $resposta_alternativa_04 = $resposta_alternativa_04 -> getRespostaPorCodigoQuestao($cod_questao_04);

        $cod_questao_05 = new GerenciarQuestao();
        $cod_questao_05 = $cod_questao_05 -> getCodigoQuestaoPorCodigoProvaEPosicao($cod_prova, 5);

        $enunciado_questao_05 = new GerenciarQuestao();
        $enunciado_questao_05 = utf8_encode($enunciado_questao_05 -> getEnunciadoPorCodigoQuestao($cod_questao_05));

        $primeira_alternativa_05 = new GerenciarQuestao();
        $primeira_alternativa_05 = utf8_encode($primeira_alternativa_05 -> getPrimeiraAlternativaPorCodigoQuestao($cod_questao_05));

        $segunda_alternativa_05 = new GerenciarQuestao();
        $segunda_alternativa_05 = utf8_encode($segunda_alternativa_05 -> getSegundaAlternativaPorCodigoQuestao($cod_questao_05));

        $terceira_alternativa_05 = new GerenciarQuestao();
        $terceira_alternativa_05 = utf8_encode($terceira_alternativa_05 -> getTerceiraAlternativaPorCodigoQuestao($cod_questao_05));

        $quarta_alternativa_05 = new GerenciarQuestao();
        $quarta_alternativa_05 = utf8_encode($quarta_alternativa_05 -> getQuartaAlternativaPorCodigoQuestao($cod_questao_05));

        $resposta_alternativa_05 = new GerenciarQuestao();
        $resposta_alternativa_05 = $resposta_alternativa_05 -> getRespostaPorCodigoQuestao($cod_questao_05);

        $cod_questao_06 = new GerenciarQuestao();
        $cod_questao_06 = $cod_questao_06 -> getCodigoQuestaoPorCodigoProvaEPosicao($cod_prova, 6);

        $enunciado_questao_06 = new GerenciarQuestao();
        $enunciado_questao_06 = utf8_encode($enunciado_questao_06 -> getEnunciadoPorCodigoQuestao($cod_questao_06));

        $primeira_alternativa_06 = new GerenciarQuestao();
        $primeira_alternativa_06 = utf8_encode($primeira_alternativa_06 -> getPrimeiraAlternativaPorCodigoQuestao($cod_questao_06));

        $segunda_alternativa_06 = new GerenciarQuestao();
        $segunda_alternativa_06 = utf8_encode($segunda_alternativa_06 -> getSegundaAlternativaPorCodigoQuestao($cod_questao_06));

        $terceira_alternativa_06 = new GerenciarQuestao();
        $terceira_alternativa_06 = utf8_encode($terceira_alternativa_06 -> getTerceiraAlternativaPorCodigoQuestao($cod_questao_06));

        $quarta_alternativa_06 = new GerenciarQuestao();
        $quarta_alternativa_06 = utf8_encode($quarta_alternativa_06 -> getQuartaAlternativaPorCodigoQuestao($cod_questao_06));

        $resposta_alternativa_06 = new GerenciarQuestao();
        $resposta_alternativa_06 = $resposta_alternativa_06 -> getRespostaPorCodigoQuestao($cod_questao_06);

        $cod_questao_07 = new GerenciarQuestao();
        $cod_questao_07 = $cod_questao_07 -> getCodigoQuestaoPorCodigoProvaEPosicao($cod_prova, 7);

        $enunciado_questao_07 = new GerenciarQuestao();
        $enunciado_questao_07 = utf8_encode($enunciado_questao_07 -> getEnunciadoPorCodigoQuestao($cod_questao_07));

        $primeira_alternativa_07 = new GerenciarQuestao();
        $primeira_alternativa_07 = utf8_encode($primeira_alternativa_07 -> getPrimeiraAlternativaPorCodigoQuestao($cod_questao_07));

        $segunda_alternativa_07 = new GerenciarQuestao();
        $segunda_alternativa_07 = utf8_encode($segunda_alternativa_07 -> getSegundaAlternativaPorCodigoQuestao($cod_questao_07));

        $terceira_alternativa_07 = new GerenciarQuestao();
        $terceira_alternativa_07 = utf8_encode($terceira_alternativa_07 -> getTerceiraAlternativaPorCodigoQuestao($cod_questao_07));

        $quarta_alternativa_07 = new GerenciarQuestao();
        $quarta_alternativa_07 = utf8_encode($quarta_alternativa_07 -> getQuartaAlternativaPorCodigoQuestao($cod_questao_07));

        $resposta_alternativa_07 = new GerenciarQuestao();
        $resposta_alternativa_07 = $resposta_alternativa_07 -> getRespostaPorCodigoQuestao($cod_questao_07);

        $cod_questao_08 = new GerenciarQuestao();
        $cod_questao_08 = $cod_questao_08 -> getCodigoQuestaoPorCodigoProvaEPosicao($cod_prova, 8);

        $enunciado_questao_08 = new GerenciarQuestao();
        $enunciado_questao_08 = utf8_encode($enunciado_questao_08 -> getEnunciadoPorCodigoQuestao($cod_questao_08));

        $primeira_alternativa_08 = new GerenciarQuestao();
        $primeira_alternativa_08 = utf8_encode($primeira_alternativa_08 -> getPrimeiraAlternativaPorCodigoQuestao($cod_questao_08));

        $segunda_alternativa_08 = new GerenciarQuestao();
        $segunda_alternativa_08 = utf8_encode($segunda_alternativa_08 -> getSegundaAlternativaPorCodigoQuestao($cod_questao_08));

        $terceira_alternativa_08 = new GerenciarQuestao();
        $terceira_alternativa_08 = utf8_encode($terceira_alternativa_08 -> getTerceiraAlternativaPorCodigoQuestao($cod_questao_08));

        $quarta_alternativa_08 = new GerenciarQuestao();
        $quarta_alternativa_08 = utf8_encode($quarta_alternativa_08 -> getQuartaAlternativaPorCodigoQuestao($cod_questao_08));

        $resposta_alternativa_08 = new GerenciarQuestao();
        $resposta_alternativa_08 = $resposta_alternativa_08 -> getRespostaPorCodigoQuestao($cod_questao_08);

        $cod_questao_09 = new GerenciarQuestao();
        $cod_questao_09 = $cod_questao_09 -> getCodigoQuestaoPorCodigoProvaEPosicao($cod_prova, 9);

        $enunciado_questao_09 = new GerenciarQuestao();
        $enunciado_questao_09 = utf8_encode($enunciado_questao_09 -> getEnunciadoPorCodigoQuestao($cod_questao_09));

        $primeira_alternativa_09 = new GerenciarQuestao();
        $primeira_alternativa_09 = utf8_encode($primeira_alternativa_09 -> getPrimeiraAlternativaPorCodigoQuestao($cod_questao_09));

        $segunda_alternativa_09 = new GerenciarQuestao();
        $segunda_alternativa_09 = utf8_encode($segunda_alternativa_09 -> getSegundaAlternativaPorCodigoQuestao($cod_questao_09));

        $terceira_alternativa_09 = new GerenciarQuestao();
        $terceira_alternativa_09 = utf8_encode($terceira_alternativa_09 -> getTerceiraAlternativaPorCodigoQuestao($cod_questao_09));

        $quarta_alternativa_09 = new GerenciarQuestao();
        $quarta_alternativa_09 = utf8_encode($quarta_alternativa_09 -> getQuartaAlternativaPorCodigoQuestao($cod_questao_09));

        $resposta_alternativa_09 = new GerenciarQuestao();
        $resposta_alternativa_09 = $resposta_alternativa_09 -> getRespostaPorCodigoQuestao($cod_questao_09);

        $cod_questao_10 = new GerenciarQuestao();
        $cod_questao_10 = $cod_questao_10 -> getCodigoQuestaoPorCodigoProvaEPosicao($cod_prova, 10);

        $enunciado_questao_10 = new GerenciarQuestao();
        $enunciado_questao_10 = utf8_encode($enunciado_questao_10 -> getEnunciadoPorCodigoQuestao($cod_questao_10));

        $primeira_alternativa_10 = new GerenciarQuestao();
        $primeira_alternativa_10 = utf8_encode($primeira_alternativa_10 -> getPrimeiraAlternativaPorCodigoQuestao($cod_questao_10));

        $segunda_alternativa_10 = new GerenciarQuestao();
        $segunda_alternativa_10 = utf8_encode($segunda_alternativa_10 -> getSegundaAlternativaPorCodigoQuestao($cod_questao_10));

        $terceira_alternativa_10 = new GerenciarQuestao();
        $terceira_alternativa_10 = utf8_encode($terceira_alternativa_10 -> getTerceiraAlternativaPorCodigoQuestao($cod_questao_10));

        $quarta_alternativa_10 = new GerenciarQuestao();
        $quarta_alternativa_10 = utf8_encode($quarta_alternativa_10 -> getQuartaAlternativaPorCodigoQuestao($cod_questao_10));

        $resposta_alternativa_10 = new GerenciarQuestao();
        $resposta_alternativa_10 = $resposta_alternativa_10 -> getRespostaPorCodigoQuestao($cod_questao_10);

    }

    $titulo_conteudo = new GerenciarConteudo();
    $titulo_conteudo = $titulo_conteudo -> getTituloConteudoPorCodigoConteudo($cod_conteudo);

    $arquivo_conteudo = new GerenciarConteudo();
    $arquivo_conteudo = $arquivo_conteudo -> getArquivoPorCodigoConteudo($cod_conteudo);

    $link_conteudo = new GerenciarConteudo();
    $link_conteudo = $link_conteudo -> getLinkPorCodigoConteudo($cod_conteudo);

    $texto_conteudo = new GerenciarConteudo();
    $texto_conteudo = $texto_conteudo -> getTextoPorCodigoConteudo($cod_conteudo);

    $erro_editar_video = (isset($_GET["erro-video"])) ? $_GET["erro-video"] : "";
    $erro_editar_link = (isset($_GET["erro-link"])) ? $_GET["erro-link"] : "";
    $erro_editar_arquivo = (isset($_GET["erro-file"])) ? $_GET["erro-file"] : "";

    $tipo_conteudo = new GerenciarTipoConteudo();
    $tipo_conteudo = $tipo_conteudo -> getTituloTipoConteudoPorCodigo($cod_tipo);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Editar <?php echo $tipo_conteudo; ?> | Station21</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <!-- THEME STYLES-->
    <link href="assets/css/main.min.css" rel="stylesheet" />
    <link href="assets/css/bootstrap-tagsinput.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="./assets/css/pages/main.css" rel="stylesheet" />
    <link href="./assets/css/pages/dashboard.css" rel="stylesheet" />
    <link href="./assets/css/pages/content.css" rel="stylesheet" />
    <link rel="shortcut icon" href="./assets/img/favicon/logo-station-21-transparent.png" />
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        
        <?php 
        
            if($permissao == 1) {

                include_once "header-admin.php";

                include_once "navbar-admin.php";

                if($cod_tipo == 1) {

                    include_once "form-edit-video-content.php";

                }

                if($cod_tipo == 2) {

                    include_once "form-edit-text-content.php";

                }

                if($cod_tipo == 3) {

                    include_once "form-edit-file-content.php";

                }

                if($cod_tipo == 4) {

                    include_once "form-edit-link-content.php";

                }

                if($cod_tipo == 5 && $cod_tipo_avaliacao == 1) {

                    include_once "form-edit-exercise-content.php"; 

                }

                if($cod_tipo == 5 && $cod_tipo_avaliacao == 2) {

                    include_once "form-edit-test-content.php"; 

                }

                include_once "footer.php";

            }

            else if($permissao == 2) {

                include_once "header-instrutor.php";

                include_once "navbar-instrutor.php";

                if($cod_tipo == 1) {

                    include_once "form-edit-video-content.php";

                }

                if($cod_tipo == 2) {

                    include_once "form-edit-text-content.php";

                }

                if($cod_tipo == 3) {

                    include_once "form-edit-file-content.php";

                }

                if($cod_tipo == 4) {

                    include_once "form-edit-link-content.php";

                }

                if($cod_tipo == 5 && $cod_tipo_avaliacao == 1) {

                    include_once "form-edit-exercise-content.php"; 

                }

                if($cod_tipo == 5 && $cod_tipo_avaliacao == 2) {

                    include_once "form-edit-test-content.php"; 

                }

                include_once "footer.php";

            }

            else {

                session_start();
                ob_start();
                $_SESSION = array();
                session_destroy();
                
                header("Location: login");

            }
        
        ?>
        
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Carregando...</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    <script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <link href="./assets/vendors/summernote/dist/summernote.css" rel="stylesheet" />
    <!-- PAGE LEVEL PLUGINS-->
    <script src="./assets/vendors/summernote/dist/summernote.min.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="assets/js/app.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap-tagsinput.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#summernote').summernote();
            $('#summernote_air').summernote({
                airMode: true
            });
        });
    </script>
</body>

</html>