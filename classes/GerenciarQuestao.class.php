<?php

    //Classe GerenciarQuestao.class.php
    //Classe para provimento dos métodos destinados ao gerenciamento de questões relacionadas 
    //a exercícios e provas associados a cursos

    include_once "Autoload.inc";

    class GerenciarQuestao { 

        //Método setQuestao
        //Método para o cadastro de questões na base de dados
        //@param $modulo - módulo do curso para o qual o exercício será cadastrado
        public function setQuestao($cod_exercicio, $cod_prova, $enunciado, $primeira_alternativa, $segunda_alternativa, $terceira_alternativa, $quarta_alternativa, $resposta) {

            $enunciado = utf8_decode($enunciado);
            $primeira_alternativa = utf8_decode($primeira_alternativa);
            $segunda_alternativa = utf8_decode($segunda_alternativa);
            $terceira_alternativa = utf8_decode($terceira_alternativa);
            $quarta_alternativa = utf8_decode($quarta_alternativa);

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_cadastrar_questao = new SqlInsert();
            $sql_cadastrar_questao -> setEntidade("Questao");
            $sql_cadastrar_questao -> setValorLinha("cod_exercicio", "$cod_exercicio");
            $sql_cadastrar_questao -> setValorLinha("cod_prova", "$cod_prova");
            $sql_cadastrar_questao -> setValorLinha("enunciado", "$enunciado");
            $sql_cadastrar_questao -> setValorLinha("primeira_alternativa", "$primeira_alternativa");
            $sql_cadastrar_questao -> setValorLinha("segunda_alternativa", "$segunda_alternativa");
            $sql_cadastrar_questao -> setValorLinha("terceira_alternativa", "$terceira_alternativa");
            $sql_cadastrar_questao -> setValorLinha("quarta_alternativa", "$quarta_alternativa");

            $cadastrar_questao = $conexao_sql_station21 -> query($sql_cadastrar_questao -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

    }

?>