<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];
    $permissao = $_SESSION['permissao'];

    $nome = new AutenticarUsuario();
    $nome = utf8_encode($nome -> getNomeUsuario($email));

    $cod_curso = (isset($_GET["cod-course"])) ? $_GET["cod-course"] : "";

    $cod_conteudo_excluir = (isset($_GET["cod-delete-content"])) ? $_GET["cod-delete-content"] : "";
    $tipo_conteudo_excluir = (isset($_GET["type-content"])) ? $_GET["type-content"] : "";
    $cod_exercicio_excluir = (isset($_GET["cod-delete-exercise"])) ? $_GET["cod-delete-exercise"] : "";
    $cod_prova_excluir = (isset($_GET["cod-delete-test"])) ? $_GET["cod-delete-test"] : "";
    $tipo_avaliacao_excluir = (isset($_GET["type-evaluation"])) ? $_GET["type-evaluation"] : "";
    $sucesso_excluir_conteudo = (isset($_GET["success-delete-content"])) ? $_GET["success-delete-content"] : "";

    if($cod_conteudo_excluir != "") {

        $titulo_conteudo_excluir = new GerenciarConteudo();
        $titulo_conteudo_excluir = utf8_encode($titulo_conteudo_excluir -> getTituloConteudoPorCodigoConteudo($cod_conteudo_excluir));

    }

    if($cod_exercicio_excluir != "") {

        $titulo_conteudo_excluir = "Exercício";

    }

    if($cod_prova_excluir != "") {

        $titulo_conteudo_excluir = "Prova";

    }

    $titulo_curso = new GerenciarCurso();
    $titulo_curso = $titulo_curso -> getTituloCursoPorCodigo($cod_curso);

    $cod_instrutor_curso = new GerenciarCurso();
    $cod_instrutor_curso = $cod_instrutor_curso -> getInstrutorCursoPorCodigo($cod_curso);

    $instrutor_curso = new GerenciarUsuario();
    $instrutor_curso = $instrutor_curso -> getNomePorCodigoUsuario($cod_instrutor_curso);

    $cod_status = new GerenciarCurso();
    $cod_status = $cod_status -> getStatusCursoPorCodigo($cod_curso);

    $status = new GerenciarStatus();
    $status = $status -> getStatusPorCodigo($cod_status);

    $cod_categoria = new GerenciarCurso();
    $cod_categoria = $cod_categoria -> getCategoriaCursoPorCodigo($cod_curso);

    $categoria = new GerenciarCategoria();
    $categoria = $categoria -> getCategoriaPorCodigo($cod_categoria);

    $apresentacao = new GerenciarCurso();
    $apresentacao = $apresentacao -> getApresentacaoCursoPorCodigo($cod_curso);

    if($permissao == 1 || $permissao == 2) {

        $cod_modulo_curso_01 = new GerenciarModulo();
        $cod_modulo_curso_01 = $cod_modulo_curso_01 -> getCodigoModuloPorCodigoCurso($cod_curso, 1);

        $lista_videos_modulo_curso_01 = new GerenciarConteudo();
        $lista_videos_modulo_curso_01 = $lista_videos_modulo_curso_01 -> gerarListaVideosAdminPorModulo($cod_modulo_curso_01);

        $lista_textos_modulo_curso_01 = new GerenciarConteudo();
        $lista_textos_modulo_curso_01 = $lista_textos_modulo_curso_01 -> gerarListaTextosAdminPorModulo($cod_modulo_curso_01);

        $lista_arquivos_modulo_curso_01 = new GerenciarConteudo();
        $lista_arquivos_modulo_curso_01 = $lista_arquivos_modulo_curso_01 -> gerarListaArquivosAdminPorModulo($cod_modulo_curso_01);

        $lista_links_modulo_curso_01 = new GerenciarConteudo();
        $lista_links_modulo_curso_01 = $lista_links_modulo_curso_01 -> gerarListaLinksAdminPorModulo($cod_modulo_curso_01);

        $lista_exercicios_modulo_curso_01 = new GerenciarExercicio();
        $lista_exercicios_modulo_curso_01 = $lista_exercicios_modulo_curso_01 -> gerarListaExerciciosAdminPorModulo($cod_modulo_curso_01);

        $cod_modulo_curso_02 = new GerenciarModulo();
        $cod_modulo_curso_02 = $cod_modulo_curso_02 -> getCodigoModuloPorCodigoCurso($cod_curso, 2);

        $lista_videos_modulo_curso_02 = new GerenciarConteudo();
        $lista_videos_modulo_curso_02 = $lista_videos_modulo_curso_02 -> gerarListaVideosAdminPorModulo($cod_modulo_curso_02);

        $lista_textos_modulo_curso_02 = new GerenciarConteudo();
        $lista_textos_modulo_curso_02 = $lista_textos_modulo_curso_02 -> gerarListaTextosAdminPorModulo($cod_modulo_curso_02);

        $lista_arquivos_modulo_curso_02 = new GerenciarConteudo();
        $lista_arquivos_modulo_curso_02 = $lista_arquivos_modulo_curso_02 -> gerarListaArquivosAdminPorModulo($cod_modulo_curso_02);

        $lista_links_modulo_curso_02 = new GerenciarConteudo();
        $lista_links_modulo_curso_02 = $lista_links_modulo_curso_02 -> gerarListaLinksAdminPorModulo($cod_modulo_curso_02);

        $lista_exercicios_modulo_curso_02 = new GerenciarExercicio();
        $lista_exercicios_modulo_curso_02 = $lista_exercicios_modulo_curso_02 -> gerarListaExerciciosAdminPorModulo($cod_modulo_curso_02);

        $cod_modulo_curso_03 = new GerenciarModulo();
        $cod_modulo_curso_03 = $cod_modulo_curso_03 -> getCodigoModuloPorCodigoCurso($cod_curso, 3);

        $lista_videos_modulo_curso_03 = new GerenciarConteudo();
        $lista_videos_modulo_curso_03 = $lista_videos_modulo_curso_03 -> gerarListaVideosAdminPorModulo($cod_modulo_curso_03);

        $lista_textos_modulo_curso_03 = new GerenciarConteudo();
        $lista_textos_modulo_curso_03 = $lista_textos_modulo_curso_03 -> gerarListaTextosAdminPorModulo($cod_modulo_curso_03);

        $lista_arquivos_modulo_curso_03 = new GerenciarConteudo();
        $lista_arquivos_modulo_curso_03 = $lista_arquivos_modulo_curso_03 -> gerarListaArquivosAdminPorModulo($cod_modulo_curso_03);

        $lista_links_modulo_curso_03 = new GerenciarConteudo();
        $lista_links_modulo_curso_03 = $lista_links_modulo_curso_03 -> gerarListaLinksAdminPorModulo($cod_modulo_curso_03);

        $lista_exercicios_modulo_curso_03 = new GerenciarExercicio();
        $lista_exercicios_modulo_curso_03 = $lista_exercicios_modulo_curso_03 -> gerarListaExerciciosAdminPorModulo($cod_modulo_curso_03);

        $cod_modulo_curso_04 = new GerenciarModulo();
        $cod_modulo_curso_04 = $cod_modulo_curso_04 -> getCodigoModuloPorCodigoCurso($cod_curso, 4);

        $lista_videos_modulo_curso_04 = new GerenciarConteudo();
        $lista_videos_modulo_curso_04 = $lista_videos_modulo_curso_04 -> gerarListaVideosAdminPorModulo($cod_modulo_curso_04);

        $lista_textos_modulo_curso_04 = new GerenciarConteudo();
        $lista_textos_modulo_curso_04 = $lista_textos_modulo_curso_04 -> gerarListaTextosAdminPorModulo($cod_modulo_curso_04);

        $lista_arquivos_modulo_curso_04 = new GerenciarConteudo();
        $lista_arquivos_modulo_curso_04 = $lista_arquivos_modulo_curso_04 -> gerarListaArquivosAdminPorModulo($cod_modulo_curso_04);

        $lista_links_modulo_curso_04 = new GerenciarConteudo();
        $lista_links_modulo_curso_04 = $lista_links_modulo_curso_04 -> gerarListaLinksAdminPorModulo($cod_modulo_curso_04);

        $lista_exercicios_modulo_curso_04 = new GerenciarExercicio();
        $lista_exercicios_modulo_curso_04 = $lista_exercicios_modulo_curso_04 -> gerarListaExerciciosAdminPorModulo($cod_modulo_curso_04);

        $lista_prova_curso = new GerenciarProva();
        $lista_prova_curso = $lista_prova_curso -> gerarListaProvaAdminPorCodigoCurso($cod_curso);

    }

    if($permissao == 3) {

        $cod_modulo_curso_01 = new GerenciarModulo();
        $cod_modulo_curso_01 = $cod_modulo_curso_01 -> getCodigoModuloPorCodigoCurso($cod_curso, 1);

        $lista_videos_modulo_curso_01 = new GerenciarConteudo();
        $lista_videos_modulo_curso_01 = $lista_videos_modulo_curso_01 -> gerarListaVideosPorModulo($cod_modulo_curso_01);

        $lista_textos_modulo_curso_01 = new GerenciarConteudo();
        $lista_textos_modulo_curso_01 = $lista_textos_modulo_curso_01 -> gerarListaTextosPorModulo($cod_modulo_curso_01);

        $lista_arquivos_modulo_curso_01 = new GerenciarConteudo();
        $lista_arquivos_modulo_curso_01 = $lista_arquivos_modulo_curso_01 -> gerarListaArquivosPorModulo($cod_modulo_curso_01);

        $lista_links_modulo_curso_01 = new GerenciarConteudo();
        $lista_links_modulo_curso_01 = $lista_links_modulo_curso_01 -> gerarListaLinksPorModulo($cod_modulo_curso_01);

        $lista_exercicios_modulo_curso_01 = new GerenciarExercicio();
        $lista_exercicios_modulo_curso_01 = $lista_exercicios_modulo_curso_01 -> gerarListaExerciciosPorModulo($cod_modulo_curso_01);

        $cod_modulo_curso_02 = new GerenciarModulo();
        $cod_modulo_curso_02 = $cod_modulo_curso_02 -> getCodigoModuloPorCodigoCurso($cod_curso, 2);

        $lista_videos_modulo_curso_02 = new GerenciarConteudo();
        $lista_videos_modulo_curso_02 = $lista_videos_modulo_curso_02 -> gerarListaVideosPorModulo($cod_modulo_curso_02);

        $lista_textos_modulo_curso_02 = new GerenciarConteudo();
        $lista_textos_modulo_curso_02 = $lista_textos_modulo_curso_02 -> gerarListaTextosPorModulo($cod_modulo_curso_02);

        $lista_arquivos_modulo_curso_02 = new GerenciarConteudo();
        $lista_arquivos_modulo_curso_02 = $lista_arquivos_modulo_curso_02 -> gerarListaArquivosPorModulo($cod_modulo_curso_02);

        $lista_links_modulo_curso_02 = new GerenciarConteudo();
        $lista_links_modulo_curso_02 = $lista_links_modulo_curso_02 -> gerarListaLinksPorModulo($cod_modulo_curso_02);

        $lista_exercicios_modulo_curso_02 = new GerenciarExercicio();
        $lista_exercicios_modulo_curso_02 = $lista_exercicios_modulo_curso_02 -> gerarListaExerciciosPorModulo($cod_modulo_curso_02);

        $cod_modulo_curso_03 = new GerenciarModulo();
        $cod_modulo_curso_03 = $cod_modulo_curso_03 -> getCodigoModuloPorCodigoCurso($cod_curso, 3);

        $lista_videos_modulo_curso_03 = new GerenciarConteudo();
        $lista_videos_modulo_curso_03 = $lista_videos_modulo_curso_03 -> gerarListaVideosPorModulo($cod_modulo_curso_03);

        $lista_textos_modulo_curso_03 = new GerenciarConteudo();
        $lista_textos_modulo_curso_03 = $lista_textos_modulo_curso_03 -> gerarListaTextosPorModulo($cod_modulo_curso_03);

        $lista_arquivos_modulo_curso_03 = new GerenciarConteudo();
        $lista_arquivos_modulo_curso_03 = $lista_arquivos_modulo_curso_03 -> gerarListaArquivosPorModulo($cod_modulo_curso_03);

        $lista_links_modulo_curso_03 = new GerenciarConteudo();
        $lista_links_modulo_curso_03 = $lista_links_modulo_curso_03 -> gerarListaLinksPorModulo($cod_modulo_curso_03);

        $lista_exercicios_modulo_curso_03 = new GerenciarExercicio();
        $lista_exercicios_modulo_curso_03 = $lista_exercicios_modulo_curso_03 -> gerarListaExerciciosPorModulo($cod_modulo_curso_03);

        $cod_modulo_curso_04 = new GerenciarModulo();
        $cod_modulo_curso_04 = $cod_modulo_curso_04 -> getCodigoModuloPorCodigoCurso($cod_curso, 4);

        $lista_videos_modulo_curso_04 = new GerenciarConteudo();
        $lista_videos_modulo_curso_04 = $lista_videos_modulo_curso_04 -> gerarListaVideosPorModulo($cod_modulo_curso_04);

        $lista_textos_modulo_curso_04 = new GerenciarConteudo();
        $lista_textos_modulo_curso_04 = $lista_textos_modulo_curso_04 -> gerarListaTextosPorModulo($cod_modulo_curso_04);

        $lista_arquivos_modulo_curso_04 = new GerenciarConteudo();
        $lista_arquivos_modulo_curso_04 = $lista_arquivos_modulo_curso_04 -> gerarListaArquivosPorModulo($cod_modulo_curso_04);

        $lista_links_modulo_curso_04 = new GerenciarConteudo();
        $lista_links_modulo_curso_04 = $lista_links_modulo_curso_04 -> gerarListaLinksPorModulo($cod_modulo_curso_04);

        $lista_exercicios_modulo_curso_04 = new GerenciarExercicio();
        $lista_exercicios_modulo_curso_04 = $lista_exercicios_modulo_curso_04 -> gerarListaExerciciosPorModulo($cod_modulo_curso_04);

        $lista_prova_curso = new GerenciarProva();
        $lista_prova_curso = $lista_prova_curso -> gerarListaProvaPorCodigoCurso($cod_curso);

        $avaliacao_curso = new GerenciarAvaliacao();
        $avaliacao_curso = $avaliacao_curso -> getAvaliacaoPorCodigoCurso($cod_curso);

    }

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Visão Geral Curso | Station21</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="./assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="./assets/css/pages/main.css" rel="stylesheet" />
    <link href="./assets/css/pages/dashboard.css" rel="stylesheet" />
    <link rel="shortcut icon" href="./assets/img/favicon/logo-station-21-transparent.png" />
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        
        <?php 
        
            if($permissao == 1) {

                include_once "header-admin.php";

                include_once "navbar-admin.php";

                include_once "overview-content-courses.php";

                include_once "footer.php";

            }

            else if($permissao == 2) {

                include_once "header-instrutor.php";

                include_once "navbar-instrutor.php";

                include_once "overview-content-courses.php";

                include_once "footer.php";

            }

            else if($permissao == 3) {

                include_once "header-instrutor.php";

                include_once "navbar-instrutor.php";

                include_once "overview-content-course.php";

                include_once "footer.php";

            }

            else {

                include_once "logout.php";

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
    <!-- PAGE LEVEL PLUGINS-->
    <script src="./assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="assets/js/app.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#example-table').DataTable({
                pageLength: 10,
                //"ajax": './assets/demo/data/table_data.json',
                /*"columns": [
                    { "data": "nome" },
                    { "data": "email" },
                    { "data": "data_cadastro" },
                    { "data": "permissao" },
                    { "data": "acoes" }
                ]*/
            });
        })
    </script>
</body>

</html>