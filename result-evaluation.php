<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];
    $permissao = $_SESSION['permissao'];

    $nome = new AutenticarUsuario();
    $nome = utf8_encode($nome -> getNomeUsuario($email));

    $cod_usuario = new GerenciarUsuario();
    $cod_usuario = $cod_usuario -> getCodigoUsuarioPorEmail($email);

    $cod_curso = (isset($_GET["cod-course"])) ? $_GET["cod-course"] : "";
    $cod_exercicio = (isset($_GET["cod-exercise"])) ? $_GET["cod-exercise"] : "";
    $cod_prova = (isset($_GET["cod-test"])) ? $_GET["cod-test"] : "";
    $ultima_nota_exercicio = (isset($_GET["exercise"])) ? $_GET["exercise"] : "";
    $ultima_nota_prova = (isset($_GET["test"])) ? $_GET["test"] : "";

    $titulo_curso = new GerenciarCurso();
    $titulo_curso = $titulo_curso -> getTituloCursoPorCodigo($cod_curso);

    if($cod_exercicio != "") {

        $cod_modulo = new GerenciarExercicio();
        $cod_modulo = $cod_modulo -> getCodigoModuloPorCodigoExercicio($cod_exercicio);

        $titulo_modulo = new GerenciarModulo();
        $titulo_modulo = $titulo_modulo -> getTituloModuloPorCodigo($cod_modulo);

        $nota_exercicio = new GerenciarNota();
        $nota_exercicio = $nota_exercicio -> getNotaExercicio($cod_usuario, $cod_curso, $cod_exercicio);

        if($ultima_nota_exercicio != "") {

            $ultima_nota_exercicio = base64_decode($ultima_nota_exercicio);

        }

    }

    if($cod_prova != "") {

        $nota_prova = new GerenciarNota();
        $nota_prova = $nota_prova -> getNotaProva($cod_usuario, $cod_curso, $cod_prova);

        if($ultima_nota_prova != "") {

            $ultima_nota_prova = base64_decode($ultima_nota_prova);

        }

    }

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>
        <?php 
            
            if($cod_exercicio != "") {

                echo utf8_encode($titulo_curso). " - Nota do exercício do " . $titulo_modulo;

            }

            if($cod_prova != "") {

                echo "Nota da prova do curso de " . utf8_encode($titulo_curso);

            }
            
        ?> 
    | Station21</title>
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
        
            if($permissao == 3) {

                include_once "header-usuario.php";

                include_once "navbar-usuario.php";

                if($cod_exercicio != "") {

                    include_once "view-result-exercise.php";

                }

                if($cod_prova != "") {

                    include_once "view-result-test.php"; 

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