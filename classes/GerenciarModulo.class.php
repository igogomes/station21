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

    }   

?>