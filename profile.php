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

    $nome_usuario_perfil = (isset($_POST["nome"])) ? $_POST["nome"] : "";
    $email_usuario_perfil = (isset($_POST["email"])) ? $_POST["email"] : "";
    $senha_usuario_perfil = (isset($_POST["senha"])) ? $_POST["senha"] : "";
    $nova_senha_usuario_perfil = (isset($_POST["nova-senha"])) ? $_POST["nova-senha"] : "";
    $confirmar_senha_usuario_perfil = (isset($_POST["confirmar-senha"])) ? $_POST["confirmar-senha"] : "";
    $erro_email_existente = 0;
    $erro_senha_atual = 0;
    $erro_nova_senha = 0;
    $atualizar_perfil = 0;

    if($email_usuario_perfil != "") {

        $verificar_email_existente = new GerenciarUsuario();
        $verificar_email_existente = $verificar_email_existente -> verificarEmailExistente($email_usuario_perfil);

        if($verificar_email_existente != 0) {

            $erro_email_existente = 1;

        }

    }

    if($nome_usuario_perfil != "" && ($nome_usuario_perfil != $nome)) {

        if($senha_usuario_perfil == $senha) {

            $atualizar_nome_usuario = new GerenciarUsuario();
            $atualizar_nome_usuario = $atualizar_nome_usuario -> atualizarNomeUsuario($cod_usuario, $nome_usuario_perfil);
            $atualizar_perfil = 1;

        }

        else {

            $erro_senha_atual = 1;

        }

    }

    if(($email_usuario_perfil != "") && ($email_usuario_perfil != $email) && ($verificar_email_existente == 0)) {

        if($senha_usuario_perfil == $senha) {

            $atualizar_email_usuario = new GerenciarUsuario();
            $atualizar_email_usuario = $atualizar_email_usuario -> atualizarEmailUsuario($cod_usuario, $email_usuario_perfil);
            $atualizar_perfil = 1;

            session_start();
            ob_start();
            $_SESSION = array();
            session_destroy();
            
            header("Location: login");

        }

        else {

            $erro_senha_atual = 1;

        }

    }

    if($nova_senha_usuario_perfil != "" || $confirmar_senha_usuario_perfil != "") {

        if($senha_usuario_perfil != $senha) {

            $erro_senha_atual = 1;

        }

        else if($nova_senha_usuario_perfil != $confirmar_senha_usuario_perfil) {

            $erro_nova_senha = 1;

        }

        else {

            $atualizar_email_usuario = new GerenciarUsuario();
            $atualizar_email_usuario = $atualizar_email_usuario -> atualizarSenhaUsuario($cod_usuario, $nova_senha_usuario_perfil);
            $atualizar_perfil = 1;

            session_start();
            ob_start();
            $_SESSION = array();
            session_destroy();
            
            header("Location: login");

        }

    }

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Meu Perfil | Station21</title>
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

            }

            else if($permissao == 2) {

                include_once "header-instrutor.php";
                include_once "navbar-instrutor.php";

            }

            else if($permissao == 3) {

                include_once "header-usuario.php";
                include_once "navbar-usuario.php";

            }

            if($permissao == 1 || $permissao == 2 || $permissao == 3) {

                include_once "form-edit-profile.php";

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
    <!-- CORE SCRIPTS-->
    <script src="assets/js/app.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
</body>

</html>