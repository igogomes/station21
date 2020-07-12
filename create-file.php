<?php 

include "validate-session.inc";
include_once "Autoload.inc";

$cod_curso = $_POST["cod-course"];
$titulo_arquivo_original = $_POST["titulo-arquivo"];
$cod_modulo = $_POST["modulo"];
$arquivo_upload = $_FILES["send-file-upload"];
$cadastrar_diretorio = "";
$extensao_arquivo_upload = "";
$nome_arquivo_upload = "";
$diretorio_arquivo_upload = "";
$diretorio_completo_arquivo_upload = "";
$cod_tipo = 3;
$titulo_arquivo = "";
$verificar_arquivo = $_FILES["send-file-upload"]["size"];
$tipo_arquivo = "";
$nome_extensao_arquivo = $_FILES["send-file-upload"]["tmp_name"];

if($verificar_arquivo == 0) {

    header("Location: create-file-content?cod-course=$cod_curso&erro-file=1");

}

else if($cod_modulo == 0 || $cod_modulo == "") {

    header("Location: create-file-content?cod-course=$cod_curso&erro-file=2");

}

else if(($verificar_arquivo != 0) && ($cod_modulo != "") && ($cod_modulo != 0)) {

    $tipo_arquivo = mime_content_type($nome_extensao_arquivo);

    if(strstr($tipo_arquivo, "application") || strstr($tipo_arquivo, "image") || strstr($tipo_arquivo, "text")) {

        $titulo_arquivo = strtolower( preg_replace("/[^a-zA-Z0-9-]/", "-", strtr(utf8_decode(trim($titulo_arquivo_original)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")) );

        $diretorio_arquivo_upload = "content/$cod_curso/$cod_modulo/arquivos/";

        if(!is_dir("$diretorio_arquivo_upload")) {

            mkdir("$diretorio_arquivo_upload", 0755, true);
        
        }

        date_default_timezone_set("Brazil/East");
        $nome_arquivo_upload = $_FILES["send-file-upload"]["name"];

        $extensao_arquivo_upload = strtolower(substr($nome_arquivo_upload, -4));
        $nome_arquivo_upload = $titulo_arquivo . $extensao_arquivo_upload;

        move_uploaded_file($_FILES['send-file-upload']['tmp_name'], $diretorio_arquivo_upload . $nome_arquivo_upload);
        
        $diretorio_completo_arquivo_upload = $diretorio_arquivo_upload . $nome_arquivo_upload;

        $cadastrar_arquivo = new GerenciarConteudo();
        $cadastrar_arquivo = $cadastrar_arquivo -> setConteudo($cod_modulo, $cod_tipo, $diretorio_completo_arquivo_upload, '', '', $titulo_arquivo_original); 

        header("Location: create-content?cod-curso=$cod_curso&content-type=3&create-content=1"); 

    }

    else if(strstr($tipo_arquivo, "video")) {

        header("Location: create-file-content?cod-course=$cod_curso&erro-file=3");

    }

    else {

        header("Location: create-file-content?cod-course=$cod_curso&erro-file=4");

    }

}

?>