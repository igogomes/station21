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

        //Método atualizarNotaExercicio
        //Método para atualização da nota do exercício realizado pelo usuário
        //@param $cod_usuario - código do usuário para o qual a nota será atualizada
        //@param $cod_curso - código do curso ao qual o exercício está associado
        //@param $cod_exercicio - código do exercício realizado pelo usuário
        //@param $nota - nota obtida pelo usuário
        public function atualizarNotaExercicio($cod_usuario, $cod_curso, $cod_exercicio, $nota) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_atualizar_nota_exercicio = new SqlUpdate();
            $sql_atualizar_nota_exercicio -> setEntidade("Nota");
            $sql_atualizar_nota_exercicio -> setValorLinha("nota", "{$nota}");

            $criterio_atualizar_nota_exercicio_1 = new Criterio();
            $criterio_atualizar_nota_exercicio_1 -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));

            $criterio_atualizar_nota_exercicio_2 = new Criterio();
            $criterio_atualizar_nota_exercicio_2 -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $criterio_atualizar_nota_exercicio_3 = new Criterio();
            $criterio_atualizar_nota_exercicio_3 -> adicionar(new Filtro("cod_exercicio", "=", "'{$cod_exercicio}'"));

            $criterio_atualizar_nota_exercicio = new Criterio();
            $criterio_atualizar_nota_exercicio -> adicionar($criterio_atualizar_nota_exercicio_1, Expressao::OPERADOR_AND);
            $criterio_atualizar_nota_exercicio -> adicionar($criterio_atualizar_nota_exercicio_2, Expressao::OPERADOR_AND); 
            $criterio_atualizar_nota_exercicio -> adicionar($criterio_atualizar_nota_exercicio_3, Expressao::OPERADOR_AND);

            $sql_atualizar_nota_exercicio -> setCriterio($criterio_atualizar_nota_exercicio);

            $atualizar_nota_exercicio = $conexao_sql_station21 -> query($sql_atualizar_nota_exercicio -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método getNotaExercicio
        //Retorna a nota de um exercício
        //@param $cod_usuario - código do usuário para o qual a nota foi atribuída
        //@param $cod_curso - código do curso ao qual o exercício está associado
        //@param $cod_exercicio - código do exercício ao qual a nota está associada
        public function getNotaExercicio($cod_usuario, $cod_curso, $cod_exercicio) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $nota = "";

            $sql_nota_exercicio = new SqlSelect();
            $sql_nota_exercicio -> adicionarColuna("cod_usuario, cod_curso, cod_exercicio, nota");
            $sql_nota_exercicio -> setEntidade("Nota");

            $criterio_nota_exercicio_1 = new Criterio();
            $criterio_nota_exercicio_1 -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));

            $criterio_nota_exercicio_2 = new Criterio();
            $criterio_nota_exercicio_2 -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $criterio_nota_exercicio_3 = new Criterio();
            $criterio_nota_exercicio_3 -> adicionar(new Filtro("cod_exercicio", "=", "'{$cod_exercicio}'"));

            $criterio_nota_exercicio = new Criterio();
            $criterio_nota_exercicio -> adicionar($criterio_nota_exercicio_1, Expressao::OPERADOR_AND);
            $criterio_nota_exercicio -> adicionar($criterio_nota_exercicio_2, Expressao::OPERADOR_AND); 
            $criterio_nota_exercicio -> adicionar($criterio_nota_exercicio_3, Expressao::OPERADOR_AND);

            $sql_nota_exercicio -> setCriterio($criterio_nota_exercicio);

            $localizar_nota_exercicio = $conexao_sql_station21 -> query($sql_nota_exercicio -> getInstrucao());

            while($linhas_nota_exercicio = $localizar_nota_exercicio -> fetch(PDO::FETCH_ASSOC)) {

                $nota = $linhas_nota_exercicio["nota"];

            }

            return $nota;

            $conexao_sql_station21 = NULL;

        }

    }

?>