<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];
    $permissao = $_SESSION['permissao'];

    $nome = new AutenticarUsuario();
    $nome = utf8_encode($nome -> getNomeUsuario($email));

    $cod_curso = (isset($_GET["cod-course"])) ? $_GET["cod-course"] : "";

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

    $cod_modulo_curso_01 = new GerenciarModulo();
    $cod_modulo_curso_01 = $cod_modulo_curso_01 -> getCodigoModuloPorCodigoCurso($cod_curso, 1);

    $lista_videos_modulo_curso_01 = new GerenciarConteudo();
    $lista_videos_modulo_curso_01 = $lista_videos_modulo_curso_01 -> gerarListaVideosAdminPorModulo($cod_modulo_curso_01);

    $lista_links_modulo_curso_01 = new GerenciarConteudo();
    $lista_links_modulo_curso_01 = $lista_links_modulo_curso_01 -> gerarListaLinksAdminPorModulo($cod_modulo_curso_01);

    $cod_modulo_curso_02 = new GerenciarModulo();
    $cod_modulo_curso_02 = $cod_modulo_curso_02 -> getCodigoModuloPorCodigoCurso($cod_curso, 2);

    $lista_videos_modulo_curso_02 = new GerenciarConteudo();
    $lista_videos_modulo_curso_02 = $lista_videos_modulo_curso_02 -> gerarListaVideosAdminPorModulo($cod_modulo_curso_02);

    $lista_links_modulo_curso_02 = new GerenciarConteudo();
    $lista_links_modulo_curso_02 = $lista_links_modulo_curso_02 -> gerarListaLinksAdminPorModulo($cod_modulo_curso_02);

    $cod_modulo_curso_03 = new GerenciarModulo();
    $cod_modulo_curso_03 = $cod_modulo_curso_03 -> getCodigoModuloPorCodigoCurso($cod_curso, 3);

    $lista_videos_modulo_curso_03 = new GerenciarConteudo();
    $lista_videos_modulo_curso_03 = $lista_videos_modulo_curso_03 -> gerarListaVideosAdminPorModulo($cod_modulo_curso_03);

    $lista_links_modulo_curso_03 = new GerenciarConteudo();
    $lista_links_modulo_curso_03 = $lista_links_modulo_curso_03 -> gerarListaLinksAdminPorModulo($cod_modulo_curso_03);

    $cod_modulo_curso_04 = new GerenciarModulo();
    $cod_modulo_curso_04 = $cod_modulo_curso_04 -> getCodigoModuloPorCodigoCurso($cod_curso, 4);

    $lista_videos_modulo_curso_04 = new GerenciarConteudo();
    $lista_videos_modulo_curso_04 = $lista_videos_modulo_curso_04 -> gerarListaVideosAdminPorModulo($cod_modulo_curso_04);

    $lista_links_modulo_curso_04 = new GerenciarConteudo();
    $lista_links_modulo_curso_04 = $lista_links_modulo_curso_04 -> gerarListaLinksAdminPorModulo($cod_modulo_curso_04);

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