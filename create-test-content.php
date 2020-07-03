<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];
    $permissao = $_SESSION['permissao'];

    $nome = new AutenticarUsuario();
    $nome = utf8_encode($nome -> getNomeUsuario($email));

    $cod_curso = (isset($_GET["cod-course"])) ? $_GET["cod-course"] : "";
    $numero_exercicio = (isset($_POST["test-number"])) ? $_POST["test-number"] : 1;
    $cod_prova = (isset($_POST["cod-test"])) ? $_POST["cod-test"] : "";

    if($numero_exercicio == 1 && $cod_curso != "") {

        $verificar_prova_existente = new GerenciarProva(); 
        $verificar_prova_existente = $verificar_prova_existente -> verificarProvaExistente($cod_curso);

        if($verificar_prova_existente > 0) {

            header("Location: create-content?cod-curso=$cod_curso&content-type=5&erro-create-content=2");

        }

    }

    if($cod_curso == "") {

        $cod_curso = (isset($_POST["cod-course"])) ? $_POST["cod-course"] : "";

    }

    $enunciado_exercicio = (isset($_POST["enunciado-exercicio"])) ? $_POST["enunciado-exercicio"] : "";
    $primeira_alternativa_exercicio = (isset($_POST["primeira-alternativa-exercicio"])) ? $_POST["primeira-alternativa-exercicio"] : "";
    $segunda_alternativa_exercicio = (isset($_POST["segunda-alternativa-exercicio"])) ? $_POST["segunda-alternativa-exercicio"] : "";
    $terceira_alternativa_exercicio = (isset($_POST["terceira-alternativa-exercicio"])) ? $_POST["terceira-alternativa-exercicio"] : "";
    $quarta_alternativa_exercicio = (isset($_POST["quarta-alternativa-exercicio"])) ? $_POST["quarta-alternativa-exercicio"] : "";
    $e_resposta_exercicio = (isset($_POST["resposta"])) ? $_POST["resposta"] : "";

    $titulo = new GerenciarCurso();
    $titulo = $titulo -> getTituloCursoPorCodigo($cod_curso); 

    if($enunciado_exercicio != "" && $primeira_alternativa_exercicio != "" && $segunda_alternativa_exercicio != "" && $terceira_alternativa_exercicio != "" && $quarta_alternativa_exercicio != "" && $e_resposta_exercicio != "" && $numero_exercicio == 2) {

        $cadastrar_prova = new GerenciarProva();
        $cadastrar_prova = $cadastrar_prova -> setProva($cod_curso);

        if($cod_prova == "") { 

            $cod_prova = new GerenciarProva();
            $cod_prova = $cod_prova -> getCodigoProvaPorCurso($cod_curso);

        }

    }

    if($enunciado_exercicio != "" && $primeira_alternativa_exercicio != "" && $segunda_alternativa_exercicio != "" && $terceira_alternativa_exercicio != "" && $quarta_alternativa_exercicio != "" && $e_resposta_exercicio != "") {

        $cadastrar_questao = new GerenciarQuestao();
        $cadastrar_questao = $cadastrar_questao -> setQuestao("", $cod_prova, $enunciado_exercicio, $primeira_alternativa_exercicio, $segunda_alternativa_exercicio, $terceira_alternativa_exercicio, $quarta_alternativa_exercicio, $e_resposta_exercicio);

    }

    if($numero_exercicio >= 11) {

        header("Location: create-content?cod-curso=$cod_curso&content-type=5&create-content=1");

    }

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Cadastrar Prova | Station21</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <link href="./assets/vendors/summernote/dist/summernote.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- PLUGINS STYLES-->
    <!-- THEME STYLES-->
    <link href="assets/css/main.min.css" rel="stylesheet" />
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

                include_once "form-create-test-content.php";

                include_once "footer.php";

            }

            else if($permissao == 2) {

                include_once "header-instrutor.php";

                include_once "navbar-instrutor.php";

                include_once "form-create-test-content.php"; 

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