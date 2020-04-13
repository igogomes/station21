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

    }

?>