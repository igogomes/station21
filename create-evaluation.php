<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $cod_curso = $_POST["cod-course"];
    $cod_modulo = $_POST["modulo"];
    $cod_avaliacao = (isset($_POST["evaluation"])) ? $_POST["evaluation"] : "";

    if ($cod_modulo == 0 || $cod_modulo == "") {

        header("Location: create-evaluation-content?cod-course=$cod_curso&erro-evaluation=1");

    }

    else if($cod_avaliacao == "") {

        header("Location: create-evaluation-content?cod-course=$cod_curso&erro-evaluation=2");

    } 

    else {

        if($cod_avaliacao == 1) {

            header("Location: create-exercise-content?cod-course=$cod_curso&module=$cod_modulo");

        }

        else if($cod_avaliacao == 2) {

            header("Location: create-test-content?cod-course=$cod_curso&module=$cod_modulo");

        }

    }

?>