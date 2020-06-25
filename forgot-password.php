<?php

    session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Esqueceu sua senha? | Station21</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="assets/css/main.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="./assets/css/pages/auth-light.css" rel="stylesheet" />
    <link href="./assets/css/pages/forgot-password.css" rel="stylesheet" />
    <link rel="shortcut icon" href="./assets/img/favicon/logo-station-21-transparent.png" />
</head>

<body>
    <div class="content">
        <div class="brand">
            <a href="login">
                <img class="main-top-logo" src="./assets/img/logos/logo-station-21-horizontal.png"/>
            </a>
        </div>
        <form id="forgot-form" action="recovery-password" method="post">
            <h3 class="m-t-10 m-b-10 forgot-password-title">Esqueci minha senha</h3>
            <p class="m-b-20 forgot-password-description">Digite abaixo no campo abaixo para solicitar a recuperação de sua senha:</p>
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email" maxlength="100" autocomplete="off" required>
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit">Enviar</button>
            </div>
            <div class="form-group forgot-password-login-box">
                <a href="login">Voltar</a>
            </div>

            <?php 

                if(isset($_SESSION["aviso"])) {

                    echo "<br><br>";
                    echo "<center>";
                    echo "<span class = \"alert alert-success\">";
                    echo $_SESSION["aviso"];
                    echo "</span>";
                    echo "</center>";
                    echo "<br><br>";
                    unset($_SESSION["aviso"]);
                    
                }

                if(isset($_SESSION["erro"])) {

                    echo "<br><br>";
                    echo "<center>";
                    echo "<span class = \"alert alert-danger\">";
                    echo $_SESSION["erro"];
                    echo "</span>";
                    echo "</center>";
                    echo "<br><br>";
                    unset($_SESSION["erro"]);
                    
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
            $('#forgot-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
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