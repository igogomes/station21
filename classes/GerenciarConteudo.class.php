<?php

    //Classe GerenciarConteudo.class.php
    //Classe para provimento dos métodos destinados ao gerenciamento de informações relacionadas a conteúdos

    include_once "Autoload.inc";

    class GerenciarConteudo {

        //Método setConteudo
        //Método para o cadastro de conteúdo na base de dados
        //@param $cod_modulo - módulo do curso para o qual o conteúdo será cadastrado
        //@param $cod_tipo - código do tipo de conteúdo que será cadastrado
        //@param $arquivo - diretório do arquivo associado ao conteúdo que será cadastrado
        //@param $link - link do arquivo associado ao conteúdo que será cadastrado
        //@param $texto - texto associado ao conteúdo que será cadastrado
        //@param $titulo - Título do conteúdo que será cadastrado
        public function setConteudo($cod_modulo, $cod_tipo, $arquivo, $link, $texto, $titulo) {

            $arquivo = utf8_decode($arquivo);
            $link = utf8_decode($link);
            $texto = utf8_decode($texto);
            $titulo = ucwords(utf8_decode($titulo));
            
            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_cadastrar_conteudo = new SqlInsert();
            $sql_cadastrar_conteudo -> setEntidade("Conteudo");
            $sql_cadastrar_conteudo -> setValorLinha("cod_modulo", "$cod_modulo");
            $sql_cadastrar_conteudo -> setValorLinha("cod_tipo", $cod_tipo);
            $sql_cadastrar_conteudo -> setValorLinha("arquivo", $arquivo);
            $sql_cadastrar_conteudo -> setValorLinha("link", $link);
            $sql_cadastrar_conteudo -> setValorLinha("texto", "$texto");
            $sql_cadastrar_conteudo -> setValorLinha("titulo", "$titulo");

            $cadastrar_conteudo = $conexao_sql_station21 -> query($sql_cadastrar_conteudo -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

    }

?>