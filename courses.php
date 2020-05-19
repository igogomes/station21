<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];
    $permissao = $_SESSION['permissao'];

    $nome = new AutenticarUsuario();
    $nome = utf8_encode($nome -> getNomeUsuario($email));  

    $cod_excluir_curso = (isset($_GET["cod-delete-course"])) ? $_GET["cod-delete-course"] : "";
    $excluir_curso = (isset($_GET["delete-course"])) ? $_GET["delete-course"] : "";
    $erro_cadastro_curso = (isset($_GET["erro-cadastro-curso"])) ? $_GET["erro-cadastro-curso"] : "";
    $cod_curso_erro_cadastro = (isset($_GET["erro-cadastro-cod-curso"])) ? $_GET["erro-cadastro-cod-curso"] : "";
    $cod_modificar_status = (isset($_GET["cod-course-modify-status"])) ? $_GET["cod-course-modify-status"] : "";
    $modificar_status = (isset($_GET["modify-status"])) ? $_GET["modify-status"] : "";

    if($excluir_curso != "") {

        $titulo_curso_excluir = new GerenciarCurso();
        $titulo_curso_excluir = $titulo_curso_excluir -> getTituloCursoPorCodigo($cod_excluir_curso);

    }

    if($cod_curso_erro_cadastro != "") {

        $titulo_curso_cadastrado = new GerenciarCurso();
        $titulo_curso_cadastrado = $titulo_curso_cadastrado -> getTituloCursoPorCodigo($cod_curso_erro_cadastro);

    }

    if(($cod_modificar_status != "") && ($modificar_status != "")) {

        $atualizar_status_curso = new GerenciarCurso();
        $atualizar_status_curso = $atualizar_status_curso -> atualizarStatusCurso($cod_modificar_status, $modificar_status);

    }

    $cod_excluir_curso = (isset($_GET["cod-delete-course"])) ? $_GET["cod-delete-course"] : "";
    $excluir_curso = (isset($_GET["delete-course"])) ? $_GET["delete-course"] : "";

    if($excluir_curso != "") {

        $titulo_curso_excluir = new GerenciarCurso();
        $titulo_curso_excluir = $titulo_curso_excluir -> getTituloCursoPorCodigo($cod_excluir_curso);

    }

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Cursos | Station21</title>
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

                include_once "data-base-courses.php";

                include_once "footer.php";

            }

            else if($permissao == 2) {

                include_once "header-instrutor.php";

                include_once "navbar-instrutor.php";

                include_once "data-base-courses.php";

                include_once "footer.php";

            }

            else if($permissao == 3) {

                include_once "header-usuario.php";

                include_once "navbar-usuario.php";

                include_once "data-base-my-courses.php"; 

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