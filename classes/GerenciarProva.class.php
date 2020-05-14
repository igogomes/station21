<?php

    //Classe GerenciarProva.class.php
    //Classe para provimento dos métodos destinados ao gerenciamento de exercícios relacionadas 
    //aos cursos

    include_once "Autoload.inc";

    class GerenciarProva { 

        //Método verificarProvaExistente
        //Verifica se existe prova associada a um curso
        //@param $cod_curso - código do curso ao qual a prova pertence
        public function verificarProvaExistente($cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $prova = 0;

            $sql_verificar_prova = new SqlSelect();
            $sql_verificar_prova -> adicionarColuna("cod_curso");
            $sql_verificar_prova -> setEntidade("Prova");

            $criterio_verificar_prova = new Criterio();
            $criterio_verificar_prova -> adicionar(new Filtro("cod_curso", "=", "$cod_curso"));

            $sql_verificar_prova -> setCriterio($criterio_verificar_prova);

            $localizar_prova = $conexao_sql_station21 -> query($sql_verificar_prova -> getInstrucao());

            while($linhas_prova = $localizar_prova -> fetch(PDO::FETCH_ASSOC)) {

                $prova++;

            }

            return $prova;

            $conexao_sql_station21 = NULL;

        }

        //Método setProva
        //Método para o cadastro de provas na base de dados
        //@param $cod_curso - código do curso para o qual a prova será cadastrada
        public function setProva($cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_cadastrar_prova = new SqlInsert();
            $sql_cadastrar_prova -> setEntidade("Prova");
            $sql_cadastrar_prova -> setValorLinha("cod_curso", "$cod_curso");

            $cadastrar_prova = $conexao_sql_station21 -> query($sql_cadastrar_prova -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método getCodigoProvaPorCurso
        //Retorna o código da prova através do código do curso ao qual a mesma pertence
        //@param $cod_curso - código do curso ao qual a prova pertence
        public function getCodigoProvaPorCurso($cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $cod_prova = "";

            $sql_cod_prova = new SqlSelect();
            $sql_cod_prova -> adicionarColuna("cod_prova, cod_curso");
            $sql_cod_prova -> setEntidade("Prova");

            $criterio_cod_prova = new Criterio();
            $criterio_cod_prova -> adicionar(new Filtro("cod_curso", "=", "$cod_curso"));

            $sql_cod_prova -> setCriterio($criterio_cod_prova);

            $localizar_cod_prova = $conexao_sql_station21 -> query($sql_cod_prova -> getInstrucao());

            while($linhas_cod_prova = $localizar_cod_prova -> fetch(PDO::FETCH_ASSOC)) {

                $cod_prova = $linhas_cod_prova["cod_prova"];

            }

            return $cod_prova;

            $conexao_sql_station21 = NULL;

        }

        //Método gerarListaProvaAdminPorCodigoCurso
        //Método para a geração de lista de provas associadas a um curso através do código do mesmo
        //@param $cod_curso - Código do curso para o qual a lista será gerada
        public function gerarListaProvaAdminPorCodigoCurso($cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $lista_prova = "<table style=\"width: 100%;\">";
            $contador = 0;
            $cod_prova = "";

            $sql_lista_prova = new SqlSelect();
            $sql_lista_prova -> adicionarColuna("cod_prova, cod_curso");
            $sql_lista_prova -> setEntidade("Prova");

            $criterio_lista_prova = new Criterio();
            $criterio_lista_prova -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $sql_lista_prova -> setCriterio($criterio_lista_prova);

            $localizar_prova = $conexao_sql_station21 -> query($sql_lista_prova -> getInstrucao());

            while($linhas_lista_prova = $localizar_prova -> fetch(PDO::FETCH_ASSOC)) {

                $contador++;
                $cod_prova = $linhas_lista_prova["cod_prova"];

            }

            if($contador > 0) {

                $lista_prova .= "<tr style=\"width: 100%;\">";
                $lista_prova .= "<td style=\"width: 100%;\">
                                        <div style=\"float: left; width: 90%;\">Prova</div>
                                        <div style=\"float: right; width: 10%;\">
                                            <span style=\"text-align: right; float: right;\">
                                                <a href=\"edit-content?cod-test=$cod_prova\">
                                                    <button class=\"btn btn-default btn-xs m-r-5\" data-toggle=\"tooltip\" data-original-title=\"Editar\">
                                                        <i class=\"fa fa-pencil font-14\"></i>
                                                    </button>
                                                </a>
                                                <a href=\"contents?cod-delete-test=$cod_prova&delete-content=1\">
                                                    <button class=\"btn btn-default btn-xs\" data-toggle=\"tooltip\" data-original-title=\"Excluir\">
                                                        <i class=\"fa fa-trash font-14\"></i>
                                                    </button> 
                                                </a>
                                            </span>
                                        </div>
                                    </td>";
                $lista_prova .= "</tr>";

            }

            $lista_prova .= "</table>";

            return $lista_prova;

            $conexao_sql_station21 = NULL;

        }

        //Método getCodigoCursoPorCodigoProva
        //Retorna o código da curso através do código da prova associada ao mesmo
        //@param $cod_prova - código do curso ao qual a prova pertence
        public function getCodigoCursoPorCodigoProva($cod_prova) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $cod_curso = "";

            $sql_cod_curso = new SqlSelect();
            $sql_cod_curso -> adicionarColuna("cod_prova, cod_curso");
            $sql_cod_curso -> setEntidade("Prova");

            $criterio_cod_curso = new Criterio();
            $criterio_cod_curso -> adicionar(new Filtro("cod_prova", "=", "$cod_prova"));

            $sql_cod_curso -> setCriterio($criterio_cod_curso);

            $localizar_cod_curso = $conexao_sql_station21 -> query($sql_cod_curso -> getInstrucao());

            while($linhas_cod_curso = $localizar_cod_curso -> fetch(PDO::FETCH_ASSOC)) {

                $cod_curso = $linhas_cod_curso["cod_curso"];

            }

            return $cod_curso;

            $conexao_sql_station21 = NULL;

        }

    }

?>