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

        //Método verificarCategoriaExistente
        //Avalia se categoria já se encontra cadastrada no sistema
        //@param $titulo - título da categoria para a qual a verificação será realizada
        public function verificarCategoriaExistente($titulo) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $categoria_base_dados = "";
            $quantidade = 0;
            $titulo = utf8_decode($titulo);

            $sql_verificar_categoria = new SqlSelect();
            $sql_verificar_categoria -> adicionarColuna("*");
            $sql_verificar_categoria -> setEntidade("Categoria");

            $criterio_verificar_categoria = new Criterio();
            $criterio_verificar_categoria -> adicionar(new Filtro("categoria", "=", "'{$titulo}'"));

            $sql_verificar_categoria -> setCriterio($criterio_verificar_categoria);

            $localizar_categoria = $conexao_sql_station21 -> query($sql_verificar_categoria -> getInstrucao());

            while($linhas_verificar_categoria = $localizar_categoria -> fetch(PDO::FETCH_ASSOC)) {

                $categoria_base_dados = $linhas_verificar_categoria["categoria"];

                if($titulo == $categoria_base_dados) {
                    
                    $quantidade++;

                }

            }

            return $quantidade;

            $conexao_sql_station21 = NULL;

        }

        //Método setCategoria
        //Método para o cadastro de categoria na base de dados
        //@param $titulo - título da categoria a ser cadastrada
        public function setCategoria($titulo) {

            $titulo = utf8_decode($titulo);

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_cadastrar_categoria = new SqlInsert();
            $sql_cadastrar_categoria -> setEntidade("Categoria");
            $sql_cadastrar_categoria -> setValorLinha("categoria", $titulo);

            $cadastrar_categoria = $conexao_sql_station21 -> query($sql_cadastrar_categoria -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }
        
    }

?>