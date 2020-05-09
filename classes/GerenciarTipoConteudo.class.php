<?php

    //Classe GerenciarTipoConteudo.class.php
    //Classe para provimento dos métodos destinados ao gerenciamento de informações relacionadas aos tipos de conteúdos

    include_once "Autoload.inc";

    class GerenciarTipoConteudo {

        //Método getTituloTipoConteudoPorCodigo
        //Retorna o título do tipo de conteúdo através do código do mesmo
        //@param $cod_tipo_conteudo - código do tipo de conteúdo do qual o título será recuperado
        public function getTituloTipoConteudoPorCodigo($cod_tipo_conteudo) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            
            $titulo_tipo_conteudo = "";

            $sql_titulo_tipo_conteudo = new SqlSelect();
            $sql_titulo_tipo_conteudo -> adicionarColuna("cod_tipo_conteudo, tipo");
            $sql_titulo_tipo_conteudo -> setEntidade("Tipo_Conteudo");

            $criterio_titulo_tipo_conteudo = new Criterio();
            $criterio_titulo_tipo_conteudo -> adicionar(new Filtro("cod_tipo_conteudo", "=", "'{$cod_tipo_conteudo}'"));

            $sql_titulo_tipo_conteudo -> setCriterio($criterio_titulo_tipo_conteudo);

            $localizar_titulo_tipo_conteudo = $conexao_sql_station21 -> query($sql_titulo_tipo_conteudo -> getInstrucao());

            while($linhas_titulo_tipo_conteudo = $localizar_titulo_tipo_conteudo -> fetch(PDO::FETCH_ASSOC)) {

                $titulo_tipo_conteudo = utf8_encode($linhas_titulo_tipo_conteudo["tipo"]);

            }

            return $titulo_tipo_conteudo;

            $conexao_sql_station21 = NULL;

        }

    }

?>