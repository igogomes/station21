<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $cod_curso = $_POST["cod-course"];
    $cod_modulo = $_POST["modulo"];
    $cod_avaliacao = $_POST["evaluation"];

    if ($cod_modulo == 0 || $cod_modulo == "") {

        header("Location: create-evaluation-content?cod-course=$cod_curso&erro-evaluation=1");

    }

    else {

        if($cod_avaliacao == 1) {

            header("Location: create-exercise?cod-course=$cod_curso&module=$cod_modulo&cod_evaluation=$cod_avaliacao");

        }

        else if($cod_avaliacao == 2) {

            header("Location: create-test?cod-course=$cod_curso&module=$cod_modulo&cod_evaluation=$cod_avaliacao");

        }

    }

?>