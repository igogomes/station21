<?php

    //Classe GerenciarExercicio.class.php
    //Classe para provimento dos métodos destinados ao gerenciamento de exercícios relacionadas 
    //aos módulos dos cursos

    include_once "Autoload.inc";

    class GerenciarExercicio { 

        //Método setExercicio
        //Método para o cadastro de exercícios na base de dados
        //@param $modulo - módulo do curso para o qual o exercício será cadastrado
        public function setExercicio($modulo) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_cadastrar_exercicio = new SqlInsert();
            $sql_cadastrar_exercicio -> setEntidade("Exercicio");
            $sql_cadastrar_exercicio -> setValorLinha("cod_modulo", "$modulo");

            $cadastrar_exercicio = $conexao_sql_station21 -> query($sql_cadastrar_exercicio -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método getCodigoExercicioPorModulo
        //Retorna o código do exercício através do módulo ao qual o mesmo pertence
        //@param $cod_modulo - código do módulo ao qual o exercício pertence
        public function getCodigoExercicioPorModulo($cod_modulo) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $cod_exercicio = "";

            $sql_cod_exercicio = new SqlSelect();
            $sql_cod_exercicio -> adicionarColuna("cod_exercicio, cod_modulo");
            $sql_cod_exercicio -> setEntidade("Exercicio");

            $criterio_cod_exercicio = new Criterio();
            $criterio_cod_exercicio -> adicionar(new Filtro("cod_modulo", "=", "$cod_modulo"));

            $sql_cod_exercicio -> setCriterio($criterio_cod_exercicio);

            $localizar_cod_exercicio = $conexao_sql_station21 -> query($sql_cod_exercicio -> getInstrucao());

            while($linhas_cod_exercicio = $localizar_cod_exercicio -> fetch(PDO::FETCH_ASSOC)) {

                $cod_exercicio = $linhas_cod_exercicio["cod_exercicio"];

            }

            return $cod_exercicio;

            $conexao_sql_station21 = NULL;

        }

    }

?>