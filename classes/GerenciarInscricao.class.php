<?php

    //Classe GerenciarInscricao.class.php
    //Classe para provimento dos métodos destinados ao gerenciamento de informações relacionadas a inscrições

    include_once "Autoload.inc";

    class GerenciarInscricao {

        //Método setInscricao
        //Método para o cadastro de inscrições de usuários a cursos na base de dados
        //@param $cod_usuario - código do usuário a ser cadastrado
        //@param $cod_curso - código do curso a ser cadastrado
        public function setInscricao($cod_curso, $cod_usuario) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_cadastrar_inscricao = new SqlInsert();
            $sql_cadastrar_inscricao -> setEntidade("Inscricao");
            $sql_cadastrar_inscricao -> setValorLinha("cod_curso", $cod_curso);
            $sql_cadastrar_inscricao -> setValorLinha("cod_usuario", $cod_usuario);
            
            $cadastrar_inscricao = $conexao_sql_station21 -> query($sql_cadastrar_inscricao -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método verificarInscricao
        //Verifica se um usuário já se encontra inscrito em um determinado curso
        //@param $cod_usuario - código do usuário para o qual a verificação será realizada
        //@param $cod_curso - código do curso para o qual a verificação será realizada
        public function verificarInscricao($cod_usuario, $cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $contador = 0;

            $sql_verificar_inscricao = new SqlSelect();
            $sql_verificar_inscricao -> adicionarColuna("cod_usuario, cod_curso");
            $sql_verificar_inscricao -> setEntidade("Inscricao");

            $criterio_verificar_inscricao_1 = new Criterio();
            $criterio_verificar_inscricao_1 -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));

            $criterio_verificar_inscricao_2 = new Criterio();
            $criterio_verificar_inscricao_2 -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $criterio_verificar_inscricao = new Criterio();
            $criterio_verificar_inscricao -> adicionar($criterio_verificar_inscricao_1, Expressao::OPERADOR_AND);
            $criterio_verificar_inscricao -> adicionar($criterio_verificar_inscricao_2, Expressao::OPERADOR_AND); 

            $sql_verificar_inscricao -> setCriterio($criterio_verificar_inscricao);

            $localizar_verificar_inscricao = $conexao_sql_station21 -> query($sql_verificar_inscricao -> getInstrucao());

            while($linhas_verificar_inscricao = $localizar_verificar_inscricao -> fetch(PDO::FETCH_ASSOC)) {

                $contador++;

            }

            return $contador;

            $conexao_sql_station21 = NULL;

        }

    }

?>