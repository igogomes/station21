<?php

    //Classe GerenciarModulo.class.php
    //Classe para provimento dos métodos destinados ao gerenciamento de informações relacionadas a módulos

    include_once "Autoload.inc";

    class GerenciarModulo { 

        //Método setModulo
        //Método para o cadastro de módulos relacionados a cursos na base de dados
        //@param $cod_curso - código do curso ao qual os módulos serão relacionados
        public function setModulo($cod_curso, $modulo) {

            $modulo = utf8_decode($modulo);

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_cadastrar_modulo = new SqlInsert();
            $sql_cadastrar_modulo -> setEntidade("Modulo");
            $sql_cadastrar_modulo -> setValorLinha("modulo", "$modulo");
            $sql_cadastrar_modulo -> setValorLinha("cod_curso", $cod_curso);

            $cadastrar_modulo = $conexao_sql_station21 -> query($sql_cadastrar_modulo -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método gerarListaModulosPorCodigoCurso
        //Método para geração de lista de módulos cadastrados no sistema de acordo com código de curso
        //@param $cod_curso - código do curso ao qual os módulos estão relacionados
        public function gerarListaModulosPorCodigoCurso($cod_curso) {

            $cod_curso_base = "";
            $cod_modulo = "";
            $modulo = "";
            $lista_modulos = "";

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_lista_modulo = new SqlSelect();
            $sql_lista_modulo -> adicionarColuna("*");
            $sql_lista_modulo -> setEntidade("Modulo");

            $criterio_lista_modulo_1 = new Criterio();
            $criterio_lista_modulo_1 -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $criterio_lista_modulo = new Criterio();
            $criterio_lista_modulo -> setPropriedade("ORDER", "cod_modulo ASC");
            $criterio_lista_modulo -> adicionar($criterio_lista_modulo_1, Expressao::OPERADOR_AND);

            $sql_lista_modulo -> setCriterio($criterio_lista_modulo);

            $localizar_lista_modulo = $conexao_sql_station21 -> query($sql_lista_modulo -> getInstrucao());

            while($linhas_lista_modulo = $localizar_lista_modulo -> fetch(PDO::FETCH_ASSOC)) {

                $cod_curso_base = $linhas_lista_modulo["cod_curso"];
                $cod_modulo = $linhas_lista_modulo["cod_modulo"];
                $modulo = $linhas_lista_modulo["modulo"];

                if($cod_curso_base == $cod_curso) {

                    $lista_modulos .= "<option value=\"" . $cod_modulo . "\">" . utf8_encode($modulo) . "</option>";

                }

            }

            return $lista_modulos;

            $conexao_sql_station21 = NULL;

        } 

        //Método gerarListaModulosComSelecaoPorCodigoCurso
        //Método para geração de lista de módulos cadastrados no sistema de acordo com código de curso
        //@param $cod_curso - código do curso ao qual os módulos estão relacionados
        //@param $cod_modulo - código do módulo para o qual a seleção na lista será realizada
        public function gerarListaModulosComSelecaoPorCodigoCurso($cod_curso, $cod_modulo_selecao) {

            $cod_curso_base = "";
            $cod_modulo = "";
            $modulo = "";
            $lista_modulos = "";

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_lista_modulo = new SqlSelect();
            $sql_lista_modulo -> adicionarColuna("*");
            $sql_lista_modulo -> setEntidade("Modulo");

            $criterio_lista_modulo_1 = new Criterio();
            $criterio_lista_modulo_1 -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $criterio_lista_modulo = new Criterio();
            $criterio_lista_modulo -> setPropriedade("ORDER", "cod_modulo ASC");
            $criterio_lista_modulo -> adicionar($criterio_lista_modulo_1, Expressao::OPERADOR_AND);

            $sql_lista_modulo -> setCriterio($criterio_lista_modulo);

            $localizar_lista_modulo = $conexao_sql_station21 -> query($sql_lista_modulo -> getInstrucao());

            while($linhas_lista_modulo = $localizar_lista_modulo -> fetch(PDO::FETCH_ASSOC)) {

                $cod_curso_base = $linhas_lista_modulo["cod_curso"];
                $cod_modulo = $linhas_lista_modulo["cod_modulo"];
                $modulo = $linhas_lista_modulo["modulo"];

                if($cod_curso_base == $cod_curso) {

                    if($cod_modulo_selecao == $cod_modulo) {

                        $lista_modulos .= "<option value=\"" . $cod_modulo . "\" selected>" . utf8_encode($modulo) . "</option>";

                    }

                    else {

                        $lista_modulos .= "<option value=\"" . $cod_modulo . "\">" . utf8_encode($modulo) . "</option>";

                    }

                }

            }

            return $lista_modulos;

            $conexao_sql_station21 = NULL;

        } 

        //Método excluirModulo() 
        //Método para exclusão de módulos da base de dados
        //@param $cod_curso - código do curso do qual os módulos serão excluídos da base de dados
        public function excluirModulo($cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_excluir_modulo = new SqlDelete();

            $sql_excluir_modulo -> setEntidade("Modulo");

            $criterio_excluir_modulo = new Criterio();
            $criterio_excluir_modulo -> adicionar(new Filtro("cod_curso", "=", "'$cod_curso'"));

            $sql_excluir_modulo -> setCriterio($criterio_excluir_modulo);

            $excluir_modulo = $conexao_sql_station21 -> query($sql_excluir_modulo -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método getTituloModuloPorCodigo
        //Retorna o título do módulo através do código do mesmo
        //@param $cod_modulo - código do módulo do qual o título será recuperado
        public function getTituloModuloPorCodigo($cod_modulo) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $titulo_modulo = "";

            $sql_titulo_modulo = new SqlSelect();
            $sql_titulo_modulo -> adicionarColuna("cod_modulo, modulo");
            $sql_titulo_modulo -> setEntidade("Modulo");

            $criterio_titulo_modulo = new Criterio();
            $criterio_titulo_modulo -> adicionar(new Filtro("cod_modulo", "=", "'{$cod_modulo}'"));

            $sql_titulo_modulo -> setCriterio($criterio_titulo_modulo);

            $localizar_titulo_modulo = $conexao_sql_station21 -> query($sql_titulo_modulo -> getInstrucao());

            while($linhas_titulo_modulo = $localizar_titulo_modulo -> fetch(PDO::FETCH_ASSOC)) {

                $titulo_modulo = utf8_encode($linhas_titulo_modulo["modulo"]);

            }

            return $titulo_modulo;

            $conexao_sql_station21 = NULL;

        }

        //Método getCodigoModuloPorCodigoCurso
        //Retorna o código do módulo através do código do curso ao qual o mesmo é associado
        //@param $cod_curso - código do curso ao qual o módulo está associado
        //@param $ordem_modulo - número ordinal para obtenção do código do módulo
        public function getCodigoModuloPorCodigoCurso($cod_curso, $ordem_modulo) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $cod_modulo = "";
            $contador = 0;

            $sql_cod_modulo = new SqlSelect();
            $sql_cod_modulo -> adicionarColuna("cod_modulo, cod_curso");
            $sql_cod_modulo -> setEntidade("Modulo");

            $criterio_cod_modulo = new Criterio();
            $criterio_cod_modulo -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $sql_cod_modulo -> setCriterio($criterio_cod_modulo);

            $localizar_cod_modulo = $conexao_sql_station21 -> query($sql_cod_modulo -> getInstrucao());

            while($linhas_cod_modulo = $localizar_cod_modulo -> fetch(PDO::FETCH_ASSOC)) {

                $contador++;

                if($contador == $ordem_modulo) {

                    $cod_modulo = $linhas_cod_modulo["cod_modulo"];

                }

            }

            return $cod_modulo;

            $conexao_sql_station21 = NULL;

        }

        //Método getCodigoCursoPorCodigoModulo
        //Retorna o código do curso através do código do módulo que é associado ao mesmo
        //@param $cod_modulo - código do módulo associado ao curso
        public function getCodigoCursoPorCodigoModulo($cod_modulo) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $cod_curso = "";

            $sql_cod_curso = new SqlSelect();
            $sql_cod_curso -> adicionarColuna("cod_modulo, cod_curso");
            $sql_cod_curso -> setEntidade("Modulo");

            $criterio_cod_curso = new Criterio();
            $criterio_cod_curso -> adicionar(new Filtro("cod_modulo", "=", "'{$cod_modulo}'"));

            $sql_cod_curso -> setCriterio($criterio_cod_curso);

            $localizar_cod_curso = $conexao_sql_station21 -> query($sql_cod_curso -> getInstrucao());

            while($linhas_cod_curso = $localizar_cod_curso -> fetch(PDO::FETCH_ASSOC)) {

                $cod_curso = $linhas_cod_curso["cod_curso"];

            }

            return $cod_curso;

            $conexao_sql_station21 = NULL;

        }

        //Método verificarModulosPorCodigoCurso
        //Verifica a existência de módulos para um curso através do código do mesmo
        //@param $cod_curso - código do curso para o qual a verificação será realizada
        public function verificarModulosPorCodigoCurso($cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $quantidade = 0;

            $sql_verificar_modulos = new SqlSelect();
            $sql_verificar_modulos -> adicionarColuna("cod_curso");
            $sql_verificar_modulos -> setEntidade("Modulo");

            $criterio_verificar_modulos = new Criterio();
            $criterio_verificar_modulos -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $sql_verificar_modulos -> setCriterio($criterio_verificar_modulos);

            $localizar_modulos = $conexao_sql_station21 -> query($sql_verificar_modulos -> getInstrucao());

            while($linhas_verificar_modulos = $localizar_modulos -> fetch(PDO::FETCH_ASSOC)) {

                $quantidade++;

            }

            return $quantidade;

            $conexao_sql_station21 = NULL;

        }

    }   

?>