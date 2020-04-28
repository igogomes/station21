<?php 

include "validate-session.inc";
include_once "Autoload.inc";

$cod_curso = $_POST["cod-course"];
$titulo_video = $_POST["titulo-video"];
$cod_modulo = $_POST["modulo"];
$arquivo_upload = (isset($_POST["send-file-upload"])) ? $_POST["send-file-upload"] : "";
$video_upload = (isset($_POST["send-video-upload"])) ? $_POST["send-video-upload"] : "";
$cadastrar_diretorio = "";

$diretorio = "content/$cod_curso/$cod_modulo/videos/";

if(($arquivo_upload != "") && ($video_upload != "")) {

    header("Location: create-video-content?cod-course=$cod_curso&erro-video=1");

}

else if(!is_dir("$diretorio")) {

    mkdir("$diretorio", 0755, true);

}

//header("Location: courses?content_type=1&create_content=1");

?>