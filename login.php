<?php

    session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Login | Station21</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="assets/css/main.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="./assets/css/pages/auth-light.css" rel="stylesheet" />
    <link href="./assets/css/pages/login.css" rel="stylesheet" />
    <link rel="shortcut icon" href="./assets/img/favicon/logo-station-21-transparent.png" />
</head>

<body class="background-body-login">
    <div class="content">
        <div class="brand">
            <img class="main-top-logo" src="./assets/img/logos/logo-station-21-horizontal.png"/>
        </div>
        <form id="login-form" action="validate-login" method="post">
            <h2 class="login-title">Acesse sua conta</h2>
            <div class="form-group">
                <div class="input-group-icon right">
                    <input class="form-control" type="email" name="email" placeholder="Digite o e-mail">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <input class="form-control" type="password" name="senha" placeholder="Digite a senha">
                </div>
            </div>
            <div class="form-group forgot-password-login-box">
                <a href="forgot-password">Esqueceu sua senha?</a>
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit">Entrar</button>
            </div>

            <?php 

                if(isset($_SESSION["aviso"])) {

                    echo "<br><br>";
                    echo "<center>";
                    echo "<span class = \"alert alert-danger\">";
                    echo $_SESSION["aviso"];
                    echo "</span>";
                    echo "</center>";
                    echo "<br><br>";
                    unset($_SESSION["aviso"]);
                    
                }

            ?>

        </form>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Carregando...</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS -->
    <script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="./assets/vendors/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="assets/js/app.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
</body>

</html>