<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $cod_curso = $_POST["cod-course"];
    $titulo_video = $_POST["titulo-video"];
    $cod_modulo = $_POST["modulo"];
    $arquivo_upload = (isset($_FILES["send-file-upload"])) ? $_FILES["send-file-upload"] : "";
    $video_link = (isset($_POST["send-video-link"])) ? $_POST["send-video-link"] : "";
    $cadastrar_diretorio = "";
    $extensao_arquivo_upload = "";
    $nome_arquivo_upload = "";
    $diretorio_arquivo_upload = "";
    $diretorio_completo_arquivo_upload = "";
    $cod_tipo = 1;

    if(($arquivo_upload != "") && ($video_link != "")) {

        header("Location: create-video-content?cod-course=$cod_curso&erro-video=1");

    }

    else if($cod_modulo == 0 || $cod_modulo == "") {

        header("Location: create-video-content?cod-course=$cod_curso&erro-video=2");

    }

    else if(($arquivo_upload != "") && ($video_link == "")) {

        $diretorio_arquivo_upload = "content/$cod_curso/$cod_modulo/videos/";

        if(!is_dir("$diretorio_arquivo_upload")) {

            mkdir("$diretorio_arquivo_upload", 0755, true);
        
        }

        date_default_timezone_set("Brazil/East");
        $nome_arquivo_upload = $_FILES["send-file-upload"]["name"];

        $extensao_arquivo_upload = strtolower(substr($nome_arquivo_upload, -4));
        $nome_arquivo_upload = $titulo_video . $extensao_arquivo_upload;

        move_uploaded_file($_FILES['send-file-upload']['tmp_name'], $diretorio_arquivo_upload . $nome_arquivo_upload);
        
        $diretorio_completo_arquivo_upload = $diretorio_arquivo_upload . $nome_arquivo_upload;

        $cadastrar_video = new GerenciarConteudo();
        $cadastrar_video = $cadastrar_video -> setConteudo($cod_modulo, $cod_tipo, $diretorio_completo_arquivo_upload, '', '', $titulo_video);

        header("Location: create-content?cod-curso=$cod_curso&content-type=1&create-content=1");

    }

    else if(($arquivo_upload == "") && ($video_link != "")) {

        $cadastrar_link_video = new GerenciarConteudo();
        $cadastrar_link_video = $cadastrar_link_video -> setConteudo($cod_modulo, $cod_tipo, $video_link, '', '', $titulo_video);

        header("Location: create-content?cod-curso=$cod_curso&content-type=1&create-content=1");

    }

?>