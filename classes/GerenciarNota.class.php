<?php

    //Classe GerenciarNota.class.php
    //Classe para provimento dos métodos destinados ao gerenciamento de informações relacionadas a notas

    include_once "Autoload.inc";

    class GerenciarNota {

        //Método setNota
        //Registra a nota para a atividade avaliativa realizada por um usuário
        //@param $cod_usuario - código do usuário para o qual a nota será registrada
        //@param $cod_curso - código do curso ao qual a atividade pertence
        //@param $cod_exercicio - código do exercício para o qual a nota será atribuída
        //@param $cod_prova - código da prova para a qual a nota será atribuída
        //@param $nota - valor da nota 
        public function setNota($cod_usuario, $cod_curso, $cod_exercicio, $cod_prova, $nota) {
            
            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_cadastrar_nota = new SqlInsert();
            $sql_cadastrar_nota -> setEntidade("Nota");
            $sql_cadastrar_nota -> setValorLinha("cod_usuario", "$cod_usuario");
            $sql_cadastrar_nota -> setValorLinha("cod_curso", $cod_curso);
            $sql_cadastrar_nota -> setValorLinha("cod_exercicio", $cod_exercicio);
            $sql_cadastrar_nota -> setValorLinha("cod_prova", $cod_prova);
            $sql_cadastrar_nota -> setValorLinha("nota", $nota);

            $cadastrar_nota = $conexao_sql_station21 -> query($sql_cadastrar_nota -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método verificarNotaExercicio
        //Verifica a existência de nota para uma atividade avaliativa associada a um usuário
        //@param $cod_usuario - código do usuário para o qual a verificação será realizada
        //@param $cod_curso - código do curso para o qual a verificação será realizada
        //@param $cod_exercicio - código do exercício para o qual a verificação será realizada
        public function verificarNotaExercicio($cod_usuario, $cod_curso, $cod_exercicio) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $quantidade = 0;

            $sql_verificar_nota = new SqlSelect();
            $sql_verificar_nota -> adicionarColuna("cod_usuario, cod_curso, cod_exercicio");
            $sql_verificar_nota -> setEntidade("Nota");

            $criterio_verificar_nota_1 = new Criterio();
            $criterio_verificar_nota_1 -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));

            $criterio_verificar_nota_2 = new Criterio();
            $criterio_verificar_nota_2 -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $criterio_verificar_nota_3 = new Criterio();
            $criterio_verificar_nota_3 -> adicionar(new Filtro("cod_exercicio", "=", "'{$cod_exercicio}'"));

            $criterio_verificar_nota = new Criterio();
            $criterio_verificar_nota -> adicionar($criterio_verificar_nota_1, Expressao::OPERADOR_AND);
            $criterio_verificar_nota -> adicionar($criterio_verificar_nota_2, Expressao::OPERADOR_AND); 
            $criterio_verificar_nota -> adicionar($criterio_verificar_nota_3, Expressao::OPERADOR_AND);

            $sql_verificar_nota -> setCriterio($criterio_verificar_nota);

            $localizar_nota = $conexao_sql_station21 -> query($sql_verificar_nota -> getInstrucao());

            while($linhas_verificar_nota = $localizar_nota -> fetch(PDO::FETCH_ASSOC)) {

                $quantidade++;

            }

            return $quantidade;

            $conexao_sql_station21 = NULL;

        }

    }

?>