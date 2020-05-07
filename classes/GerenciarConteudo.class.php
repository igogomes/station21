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

        //Método gerarListaVideosAdminPorModulo
        //Método para a geração de lista de vídeos associados a um módulo de um curso
        //@param $cod_modulo - Código do módulo para o qual a lista será gerada
        public function gerarListaVideosAdminPorModulo($cod_modulo) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $lista_videos = "<table style=\"width: 100%;\">";
            $titulo_video = "";
            $contador = 0;

            $sql_lista_videos = new SqlSelect();
            $sql_lista_videos -> adicionarColuna("cod_modulo, cod_tipo, arquivo, titulo");
            $sql_lista_videos -> setEntidade("Conteudo");

            $criterio_lista_videos = new Criterio();
            $criterio_lista_videos -> adicionar(new Filtro("cod_modulo", "=", "'{$cod_modulo}'"));

            $sql_lista_videos -> setCriterio($criterio_lista_videos);

            $localizar_videos = $conexao_sql_station21 -> query($sql_lista_videos -> getInstrucao());

            while($linhas_lista_videos = $localizar_videos -> fetch(PDO::FETCH_ASSOC)) {

                $contador++;

                $titulo_video = utf8_encode($linhas_lista_videos["titulo"]);

                $lista_videos .= "<tr style=\"width: 100%;\">";
                $lista_videos .= "<td style=\"width: 100%;\">
                                    <div style=\"float: left; width: 50%;\">" . $contador . " - " . $titulo_video . "</div>
                                    <div style=\"float: right; width: 50%;\">
                                        <span style=\"text-align: right; float: right;\">
                                        <a href=\"edit-module?cod-module=$cod_modulo\">
                                            <button class=\"btn btn-default btn-xs m-r-5\" data-toggle=\"tooltip\" data-original-title=\"Editar\">
                                                <i class=\"fa fa-pencil font-14\"></i>
                                            </button>
                                        </a>
                                        <a href=\"modules?cod-delete-module=$cod_modulo&delete-module=1\">
                                            <button class=\"btn btn-default btn-xs\" data-toggle=\"tooltip\" data-original-title=\"Excluir\">
                                                <i class=\"fa fa-trash font-14\"></i>
                                            </button> 
                                        </a>
                                        </span>
                                    </div>
                                </td>";
                $lista_videos .= "</tr>";

            }

            $lista_videos .= "</table>";

            return $lista_videos;

            $conexao_sql_station21 = NULL;

        }

    }

?>