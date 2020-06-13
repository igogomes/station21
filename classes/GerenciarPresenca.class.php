<?php

    //Classe GerenciarPresenca.class.php
    //Classe para provimento dos métodos destinados ao gerenciamento de informações relacionadas a presenças

    include_once "Autoload.inc";

    class GerenciarPresenca {

        //Método setPresenca
        //Registra a presença de um usuário ao acessar um vídeo de um curso
        //@param $cod_usuario - código do usuário para o qual a presença será registrada
        //@param $cod_curso - código do curso para o qual a presença será registrada
        //@param $cod_modulo - código do módulo para o qual a presença será registrada
        //@param $cod_conteudo - código do conteúdo para o qual a presença será registrada
        public function setPresenca($cod_usuario, $cod_curso, $cod_modulo, $cod_conteudo) {
            
            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_cadastrar_presenca = new SqlInsert();
            $sql_cadastrar_presenca -> setEntidade("Presenca");
            $sql_cadastrar_presenca -> setValorLinha("cod_usuario", "$cod_usuario");
            $sql_cadastrar_presenca -> setValorLinha("cod_curso", $cod_curso);
            $sql_cadastrar_presenca -> setValorLinha("cod_modulo", $cod_modulo);
            $sql_cadastrar_presenca -> setValorLinha("cod_conteudo", $cod_conteudo);

            $verificar_presenca = $this::verificarPresenca($cod_usuario, $cod_curso, $cod_modulo, $cod_conteudo);

            if($verificar_presenca == 0) {

                $cadastrar_presenca = $conexao_sql_station21 -> query($sql_cadastrar_presenca -> getInstrucao());

            } 

            $conexao_sql_station21 = NULL;

        }

        //Método verificarPresenca
        //Método para verificar presença em de um usuário para um determinado conteúdo
        //@param $cod_usuario - código do usuário para o qual a presença será registrada
        //@param $cod_curso - código do curso para o qual a presença será registrada
        //@param $cod_modulo - código do módulo para o qual a presença será registrada
        //@param $cod_conteudo - código do conteúdo para o qual a presença será registrada
        public function verificarPresenca($cod_usuario, $cod_curso, $cod_modulo, $cod_conteudo) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $presenca = 0;

            $sql_verificar_presenca = new SqlSelect();
            $sql_verificar_presenca -> adicionarColuna("cod_usuario, cod_curso, cod_modulo, cod_conteudo");
            $sql_verificar_presenca -> setEntidade("Presenca");

            $criterio_verificar_presenca_1 = new Criterio();
            $criterio_verificar_presenca_1 -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));

            $criterio_verificar_presenca_2 = new Criterio();
            $criterio_verificar_presenca_2 -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $criterio_verificar_presenca_3 = new Criterio();
            $criterio_verificar_presenca_3 -> adicionar(new Filtro("cod_modulo", "=", "'{$cod_modulo}'"));

            $criterio_verificar_presenca_4 = new Criterio();
            $criterio_verificar_presenca_4 -> adicionar(new Filtro("cod_conteudo", "=", "'{$cod_conteudo}'"));

            $criterio_verificar_presenca = new Criterio();
            $criterio_verificar_presenca -> adicionar($criterio_verificar_presenca_1, Expressao::OPERADOR_AND);
            $criterio_verificar_presenca -> adicionar($criterio_verificar_presenca_2, Expressao::OPERADOR_AND);
            $criterio_verificar_presenca -> adicionar($criterio_verificar_presenca_3, Expressao::OPERADOR_AND);
            $criterio_verificar_presenca -> adicionar($criterio_verificar_presenca_4, Expressao::OPERADOR_AND);

            $sql_verificar_presenca -> setCriterio($criterio_verificar_presenca);

            $localizar_verificar_presenca = $conexao_sql_station21 -> query($sql_verificar_presenca -> getInstrucao());

            while($linhas_verificar_presenca = $localizar_verificar_presenca -> fetch(PDO::FETCH_ASSOC)) {

                $presenca++;

            }

            return $presenca;

            $conexao_sql_station21 = NULL;

        }

        //Método getPresencaPorCodigoUsuarioECodigoCurso
        //Retorna a presença de um usuário em um curso através do código de ambos
        //@param $cod_usuario - código do usuário do qual a presença será recuperada
        //@param $cod_curso - código do curso do qual a presença será recuperada
        public function getPresencaPorCodigoUsuarioECodigoCurso($cod_usuario, $cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $presenca = 0;
            $porcentagem = 0;

            $sql_presenca = new SqlSelect();
            $sql_presenca -> adicionarColuna("cod_usuario, cod_curso");
            $sql_presenca -> setEntidade("Presenca");

            $criterio_presenca_1 = new Criterio();
            $criterio_presenca_1 -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));

            $criterio_presenca_2 = new Criterio();
            $criterio_presenca_2 -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $criterio_presenca = new Criterio();
            $criterio_presenca -> adicionar($criterio_presenca_1, Expressao::OPERADOR_AND);
            $criterio_presenca -> adicionar($criterio_presenca_2, Expressao::OPERADOR_AND);

            $sql_presenca -> setCriterio($criterio_presenca);

            $localizar_presenca = $conexao_sql_station21 -> query($sql_presenca -> getInstrucao());

            while($linhas_presenca = $localizar_presenca -> fetch(PDO::FETCH_ASSOC)) {

                $presenca++;

            }

            $quantidade_videos_curso = new GerenciarConteudo();
            $quantidade_videos_curso = $quantidade_videos_curso -> obterQuantidadeVideosCurso($cod_curso);

            if($quantidade_videos_curso == 0) {

                $porcentagem = 0 . "%";

            }

            else {

                $porcentagem = ($presenca * 100) / $quantidade_videos_curso;

                $porcentagem = ceil($porcentagem) . "%";

            }

            return $porcentagem;

            $conexao_sql_station21 = NULL;

        }

        //Método excluirPresenca() 
        //Método para excluir presença de usuário no sistema relacionada a conteúdos de cursos
        //@param $cod_usuario - código do usuário para o qual a presença será excluída
        //@param $cod_curso - código do curso para o qual a presença será excluída
        public function excluirPresenca($cod_usuario, $cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_excluir_presenca = new SqlDelete();

            $sql_excluir_presenca -> setEntidade("Presenca");

            $criterio_excluir_presenca_1 = new Criterio();
            $criterio_excluir_presenca_1 -> adicionar(new Filtro("cod_usuario", "=", "'$cod_usuario'"));

            $criterio_excluir_presenca_2 = new Criterio();
            $criterio_excluir_presenca_2 -> adicionar(new Filtro("cod_curso", "=", "'$cod_curso'"));

            $criterio_excluir_presenca = new Criterio();
            $criterio_excluir_presenca -> adicionar($criterio_excluir_presenca_1, Expressao::OPERADOR_AND);
            $criterio_excluir_presenca -> adicionar($criterio_excluir_presenca_2, Expressao::OPERADOR_AND);

            $sql_excluir_presenca -> setCriterio($criterio_excluir_presenca);

            $excluir_presenca = $conexao_sql_station21 -> query($sql_excluir_presenca -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método excluirPresencaCodigoCurso() 
        //Método para exclusão de presenças de usuários na base de dados para um determinado curso
        //@param $cod_curso - código do curso do qual as presenças serão excluídas
        public function excluirPresencaCodigoCurso($cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_excluir_presencas_curso = new SqlDelete();

            $sql_excluir_presencas_curso -> setEntidade("Presenca");

            $criterio_excluir_presencas_curso = new Criterio();
            $criterio_excluir_presencas_curso -> adicionar(new Filtro("cod_curso", "=", "'$cod_curso'"));

            $sql_excluir_presencas_curso -> setCriterio($criterio_excluir_presencas_curso);

            $excluir_presencas_curso = $conexao_sql_station21 -> query($sql_excluir_presencas_curso -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

    }

?>