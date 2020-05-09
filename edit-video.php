<?php 

    include "validate-session.inc";
    include_once "Autoload.inc";

    $cod_conteudo = $_POST["cod-content"];
    $titulo_video = $_POST["titulo-video"];
    $cod_modulo = $_POST["modulo"];
    $arquivo_upload = $_FILES["send-file-upload"];
    $video_link = (isset($_POST["send-video-link"])) ? $_POST["send-video-link"] : "";
    $cadastrar_diretorio = "";
    $extensao_arquivo_upload = "";
    $nome_arquivo_upload = "";
    $diretorio_arquivo_upload = "";
    $diretorio_completo_arquivo_upload = "";
    $cod_tipo = 1;
    $titulo_arquivo = "";
    $verificar_arquivo = $_FILES["send-file-upload"]["size"];

    $cod_curso = new GerenciarModulo();
    $cod_curso = $cod_curso -> getCodigoCursoPorCodigoModulo($cod_modulo);

    if(($verificar_arquivo != 0) && ($video_link != "")) {

        header("Location: edit-content?cod-content=$cod_conteudo&erro-video=1");

    }

    else if($cod_modulo == 0 || $cod_modulo == "") {

        header("Location: edit-content?cod-content=$cod_conteudo&erro-video=2");

    }

    else if($verificar_arquivo == 0 && $video_link == "") {

        header("Location: edit-content?cod-content=$cod_conteudo&erro-video=3");

    }

    else if(($verificar_arquivo != 0) && ($video_link == "")) {

        $titulo_arquivo = strtolower( preg_replace("/[^a-zA-Z0-9-]/", "-", strtr(utf8_decode(trim($titulo_video)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")) );

        $diretorio_arquivo_upload = "content/$cod_curso/$cod_modulo/videos/";

        if(!is_dir("$diretorio_arquivo_upload")) {

            mkdir("$diretorio_arquivo_upload", 0755, true);
        
        }

        date_default_timezone_set("Brazil/East");
        $nome_arquivo_upload = $_FILES["send-file-upload"]["name"];

        $extensao_arquivo_upload = strtolower(substr($nome_arquivo_upload, -4));
        $nome_arquivo_upload = $titulo_arquivo . $extensao_arquivo_upload;

        move_uploaded_file($_FILES['send-file-upload']['tmp_name'], $diretorio_arquivo_upload . $nome_arquivo_upload);
        
        $diretorio_completo_arquivo_upload = $diretorio_arquivo_upload . $nome_arquivo_upload;
        
        $atualizar_video = new GerenciarConteudo();
        $atualizar_video = $atualizar_video -> atualizarDadosConteudo($cod_conteudo, $cod_modulo, $diretorio_completo_arquivo_upload, "", "", $titulo_video);

        header("Location: edit-content?cod-content=$cod_conteudo&content-type=1&edit-content=1");

    }

    else if(($verificar_arquivo == 0) && ($video_link != "")) {

        if(strstr($video_link, "http") && strstr($video_link, ":")) {

            $atualizar_video = new GerenciarConteudo();
            $atualizar_video = $atualizar_video -> atualizarDadosConteudo($cod_conteudo, $cod_modulo, $video_link, "", "", $titulo_video);

            header("Location: edit-content?cod-content=$cod_conteudo&content-type=1&edit-content=1");

        }

        else {

            header("Location: edit-content?cod-content=$cod_conteudo&erro-video=4");

        }

    }

?>