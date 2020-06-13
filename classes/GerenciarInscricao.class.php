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

        //Método verificarCursosAtivos
        //Verifica a quantidade de cursos nos quais um usuário se encontra inscrito
        //@param $cod_usuario - código do usuário para o qual a verificação será realizada
        public function verificarCursosAtivos($cod_usuario) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $contador = 0;

            $sql_verificar_cursos_ativos = new SqlSelect();
            $sql_verificar_cursos_ativos -> adicionarColuna("cod_usuario");
            $sql_verificar_cursos_ativos -> setEntidade("Inscricao");

            $criterio_verificar_cursos_ativos = new Criterio();
            $criterio_verificar_cursos_ativos -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));

            $sql_verificar_cursos_ativos -> setCriterio($criterio_verificar_cursos_ativos);

            $localizar_verificar_cursos_ativos = $conexao_sql_station21 -> query($sql_verificar_cursos_ativos -> getInstrucao());

            while($linhas_verificar_cursos_ativos = $localizar_verificar_cursos_ativos -> fetch(PDO::FETCH_ASSOC)) {

                $contador++;

            }

            return $contador;

            $conexao_sql_station21 = NULL;

        }

        //Método excluirInscricao() 
        //Método para excluir inscrição de usuário em um curso
        //@param $cod_usuario - código do usuário para o qual a inscrição será removida
        //@param $cod_curso - código do curso para o qual a inscrição será removida
        public function excluirInscricao($cod_usuario, $cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_excluir_inscricao = new SqlDelete();

            $sql_excluir_inscricao -> setEntidade("Inscricao");

            $criterio_excluir_inscricao_1 = new Criterio();
            $criterio_excluir_inscricao_1 -> adicionar(new Filtro("cod_usuario", "=", "'$cod_usuario'"));

            $criterio_excluir_inscricao_2 = new Criterio();
            $criterio_excluir_inscricao_2 -> adicionar(new Filtro("cod_curso", "=", "'$cod_curso'"));

            $criterio_excluir_inscricao = new Criterio();
            $criterio_excluir_inscricao -> adicionar($criterio_excluir_inscricao_1, Expressao::OPERADOR_AND);
            $criterio_excluir_inscricao -> adicionar($criterio_excluir_inscricao_2, Expressao::OPERADOR_AND);

            $sql_excluir_inscricao -> setCriterio($criterio_excluir_inscricao);

            $excluir_inscricao = $conexao_sql_station21 -> query($sql_excluir_inscricao -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método excluirInscricaoCodigoCurso() 
        //Método para exclusão de inscrições de usuários na base de dados para um determinado curso
        //@param $cod_curso - código do curso do qual as inscrições serão excluídas
        public function excluirInscricaoCodigoCurso($cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_excluir_inscricoes_curso = new SqlDelete();

            $sql_excluir_inscricoes_curso -> setEntidade("Inscricao");

            $criterio_excluir_inscricoes_curso = new Criterio();
            $criterio_excluir_inscricoes_curso -> adicionar(new Filtro("cod_curso", "=", "'$cod_curso'"));

            $sql_excluir_inscricoes_curso -> setCriterio($criterio_excluir_inscricoes_curso);

            $excluir_inscricoes_curso = $conexao_sql_station21 -> query($sql_excluir_inscricoes_curso -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

    }

?>