<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];
    $permissao = $_SESSION['permissao']; 

    $nome = new AutenticarUsuario();
    $nome = utf8_encode($nome -> getNomeUsuario($email));

    $cod_usuario = new AutenticarUsuario();
    $cod_usuario = $cod_usuario -> getCodigoUsuario($email);

    $cod_curso = (isset($_GET["cod-course"])) ? $_GET["cod-course"] : "";

    $classificao_curso_usuario = (isset($_GET["classify-course"])) ? $_GET["classify-course"] : "";
    $sucesso_classificao_curso_usuario = (isset($_GET["success-classify"])) ? $_GET["success-classify"] : "";

    $titulo_curso = new GerenciarCurso();
    $titulo_curso = $titulo_curso -> getTituloCursoPorCodigo($cod_curso);

    $cod_instrutor_curso = new GerenciarCurso();
    $cod_instrutor_curso = $cod_instrutor_curso -> getInstrutorCursoPorCodigo($cod_curso);

    $instrutor_curso = new GerenciarUsuario();
    $instrutor_curso = $instrutor_curso -> getNomePorCodigoUsuario($cod_instrutor_curso);

    $apresentacao = new GerenciarCurso();
    $apresentacao = $apresentacao -> getApresentacaoCursoPorCodigo($cod_curso);

    $cod_modulo_curso_01 = new GerenciarModulo();
    $cod_modulo_curso_01 = $cod_modulo_curso_01 -> getCodigoModuloPorCodigoCurso($cod_curso, 1);

    $lista_videos_modulo_curso_01 = new GerenciarConteudo();
    $lista_videos_modulo_curso_01 = $lista_videos_modulo_curso_01 -> gerarListaVideosUsuarioPorModulo($cod_modulo_curso_01);

    $lista_textos_modulo_curso_01 = new GerenciarConteudo();
    $lista_textos_modulo_curso_01 = $lista_textos_modulo_curso_01 -> gerarListaTextosUsuarioPorModulo($cod_modulo_curso_01);

    $lista_arquivos_modulo_curso_01 = new GerenciarConteudo();
    $lista_arquivos_modulo_curso_01 = $lista_arquivos_modulo_curso_01 -> gerarListaArquivosUsuarioPorModulo($cod_modulo_curso_01);

    $lista_links_modulo_curso_01 = new GerenciarConteudo();
    $lista_links_modulo_curso_01 = $lista_links_modulo_curso_01 -> gerarListaLinksUsuarioPorModulo($cod_modulo_curso_01);

    $lista_exercicios_modulo_curso_01 = new GerenciarExercicio();
    $lista_exercicios_modulo_curso_01 = $lista_exercicios_modulo_curso_01 -> gerarListaExerciciosUsuarioPorModulo($cod_modulo_curso_01);

    $cod_modulo_curso_02 = new GerenciarModulo();
    $cod_modulo_curso_02 = $cod_modulo_curso_02 -> getCodigoModuloPorCodigoCurso($cod_curso, 2);

    $lista_videos_modulo_curso_02 = new GerenciarConteudo();
    $lista_videos_modulo_curso_02 = $lista_videos_modulo_curso_02 -> gerarListaVideosUsuarioPorModulo($cod_modulo_curso_02);

    $lista_textos_modulo_curso_02 = new GerenciarConteudo();
    $lista_textos_modulo_curso_02 = $lista_textos_modulo_curso_02 -> gerarListaTextosUsuarioPorModulo($cod_modulo_curso_02);

    $lista_arquivos_modulo_curso_02 = new GerenciarConteudo();
    $lista_arquivos_modulo_curso_02 = $lista_arquivos_modulo_curso_02 -> gerarListaArquivosUsuarioPorModulo($cod_modulo_curso_02);

    $lista_links_modulo_curso_02 = new GerenciarConteudo();
    $lista_links_modulo_curso_02 = $lista_links_modulo_curso_02 -> gerarListaLinksUsuarioPorModulo($cod_modulo_curso_02);

    $lista_exercicios_modulo_curso_02 = new GerenciarExercicio();
    $lista_exercicios_modulo_curso_02 = $lista_exercicios_modulo_curso_02 -> gerarListaExerciciosUsuarioPorModulo($cod_modulo_curso_02);

    $cod_modulo_curso_03 = new GerenciarModulo();
    $cod_modulo_curso_03 = $cod_modulo_curso_03 -> getCodigoModuloPorCodigoCurso($cod_curso, 3);

    $lista_videos_modulo_curso_03 = new GerenciarConteudo();
    $lista_videos_modulo_curso_03 = $lista_videos_modulo_curso_03 -> gerarListaVideosUsuarioPorModulo($cod_modulo_curso_03);

    $lista_textos_modulo_curso_03 = new GerenciarConteudo();
    $lista_textos_modulo_curso_03 = $lista_textos_modulo_curso_03 -> gerarListaTextosUsuarioPorModulo($cod_modulo_curso_03);

    $lista_arquivos_modulo_curso_03 = new GerenciarConteudo();
    $lista_arquivos_modulo_curso_03 = $lista_arquivos_modulo_curso_03 -> gerarListaArquivosUsuarioPorModulo($cod_modulo_curso_03);

    $lista_links_modulo_curso_03 = new GerenciarConteudo();
    $lista_links_modulo_curso_03 = $lista_links_modulo_curso_03 -> gerarListaLinksUsuarioPorModulo($cod_modulo_curso_03);

    $lista_exercicios_modulo_curso_03 = new GerenciarExercicio();
    $lista_exercicios_modulo_curso_03 = $lista_exercicios_modulo_curso_03 -> gerarListaExerciciosUsuarioPorModulo($cod_modulo_curso_03);

    $cod_modulo_curso_04 = new GerenciarModulo();
    $cod_modulo_curso_04 = $cod_modulo_curso_04 -> getCodigoModuloPorCodigoCurso($cod_curso, 4);

    $lista_videos_modulo_curso_04 = new GerenciarConteudo();
    $lista_videos_modulo_curso_04 = $lista_videos_modulo_curso_04 -> gerarListaVideosUsuarioPorModulo($cod_modulo_curso_04);

    $lista_textos_modulo_curso_04 = new GerenciarConteudo();
    $lista_textos_modulo_curso_04 = $lista_textos_modulo_curso_04 -> gerarListaTextosUsuarioPorModulo($cod_modulo_curso_04);

    $lista_arquivos_modulo_curso_04 = new GerenciarConteudo();
    $lista_arquivos_modulo_curso_04 = $lista_arquivos_modulo_curso_04 -> gerarListaArquivosUsuarioPorModulo($cod_modulo_curso_04);

    $lista_links_modulo_curso_04 = new GerenciarConteudo();
    $lista_links_modulo_curso_04 = $lista_links_modulo_curso_04 -> gerarListaLinksUsuarioPorModulo($cod_modulo_curso_04);

    $lista_exercicios_modulo_curso_04 = new GerenciarExercicio();
    $lista_exercicios_modulo_curso_04 = $lista_exercicios_modulo_curso_04 -> gerarListaExerciciosUsuarioPorModulo($cod_modulo_curso_04);

    $lista_prova_curso = new GerenciarProva();
    $lista_prova_curso = $lista_prova_curso -> gerarListaProvaUsuarioPorCodigoCurso($cod_curso);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title><?php echo $titulo_curso; ?> | Station21</title>
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
        
            if($permissao == 3) {

                include_once "header-instrutor.php";

                include_once "navbar-instrutor.php";

                include_once "view-content-course.php";

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