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

            $cod_conteudo = "";
            $cod_tipo = "";
            $lista_videos = "<table style=\"width: 100%;\">";
            $titulo_video = "";
            $contador = 0;

            $sql_lista_videos = new SqlSelect();
            $sql_lista_videos -> adicionarColuna("cod_conteudo, cod_modulo, cod_tipo, arquivo, titulo");
            $sql_lista_videos -> setEntidade("Conteudo");

            $criterio_lista_videos = new Criterio();
            $criterio_lista_videos -> adicionar(new Filtro("cod_modulo", "=", "'{$cod_modulo}'"));

            $sql_lista_videos -> setCriterio($criterio_lista_videos);

            $localizar_videos = $conexao_sql_station21 -> query($sql_lista_videos -> getInstrucao());

            while($linhas_lista_videos = $localizar_videos -> fetch(PDO::FETCH_ASSOC)) {

                $cod_conteudo = $linhas_lista_videos["cod_conteudo"];
                $cod_tipo = $linhas_lista_videos["cod_tipo"]; 
                $titulo_video = utf8_encode($linhas_lista_videos["titulo"]);

                if($cod_tipo == 1) {

                    $contador++;

                    $lista_videos .= "<tr style=\"width: 100%;\">";
                    $lista_videos .= "<td style=\"width: 100%;\">
                                        <div style=\"float: left; width: 90%;\">" . $contador . " - " . $titulo_video . "</div>
                                        <div style=\"float: right; width: 10%;\">
                                            <span style=\"text-align: right; float: right;\">
                                            <a href=\"edit-content?cod-content=$cod_conteudo\">
                                                <button class=\"btn btn-default btn-xs m-r-5\" data-toggle=\"tooltip\" data-original-title=\"Editar\">
                                                    <i class=\"fa fa-pencil font-14\"></i>
                                                </button>
                                            </a>
                                            <a href=\"contents?cod-delete-content=$cod_conteudo&delete-content=1\">
                                                <button class=\"btn btn-default btn-xs\" data-toggle=\"tooltip\" data-original-title=\"Excluir\">
                                                    <i class=\"fa fa-trash font-14\"></i>
                                                </button> 
                                            </a>
                                            </span>
                                        </div>
                                    </td>";
                    $lista_videos .= "</tr>";

                }

            }

            $lista_videos .= "</table>";

            return $lista_videos;

            $conexao_sql_station21 = NULL;

        }

        //Método gerarListaTextosAdminPorModulo
        //Método para a geração de lista de textos associados a um módulo de um curso
        //@param $cod_modulo - Código do módulo para o qual a lista será gerada
        public function gerarListaTextosAdminPorModulo($cod_modulo) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $cod_conteudo = "";
            $cod_tipo = "";
            $lista_textos = "<table style=\"width: 100%;\">";
            $titulo_texto = "";
            $contador = 0;

            $sql_lista_textos = new SqlSelect();
            $sql_lista_textos -> adicionarColuna("cod_conteudo, cod_modulo, cod_tipo, texto, titulo");
            $sql_lista_textos -> setEntidade("Conteudo");

            $criterio_lista_textos = new Criterio();
            $criterio_lista_textos -> adicionar(new Filtro("cod_modulo", "=", "'{$cod_modulo}'"));

            $sql_lista_textos -> setCriterio($criterio_lista_textos);

            $localizar_textos = $conexao_sql_station21 -> query($sql_lista_textos -> getInstrucao());

            while($linhas_lista_textos = $localizar_textos -> fetch(PDO::FETCH_ASSOC)) {

                $cod_conteudo = $linhas_lista_textos["cod_conteudo"];
                $cod_tipo = $linhas_lista_textos["cod_tipo"]; 
                $titulo_texto = utf8_encode($linhas_lista_textos["titulo"]);

                if($cod_tipo == 2) {

                    $contador++;

                    $lista_textos .= "<tr style=\"width: 100%;\">";
                    $lista_textos .= "<td style=\"width: 100%;\">
                                        <div style=\"float: left; width: 90%;\">" . $contador . " - " . $titulo_texto . "</div>
                                        <div style=\"float: right; width: 10%;\">
                                            <span style=\"text-align: right; float: right;\">
                                            <a href=\"edit-content?cod-content=$cod_conteudo\">
                                                <button class=\"btn btn-default btn-xs m-r-5\" data-toggle=\"tooltip\" data-original-title=\"Editar\">
                                                    <i class=\"fa fa-pencil font-14\"></i>
                                                </button>
                                            </a>
                                            <a href=\"contents?cod-delete-content=$cod_conteudo&delete-content=1\">
                                                <button class=\"btn btn-default btn-xs\" data-toggle=\"tooltip\" data-original-title=\"Excluir\">
                                                    <i class=\"fa fa-trash font-14\"></i>
                                                </button> 
                                            </a>
                                            </span>
                                        </div>
                                    </td>";
                    $lista_textos .= "</tr>";

                }

            }

            $lista_textos .= "</table>";

            return $lista_textos;

            $conexao_sql_station21 = NULL;

        }

        //Método gerarListaArquivosAdminPorModulo
        //Método para a geração de lista de arquivos associados a um módulo de um curso
        //@param $cod_modulo - Código do módulo para o qual a lista será gerada
        public function gerarListaArquivosAdminPorModulo($cod_modulo) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $cod_conteudo = "";
            $cod_tipo = "";
            $lista_arquivos = "<table style=\"width: 100%;\">";
            $titulo_arquivo = "";
            $contador = 0;

            $sql_lista_arquivos = new SqlSelect();
            $sql_lista_arquivos -> adicionarColuna("cod_conteudo, cod_modulo, cod_tipo, arquivo, titulo");
            $sql_lista_arquivos -> setEntidade("Conteudo");

            $criterio_lista_arquivos = new Criterio();
            $criterio_lista_arquivos -> adicionar(new Filtro("cod_modulo", "=", "'{$cod_modulo}'"));

            $sql_lista_arquivos -> setCriterio($criterio_lista_arquivos);

            $localizar_arquivos = $conexao_sql_station21 -> query($sql_lista_arquivos -> getInstrucao());

            while($linhas_lista_arquivos = $localizar_arquivos -> fetch(PDO::FETCH_ASSOC)) {

                $cod_conteudo = $linhas_lista_arquivos["cod_conteudo"];
                $cod_tipo = $linhas_lista_arquivos["cod_tipo"]; 
                $titulo_arquivo = utf8_encode($linhas_lista_arquivos["titulo"]);

                if($cod_tipo == 3) {

                    $contador++;

                    $lista_arquivos .= "<tr style=\"width: 100%;\">";
                    $lista_arquivos .= "<td style=\"width: 100%;\">
                                        <div style=\"float: left; width: 90%;\">" . $contador . " - " . $titulo_arquivo . "</div>
                                        <div style=\"float: right; width: 10%;\">
                                            <span style=\"text-align: right; float: right;\">
                                            <a href=\"edit-content?cod-content=$cod_conteudo\">
                                                <button class=\"btn btn-default btn-xs m-r-5\" data-toggle=\"tooltip\" data-original-title=\"Editar\">
                                                    <i class=\"fa fa-pencil font-14\"></i>
                                                </button>
                                            </a>
                                            <a href=\"contents?cod-delete-content=$cod_conteudo&delete-content=1\">
                                                <button class=\"btn btn-default btn-xs\" data-toggle=\"tooltip\" data-original-title=\"Excluir\">
                                                    <i class=\"fa fa-trash font-14\"></i>
                                                </button> 
                                            </a>
                                            </span>
                                        </div>
                                    </td>";
                    $lista_arquivos .= "</tr>";

                }

            }

            $lista_arquivos .= "</table>";

            return $lista_arquivos;

            $conexao_sql_station21 = NULL;

        }

        //Método gerarListaLinksAdminPorModulo
        //Método para a geração de lista de links associados a um módulo de um curso
        //@param $cod_modulo - Código do módulo para o qual a lista será gerada
        public function gerarListaLinksAdminPorModulo($cod_modulo) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $cod_conteudo = "";
            $cod_tipo = "";
            $lista_links = "<table style=\"width: 100%;\">";
            $titulo_link = "";
            $contador = 0;

            $sql_lista_links = new SqlSelect();
            $sql_lista_links -> adicionarColuna("cod_conteudo, cod_modulo, cod_tipo, link, titulo");
            $sql_lista_links -> setEntidade("Conteudo");

            $criterio_lista_links = new Criterio();
            $criterio_lista_links -> adicionar(new Filtro("cod_modulo", "=", "'{$cod_modulo}'"));

            $sql_lista_links -> setCriterio($criterio_lista_links);

            $localizar_links = $conexao_sql_station21 -> query($sql_lista_links -> getInstrucao());

            while($linhas_lista_links = $localizar_links -> fetch(PDO::FETCH_ASSOC)) {

                $cod_conteudo = $linhas_lista_links["cod_conteudo"];
                $cod_tipo = $linhas_lista_links["cod_tipo"]; 
                $titulo_link = utf8_encode($linhas_lista_links["titulo"]);

                if($cod_tipo == 4) {

                    $contador++;

                    $lista_links .= "<tr style=\"width: 100%;\">";
                    $lista_links .= "<td style=\"width: 100%;\">
                                        <div style=\"float: left; width: 90%;\">" . $contador . " - " . $titulo_link . "</div>
                                        <div style=\"float: right; width: 10%;\">
                                            <span style=\"text-align: right; float: right;\">
                                            <a href=\"edit-content?cod-content=$cod_conteudo\">
                                                <button class=\"btn btn-default btn-xs m-r-5\" data-toggle=\"tooltip\" data-original-title=\"Editar\">
                                                    <i class=\"fa fa-pencil font-14\"></i>
                                                </button>
                                            </a>
                                            <a href=\"contents?cod-delete-content=$cod_conteudo&delete-content=1\">
                                                <button class=\"btn btn-default btn-xs\" data-toggle=\"tooltip\" data-original-title=\"Excluir\">
                                                    <i class=\"fa fa-trash font-14\"></i>
                                                </button> 
                                            </a>
                                            </span>
                                        </div>
                                    </td>";
                    $lista_links .= "</tr>";

                }

            }

            $lista_links .= "</table>";

            return $lista_links;

            $conexao_sql_station21 = NULL;

        }

        //Método getCodigoModuloPorCodigoConteudo
        //Retorna o código do módulo através do código do conteúdo
        //@param $cod_conteudo - código do conteúdo do qual o código do módulo será recuperado
        public function getCodigoModuloPorCodigoConteudo($cod_conteudo) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            
            $cod_modulo = "";

            $sql_cod_modulo = new SqlSelect();
            $sql_cod_modulo -> adicionarColuna("cod_conteudo, cod_modulo");
            $sql_cod_modulo -> setEntidade("Conteudo");

            $criterio_cod_modulo = new Criterio();
            $criterio_cod_modulo -> adicionar(new Filtro("cod_conteudo", "=", "'{$cod_conteudo}'"));

            $sql_cod_modulo -> setCriterio($criterio_cod_modulo);

            $localizar_cod_modulo = $conexao_sql_station21 -> query($sql_cod_modulo -> getInstrucao());

            while($linhas_cod_modulo = $localizar_cod_modulo -> fetch(PDO::FETCH_ASSOC)) {

                $cod_modulo = $linhas_cod_modulo["cod_modulo"];

            }

            return $cod_modulo;

            $conexao_sql_station21 = NULL;

        }

        //Método getTipoConteudoPorCodigoConteudo
        //Retorna o tipo do conteúdo através do código do mesmo
        //@param $cod_conteudo - código do conteúdo do qual o tipo do mesmo será recuperado
        public function getTipoConteudoPorCodigoConteudo($cod_conteudo) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            
            $cod_tipo = "";

            $sql_cod_tipo = new SqlSelect();
            $sql_cod_tipo -> adicionarColuna("cod_conteudo, cod_tipo");
            $sql_cod_tipo -> setEntidade("Conteudo");

            $criterio_cod_tipo = new Criterio();
            $criterio_cod_tipo -> adicionar(new Filtro("cod_conteudo", "=", "'{$cod_conteudo}'"));

            $sql_cod_tipo -> setCriterio($criterio_cod_tipo);

            $localizar_cod_tipo = $conexao_sql_station21 -> query($sql_cod_tipo -> getInstrucao());

            while($linhas_cod_tipo = $localizar_cod_tipo -> fetch(PDO::FETCH_ASSOC)) {

                $cod_tipo = $linhas_cod_tipo["cod_tipo"];

            }

            return $cod_tipo;

            $conexao_sql_station21 = NULL;

        }

        //Método getTituloConteudoPorCodigoConteudo
        //Retorna o título do conteúdo através do código do mesmo
        //@param $cod_conteudo - código do conteúdo do qual o título do mesmo será recuperado
        public function getTituloConteudoPorCodigoConteudo($cod_conteudo) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            
            $titulo = "";

            $sql_cod_conteudo = new SqlSelect();
            $sql_cod_conteudo -> adicionarColuna("cod_conteudo, titulo");
            $sql_cod_conteudo -> setEntidade("Conteudo");

            $criterio_cod_conteudo = new Criterio();
            $criterio_cod_conteudo -> adicionar(new Filtro("cod_conteudo", "=", "'{$cod_conteudo}'"));

            $sql_cod_conteudo -> setCriterio($criterio_cod_conteudo);

            $localizar_cod_conteudo = $conexao_sql_station21 -> query($sql_cod_conteudo -> getInstrucao());

            while($linhas_cod_conteudo = $localizar_cod_conteudo -> fetch(PDO::FETCH_ASSOC)) {

                $titulo = $linhas_cod_conteudo["titulo"];

            }

            return $titulo;

            $conexao_sql_station21 = NULL;

        }

        //Método getArquivoPorCodigoConteudo
        //Retorna o arquivo do conteúdo através do código do mesmo
        //@param $cod_conteudo - código do conteúdo do qual o arquivo será recuperado
        public function getArquivoPorCodigoConteudo($cod_conteudo) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            
            $arquivo = "";

            $sql_arquivo_conteudo = new SqlSelect();
            $sql_arquivo_conteudo -> adicionarColuna("cod_conteudo, arquivo");
            $sql_arquivo_conteudo -> setEntidade("Conteudo");

            $criterio_arquivo_conteudo = new Criterio();
            $criterio_arquivo_conteudo -> adicionar(new Filtro("cod_conteudo", "=", "'{$cod_conteudo}'"));

            $sql_arquivo_conteudo -> setCriterio($criterio_arquivo_conteudo);

            $localizar_arquivo_conteudo = $conexao_sql_station21 -> query($sql_arquivo_conteudo -> getInstrucao());

            while($linhas_arquivo_conteudo = $localizar_arquivo_conteudo -> fetch(PDO::FETCH_ASSOC)) {

                $arquivo = $linhas_arquivo_conteudo["arquivo"];

            }

            return $arquivo;

            $conexao_sql_station21 = NULL;

        }

        //Método getLinkPorCodigoConteudo
        //Retorna o link do conteúdo através do código do mesmo
        //@param $cod_conteudo - código do conteúdo do qual o link será recuperado
        public function getLinkPorCodigoConteudo($cod_conteudo) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            
            $link = "";

            $sql_link_conteudo = new SqlSelect();
            $sql_link_conteudo -> adicionarColuna("cod_conteudo, link");
            $sql_link_conteudo -> setEntidade("Conteudo");

            $criterio_link_conteudo = new Criterio();
            $criterio_link_conteudo -> adicionar(new Filtro("cod_conteudo", "=", "'{$cod_conteudo}'"));

            $sql_link_conteudo -> setCriterio($criterio_link_conteudo);

            $localizar_link_conteudo = $conexao_sql_station21 -> query($sql_link_conteudo -> getInstrucao());

            while($linhas_link_conteudo = $localizar_link_conteudo -> fetch(PDO::FETCH_ASSOC)) {

                $link = $linhas_link_conteudo["link"];

            }

            return $link;

            $conexao_sql_station21 = NULL;

        }

        //Método getTextoPorCodigoConteudo
        //Retorna o texto do conteúdo através do código do mesmo
        //@param $cod_conteudo - código do conteúdo do qual o texto será recuperado
        public function getTextoPorCodigoConteudo($cod_conteudo) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            
            $texto = "";

            $sql_texto_conteudo = new SqlSelect();
            $sql_texto_conteudo -> adicionarColuna("cod_conteudo, texto");
            $sql_texto_conteudo -> setEntidade("Conteudo");

            $criterio_texto_conteudo = new Criterio();
            $criterio_texto_conteudo -> adicionar(new Filtro("cod_conteudo", "=", "'{$cod_conteudo}'"));

            $sql_texto_conteudo -> setCriterio($criterio_texto_conteudo);

            $localizar_texto_conteudo = $conexao_sql_station21 -> query($sql_texto_conteudo -> getInstrucao());

            while($linhas_texto_conteudo = $localizar_texto_conteudo -> fetch(PDO::FETCH_ASSOC)) {

                $texto = $linhas_texto_conteudo["texto"];

            }

            return $texto;

            $conexao_sql_station21 = NULL;

        }

        //Método atualizarDadosConteudo()
        //Método para atualização dos dados de conteúdos na base de dados
        //@param $cod_conteudo - código do conteúdo para o qual os dados serão alterados
        //@param $cod_modulo - código do módulo do conteúdo para alteração
        //@param $arquivo - arquivo do conteúdo para alteração
        //@param $link - link do conteúdo para alteração
        //@param $texto - texto do conteúdo para altearção
        //@param $titulo - título do conteúdo para alteração
        public function atualizarDadosConteudo($cod_conteudo, $cod_modulo, $arquivo, $link, $texto, $titulo) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $texto = utf8_decode($texto);
            $titulo = utf8_decode($titulo);

            $sql_atualizar_dados_conteudo = new SqlUpdate();
            $sql_atualizar_dados_conteudo -> setEntidade("Conteudo");
            $sql_atualizar_dados_conteudo -> setValorLinha("cod_modulo", "{$cod_modulo}");
            $sql_atualizar_dados_conteudo -> setValorLinha("arquivo", "{$arquivo}");
            $sql_atualizar_dados_conteudo -> setValorLinha("link", "{$link}");
            $sql_atualizar_dados_conteudo -> setValorLinha("texto", "{$texto}");
            $sql_atualizar_dados_conteudo -> setValorLinha("titulo", "{$titulo}");

            $criterio_atualizar_dados_conteudo = new Criterio();
            $criterio_atualizar_dados_conteudo -> adicionar(new Filtro("cod_conteudo", "=", "'{$cod_conteudo}'"));

            $sql_atualizar_dados_conteudo -> setCriterio($criterio_atualizar_dados_conteudo);

            $atualizar_dados_conteudo = $conexao_sql_station21 -> query($sql_atualizar_dados_conteudo -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

    }

?>