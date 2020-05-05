<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];
    $permissao = $_SESSION['permissao'];

    $nome = new AutenticarUsuario();
    $nome = utf8_encode($nome -> getNomeUsuario($email));

    $titulo = (isset($_POST["titulo"])) ? $_POST["titulo"] : "";
    $instrutor = (isset($_POST["instrutor"])) ? $_POST["instrutor"] : "";
    $status = (isset($_POST["status"])) ? $_POST["status"] : "";
    $categoria = (isset($_POST["categoria"])) ? $_POST["categoria"] : "";
    $palavras_chave = (isset($_POST["palavras-chave"])) ? $_POST["palavras-chave"] : "";
    $apresentacao = (isset($_POST["apresentacao"])) ? $_POST["apresentacao"] : "";
    $apresentacao_edicao_curso = (isset($_POST["apresentacao-edicao-curso"])) ? $_POST["apresentacao-edicao-curso"] : "";

    $cod_curso = (isset($_GET["cod-curso"])) ? $_GET["cod-curso"] : "";
    $tipo_conteudo = (isset($_GET["content-type"])) ? $_GET["content-type"] : "";
    $sucesso_criacao_conteudo = (isset($_GET["create-content"])) ? $_GET["create-content"] : "";
    $erro_criacao_conteudo = (isset($_GET["erro-create-content"])) ? $_GET["erro-create-content"] : ""; 
    $modulo_erro_criacao_conteudo = (isset($_GET["module"])) ? $_GET["module"] : "";
    $titulo_criacao_conteudo = "";

    $cod_curso_edicao = (isset($_POST["cod-edit-course"])) ? $_POST["cod-edit-course"] : "";
    $edicao_curso = (isset($_POST["edit-course"])) ? $_POST["edit-course"] : "";

    if($cod_curso != "") {

        $titulo_criacao_conteudo = new GerenciarCurso();
        $titulo_criacao_conteudo = $titulo_criacao_conteudo -> getTituloCursoPorCodigo($cod_curso);

    }

    if($modulo_erro_criacao_conteudo != "") {

        $titulo_modulo = new GerenciarModulo();
        $titulo_modulo = $titulo_modulo -> getTituloModuloPorCodigo($modulo_erro_criacao_conteudo);

    }

    if($titulo != "" && $edicao_curso == "") {

        $verificar_curso_existente = new GerenciarCurso();
        $verificar_curso_existente = $verificar_curso_existente -> verificarCursoExistente($titulo);

        if($verificar_curso_existente == 0) {

            $cadastrar_curso = new GerenciarCurso();
            $cadastrar_curso = $cadastrar_curso -> setCurso($titulo, $instrutor, $status, $categoria, $palavras_chave, $apresentacao);

            $cod_curso = new GerenciarCurso();
            $cod_curso = $cod_curso -> getCodigoCursoPorTitulo($titulo);

            $cadastrar_modulo_01 = new GerenciarModulo();
            $cadastrar_modulo_01 = $cadastrar_modulo_01 -> setModulo($cod_curso, "Módulo 01");

            $cadastrar_modulo_02 = new GerenciarModulo();
            $cadastrar_modulo_02 = $cadastrar_modulo_02 -> setModulo($cod_curso, "Módulo 02");

            $cadastrar_modulo_03 = new GerenciarModulo();
            $cadastrar_modulo_03 = $cadastrar_modulo_03 -> setModulo($cod_curso, "Módulo 03");

            $cadastrar_modulo_04 = new GerenciarModulo();
            $cadastrar_modulo_04 = $cadastrar_modulo_04 -> setModulo($cod_curso, "Módulo 04");

        } 

        else {

            $cod_curso = new GerenciarCurso();
            $cod_curso = $cod_curso -> getCodigoCursoPorTitulo($titulo);

            header("Location: courses?erro-cadastro-curso=1&erro-cadastro-cod-curso=$cod_curso"); 

        }

    }

    if($edicao_curso == 1) {

        $atualizar_dados_curso = new GerenciarCurso();
        $atualizar_dados_curso = $atualizar_dados_curso -> atualizarDadosUsuario($cod_curso_edicao, $titulo, $instrutor, $status, $categoria, $palavras_chave, $apresentacao_edicao_curso);

    }

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Cadastrar Conteúdo | Station21</title>
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

                include_once "form-create-content.php";

                include_once "footer.php";

            }

            else if($permissao == 2) {

                include_once "header-instrutor.php";

                include_once "navbar-instrutor.php";

                include_once "form-create-content.php";

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
    <!-- PAGE LEVEL PLUGINS-->
    <!-- CORE SCRIPTS-->
    <script src="assets/js/app.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap-tagsinput.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
</body>

</html>