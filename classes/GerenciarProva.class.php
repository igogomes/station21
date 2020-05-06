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

    }

?>