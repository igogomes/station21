<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";
    include "libraries/mpdf/mpdf.php";

    error_reporting(0);
    ini_set('display_errors', 0);

    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];
    $permissao = $_SESSION['permissao'];

    $nome = new AutenticarUsuario();
    $nome = utf8_encode($nome -> getNomeUsuario($email));

    $cod_usuario = (isset($_POST["cod-user"])) ? $_POST["cod-user"] : "";
    $cod_curso = (isset($_POST["cod-course"])) ? $_POST["cod-course"] : "";

    $titulo_curso = new GerenciarCurso();
    $titulo_curso = $titulo_curso -> getTituloCursoPorCodigo($cod_curso);

    $html = "<html>
                <body>
                    <div style=\"text-align: center;\">
                        <img style=\"width: 30%;\" src=\"./assets/img/logos/logo-station-21-horizontal.png\"/>
                    </div>
                    <div style=\"color: #333; text-align: center; font-weight: 400; font-size: 2rem; font-family: 'Open Sans', sans-serif; margin-top: 30px; margin-bottom: 100px;\">
                        Certificado de Participação de Curso
                    </div>
                    <div style=\"color: #333; text-align: center; font-weight: 400; font-size: 1rem; font-family: 'Open Sans', sans-serif; margin-top: 0px; margin-bottom: 10px;\">
                        Este certificado confirma a participação de
                    </div>
                    <div style=\"color: #333; text-align: center; font-weight: 400; font-size: 2rem; font-family: 'Open Sans', sans-serif; margin-top: 10px; margin-bottom: v;\">
                        $nome
                    </div>
                    <div style=\"color: #333; text-align: center; font-weight: 400; font-size: 1rem; font-family: 'Open Sans', sans-serif; margin-top: 10px; margin-bottom: 10px;\">
                        no curso de
                    </div>
                    <div style=\"color: #333; text-align: center; font-weight: 400; font-size: 2rem; font-family: 'Open Sans', sans-serif; margin-top: 10px; margin-bottom: 70px;\">
                        $titulo_curso.
                    </div>
                </body>
             </html>";

    $arquivo_certificado = "Certificado Station21 - Curso " . $titulo_curso . " - " . $nome . ".pdf";

    $mpdf = new mPDF('c', 'A4-L'); 
    $mpdf -> WriteHTML($html, 0);
    ob_clean();

    $mpdf -> Output($arquivo_certificado, 'D');

?>