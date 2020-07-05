<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];
    $permissao = $_SESSION['permissao'];

    $nome = new AutenticarUsuario();
    $nome = utf8_encode($nome -> getNomeUsuario($email)); 

    $nome_usuario = (isset($_POST["nome"])) ? $_POST["nome"] : "";
    $email_usuario = (isset($_POST["email"])) ? $_POST["email"] : "";
    $permissao_usuario = (isset($_POST["permissao"])) ? $_POST["permissao"] : "";
    $sucesso_cadastro_usuario = 0;
    $erro_email_existente = 0;

    if($email_usuario != "") {

        $verificar_email_existente = new GerenciarUsuario();
        $verificar_email_existente = $verificar_email_existente -> verificarEmailExistenteGeral($email_usuario);

        if($verificar_email_existente != 0) {

            $erro_email_existente = 1;

        }

    }

    if($nome_usuario != "" && $email_usuario != "" && $permissao_usuario != "" && $erro_email_existente == 0) {

        $cadastrar_usuario = new GerenciarUsuario();
        $cadastrar_usuario = $cadastrar_usuario -> setUsuario($nome_usuario, $email_usuario, $permissao_usuario);

        $sucesso_cadastro_usuario = 1;

    }

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Cadastrar Usuário | Station21</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
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

                include_once "form-create-user.php";

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
    <!-- PAGE LEVEL SCRIPTS-->
</body>

</html>