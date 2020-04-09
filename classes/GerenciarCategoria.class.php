<?php

    //Classe GerenciarCategoria.class.php
    //Classe para provimento dos métodos destinados ao gerenciamento de informações relacionadas a categorias

    include_once "Autoload.inc";

    class GerenciarCategoria {

        //Método gerarTabelaCategorias()
        //Método para geração de tabela simples contendo todas as categorias cadastradas
        public function gerarTabelaCategorias() {

            $tabela_categorias = "";
            $cod_categoria = "";
            $titulo = "";

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_gerar_tabela_categorias = new SqlSelect();
            $sql_gerar_tabela_categorias -> adicionarColuna("*");
            $sql_gerar_tabela_categorias -> setEntidade("Categoria");

            $criterio_gerar_tabela_categorias = new Criterio();
            $criterio_gerar_tabela_categorias -> setPropriedade("ORDER", "Categoria.categoria ASC");
        
            $sql_gerar_tabela_categorias -> setCriterio($criterio_gerar_tabela_categorias);

            $localizar_categorias = $conexao_sql_station21 -> query($sql_gerar_tabela_categorias -> getInstrucao());

            while($linhas_categorias = $localizar_categorias -> fetch(PDO::FETCH_ASSOC)) {

                $cod_categoria = $linhas_categorias["cod_categoria"];
                $titulo = utf8_encode($linhas_categorias["categoria"]);

                $tabela_categorias .= "<tr> 
                                        <td>" . $titulo . "</td> 
                                        <td> 
                                            <a href=\"edit-category?cod-category=$cod_categoria\">
                                                <button class=\"btn btn-default btn-xs m-r-5\" data-toggle=\"tooltip\" data-original-title=\"Editar\">
                                                    <i class=\"fa fa-pencil font-14\"></i>
                                                </button>
                                            </a>
                                            <a href=\"categories?cod-delete-category=$cod_categoria&delete-category=1\">
                                                <button class=\"btn btn-default btn-xs\" data-toggle=\"tooltip\" data-original-title=\"Excluir\">
                                                    <i class=\"fa fa-trash font-14\"></i>
                                                </button> 
                                            </a>
                                        </td>
                                    </tr>";

            }

            return $tabela_categorias;

            $conexao_sql_station21 = NULL;

        }

        //Método gerarListaCategorias
        //Método para geração de lista de categorias cadastradas no sistema
        public function gerarListaCategorias() {

            $cod_categoria = "";
            $categoria = "";
            $lista_categoria = "";

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_lista_categoria = new SqlSelect();
            $sql_lista_categoria -> adicionarColuna("*");
            $sql_lista_categoria -> setEntidade("Categoria");

            $criterio_lista_categoria = new Criterio();
            $criterio_lista_categoria -> setPropriedade("ORDER", "Categoria.categoria ASC");

            $sql_lista_categoria -> setCriterio($criterio_lista_categoria);

            $localizar_lista_categoria = $conexao_sql_station21 -> query($sql_lista_categoria -> getInstrucao());

            while($linhas_lista_categoria = $localizar_lista_categoria -> fetch(PDO::FETCH_ASSOC)) {

                $cod_categoria = $linhas_lista_categoria["cod_categoria"];
                $categoria = utf8_encode($linhas_lista_categoria["categoria"]);

                $lista_categoria .= "<option value=\"" . $cod_categoria . "\">" . $categoria . "</option>";

            }

            return $lista_categoria;

            $conexao_sql_station21 = NULL;

        }

    }

?>