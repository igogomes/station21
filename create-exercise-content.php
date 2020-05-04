<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];
    $permissao = $_SESSION['permissao'];

    $nome = new AutenticarUsuario();
    $nome = utf8_encode($nome -> getNomeUsuario($email));

    $cod_curso = (isset($_GET["cod-course"])) ? $_GET["cod-course"] : "";
    $modulo = (isset($_GET["module"])) ? $_GET["module"] : "";
    $numero_exercicio = (isset($_POST["exercise-number"])) ? $_POST["exercise-number"] : 1;
    $cod_exercicio = (isset($_POST["cod-exercise"])) ? $_POST["cod-exercise"] : "";

    if($cod_curso == "") {

        $cod_curso = (isset($_POST["cod-course"])) ? $_POST["cod-course"] : "";

    }

    if($modulo == "") {

        $modulo = (isset($_POST["module"])) ? $_POST["module"] : "";

    }

    $enunciado_exercicio = (isset($_POST["enunciado-exercicio"])) ? $_POST["enunciado-exercicio"] : "";
    $primeira_alternativa_exercicio = (isset($_POST["primeira-alternativa-exercicio"])) ? $_POST["primeira-alternativa-exercicio"] : "";
    $segunda_alternativa_exercicio = (isset($_POST["segunda-alternativa-exercicio"])) ? $_POST["segunda-alternativa-exercicio"] : "";
    $terceira_alternativa_exercicio = (isset($_POST["terceira-alternativa-exercicio"])) ? $_POST["terceira-alternativa-exercicio"] : "";
    $quarta_alternativa_exercicio = (isset($_POST["quarta-alternativa-exercicio"])) ? $_POST["quarta-alternativa-exercicio"] : "";
    $e_resposta_exercicio = (isset($_POST["e-resposta-exercicio"])) ? $_POST["e-resposta-exercicio"] : "";

    $titulo = new GerenciarCurso();
    $titulo = $titulo -> getTituloCursoPorCodigo($cod_curso); 

    $titulo_modulo = new GerenciarModulo();
    $titulo_modulo = $titulo_modulo -> getTituloModuloPorCodigo($modulo);

    if($enunciado_exercicio != "" && $primeira_alternativa_exercicio != "" && $segunda_alternativa_exercicio != "" && $terceira_alternativa_exercicio != "" && $quarta_alternativa_exercicio != "" && $e_resposta_exercicio != "" && $numero_exercicio == 2) {

        $cadastrar_exercicio = new GerenciarExercicio();
        $cadastrar_exercicio = $cadastrar_exercicio -> setExercicio($modulo);

    }

    if($enunciado_exercicio != "" && $primeira_alternativa_exercicio != "" && $segunda_alternativa_exercicio != "" && $terceira_alternativa_exercicio != "" && $quarta_alternativa_exercicio != "" && $e_resposta_exercicio != "") {

        $cadastrar_questao = new GerenciarQuestao();
        $cadastrar_questao = $cadastrar_questao -> setQuestao($cod_exercicio, "", $enunciado_exercicio, $primeira_alternativa_exercicio, $segunda_alternativa_exercicio, $terceira_alternativa_exercicio, $quarta_alternativa_exercicio, $e_resposta_exercicio);

    }

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Cadastrar Exercício | Station21</title>
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

                include_once "form-create-exercise-content.php";

                include_once "footer.php";

            }

            else if($permissao == 2) {

                include_once "header-instrutor.php";

                include_once "navbar-instrutor.php";

                include_once "form-create-exercise-content.php"; 

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