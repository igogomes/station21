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
            $sql_cadastrar_questao -> setValorLinha("resposta", "$resposta");

            $cadastrar_questao = $conexao_sql_station21 -> query($sql_cadastrar_questao -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método getCodigoQuestaoPorCodigoExercicioEPosicao
        //Retorna o código da questão que compõe um exercício através de sua posição ordinal
        //@param $cod_exercicio - código do exercício para o qual o código da questão será recuperado
        //@param $posicao - número da posição da questão
        public function getCodigoQuestaoPorCodigoExercicioEPosicao($cod_exercicio, $posicao) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $contador = 0;
            $cod_questao = "";

            $sql_cod_questao = new SqlSelect();
            $sql_cod_questao -> adicionarColuna("cod_exercicio, cod_questao");
            $sql_cod_questao -> setEntidade("Questao");

            $criterio_cod_questao = new Criterio();
            $criterio_cod_questao -> adicionar(new Filtro("cod_exercicio", "=", "$cod_exercicio"));

            $sql_cod_questao -> setCriterio($criterio_cod_questao);

            $localizar_cod_questao = $conexao_sql_station21 -> query($sql_cod_questao -> getInstrucao());

            while($linhas_cod_questao = $localizar_cod_questao -> fetch(PDO::FETCH_ASSOC)) {

                $contador++;

                if($contador == $posicao) {

                    $cod_questao = $linhas_cod_questao["cod_questao"];

                }

            }

            return $cod_questao;

            $conexao_sql_station21 = NULL;

        }

        //Método getEnunciadoPorCodigoQuestao
        //Retorna o enunciado de uma questão de acordo com o código da mesma
        //@param $cod_questao - código do questão para qual o enunciado será recuperado
        public function getEnunciadoPorCodigoQuestao($cod_questao) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $enunciado = "";

            $sql_enunciado_questao = new SqlSelect();
            $sql_enunciado_questao -> adicionarColuna("cod_questao, enunciado");
            $sql_enunciado_questao -> setEntidade("Questao");

            $criterio_enunciado_questao = new Criterio();
            $criterio_enunciado_questao -> adicionar(new Filtro("cod_questao", "=", "$cod_questao"));

            $sql_enunciado_questao -> setCriterio($criterio_enunciado_questao);

            $localizar_enunciado_questao = $conexao_sql_station21 -> query($sql_enunciado_questao -> getInstrucao());

            while($linhas_enunciado_questao = $localizar_enunciado_questao -> fetch(PDO::FETCH_ASSOC)) {

               $enunciado = $linhas_enunciado_questao["enunciado"];

            }

            return $enunciado;

            $conexao_sql_station21 = NULL;

        }

        //Método getPrimeiraAlternativaPorCodigoQuestao
        //Retorna a primeira alternativa de uma questão de acordo com o código da mesma
        //@param $cod_questao - código do questão para qual a primeira alternativa será recuperada
        public function getPrimeiraAlternativaPorCodigoQuestao($cod_questao) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $primeira_alternativa = "";

            $sql_primeira_alternativa_questao = new SqlSelect();
            $sql_primeira_alternativa_questao -> adicionarColuna("cod_questao, primeira_alternativa");
            $sql_primeira_alternativa_questao -> setEntidade("Questao");

            $criterio_primeira_alternativa_questao = new Criterio();
            $criterio_primeira_alternativa_questao -> adicionar(new Filtro("cod_questao", "=", "$cod_questao"));

            $sql_primeira_alternativa_questao -> setCriterio($criterio_primeira_alternativa_questao);

            $localizar_primeira_alternativa_questao = $conexao_sql_station21 -> query($sql_primeira_alternativa_questao -> getInstrucao());

            while($linhas_primeira_alternativa_questao = $localizar_primeira_alternativa_questao -> fetch(PDO::FETCH_ASSOC)) {

               $primeira_alternativa = $linhas_primeira_alternativa_questao["primeira_alternativa"];

            }

            return $primeira_alternativa;

            $conexao_sql_station21 = NULL;

        }

        //Método getSegundaAlternativaPorCodigoQuestao
        //Retorna a segunda alternativa de uma questão de acordo com o código da mesma
        //@param $cod_questao - código do questão para qual a primeira alternativa será recuperada
        public function getSegundaAlternativaPorCodigoQuestao($cod_questao) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $segunda_alternativa = "";

            $sql_segunda_alternativa_questao = new SqlSelect();
            $sql_segunda_alternativa_questao -> adicionarColuna("cod_questao, segunda_alternativa");
            $sql_segunda_alternativa_questao -> setEntidade("Questao");

            $criterio_segunda_alternativa_questao = new Criterio();
            $criterio_segunda_alternativa_questao -> adicionar(new Filtro("cod_questao", "=", "$cod_questao"));

            $sql_segunda_alternativa_questao -> setCriterio($criterio_segunda_alternativa_questao);

            $localizar_segunda_alternativa_questao = $conexao_sql_station21 -> query($sql_segunda_alternativa_questao -> getInstrucao());

            while($linhas_segunda_alternativa_questao = $localizar_segunda_alternativa_questao -> fetch(PDO::FETCH_ASSOC)) {

               $segunda_alternativa = $linhas_segunda_alternativa_questao["segunda_alternativa"];

            }

            return $segunda_alternativa;

            $conexao_sql_station21 = NULL;

        }

        //Método getTerceiraAlternativaPorCodigoQuestao
        //Retorna a terceira alternativa de uma questão de acordo com o código da mesma
        //@param $cod_questao - código do questão para qual a primeira alternativa será recuperada
        public function getTerceiraAlternativaPorCodigoQuestao($cod_questao) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $terceira_alternativa = "";

            $sql_terceira_alternativa_questao = new SqlSelect();
            $sql_terceira_alternativa_questao -> adicionarColuna("cod_questao, terceira_alternativa");
            $sql_terceira_alternativa_questao -> setEntidade("Questao");

            $criterio_terceira_alternativa_questao = new Criterio();
            $criterio_terceira_alternativa_questao -> adicionar(new Filtro("cod_questao", "=", "$cod_questao"));

            $sql_terceira_alternativa_questao -> setCriterio($criterio_terceira_alternativa_questao);

            $localizar_terceira_alternativa_questao = $conexao_sql_station21 -> query($sql_terceira_alternativa_questao -> getInstrucao());

            while($linhas_terceira_alternativa_questao = $localizar_terceira_alternativa_questao -> fetch(PDO::FETCH_ASSOC)) {

               $terceira_alternativa = $linhas_terceira_alternativa_questao["terceira_alternativa"];

            }

            return $terceira_alternativa;

            $conexao_sql_station21 = NULL;

        }

        //Método getQuartaAlternativaPorCodigoQuestao
        //Retorna a quarta alternativa de uma questão de acordo com o código da mesma
        //@param $cod_questao - código do questão para qual a primeira alternativa será recuperada
        public function getQuartaAlternativaPorCodigoQuestao($cod_questao) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $quarta_alternativa = "";

            $sql_quarta_alternativa_questao = new SqlSelect();
            $sql_quarta_alternativa_questao -> adicionarColuna("cod_questao, quarta_alternativa");
            $sql_quarta_alternativa_questao -> setEntidade("Questao");

            $criterio_quarta_alternativa_questao = new Criterio();
            $criterio_quarta_alternativa_questao -> adicionar(new Filtro("cod_questao", "=", "$cod_questao"));

            $sql_quarta_alternativa_questao -> setCriterio($criterio_quarta_alternativa_questao);

            $localizar_quarta_alternativa_questao = $conexao_sql_station21 -> query($sql_quarta_alternativa_questao -> getInstrucao());

            while($linhas_quarta_alternativa_questao = $localizar_quarta_alternativa_questao -> fetch(PDO::FETCH_ASSOC)) {

               $quarta_alternativa = $linhas_quarta_alternativa_questao["quarta_alternativa"];

            }

            return $quarta_alternativa;

            $conexao_sql_station21 = NULL;

        }

        //Método getRespostaPorCodigoQuestao
        //Retorna a resposta de uma questão de acordo com o código da mesma
        //@param $cod_questao - código do questão para qual a resposta será recuperada
        public function getRespostaPorCodigoQuestao($cod_questao) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $resposta = "";

            $sql_resposta_questao = new SqlSelect();
            $sql_resposta_questao -> adicionarColuna("cod_questao, resposta");
            $sql_resposta_questao -> setEntidade("Questao");

            $criterio_resposta_questao = new Criterio();
            $criterio_resposta_questao -> adicionar(new Filtro("cod_questao", "=", "$cod_questao"));

            $sql_resposta_questao -> setCriterio($criterio_resposta_questao);

            $localizar_resposta_questao = $conexao_sql_station21 -> query($sql_resposta_questao -> getInstrucao());

            while($linhas_resposta_questao = $localizar_resposta_questao -> fetch(PDO::FETCH_ASSOC)) {

               $resposta = $linhas_resposta_questao["resposta"];

            }

            return $resposta;

            $conexao_sql_station21 = NULL;

        }

        //Método atualizarDadosQuestao()
        //Método para atualização dos dados de questões na base de dados
        //@param $cod_questao - código do questão para a qual os dados serão alterados
        //@param $enunciado - enunciado da questão que será alterada
        //@param $primeira_alternativa - primeira alternativa da questão que será alterada
        //@param $segunda_alternativa - segunda alternativa da questão que será alterada
        //@param $terceira_alternativa - terceira alternativa da questão que será alterada
        //@param $quarta_alternativa - quarta alternativa da questão que será alterada
        //@param $resposta - resposta da questão que será alterada
        public function atualizarDadosQuestao($cod_questao, $enunciado, $primeira_alternativa, $segunda_alternativa, $terceira_alternativa, $quarta_alternativa, $resposta) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $enunciado = utf8_decode($enunciado);
            $primeira_alternativa = utf8_decode($primeira_alternativa);
            $segunda_alternativa = utf8_decode($segunda_alternativa);
            $terceira_alternativa = utf8_decode($terceira_alternativa);
            $quarta_alternativa = utf8_decode($quarta_alternativa);

            $sql_atualizar_dados_questao = new SqlUpdate();
            $sql_atualizar_dados_questao -> setEntidade("Questao");
            $sql_atualizar_dados_questao -> setValorLinha("enunciado", "{$enunciado}");
            $sql_atualizar_dados_questao -> setValorLinha("primeira_alternativa", "{$primeira_alternativa}");
            $sql_atualizar_dados_questao -> setValorLinha("segunda_alternativa", "{$segunda_alternativa}");
            $sql_atualizar_dados_questao -> setValorLinha("terceira_alternativa", "{$terceira_alternativa}");
            $sql_atualizar_dados_questao -> setValorLinha("quarta_alternativa", "{$quarta_alternativa}");
            $sql_atualizar_dados_questao -> setValorLinha("resposta", "{$resposta}");

            $criterio_atualizar_dados_questao = new Criterio();
            $criterio_atualizar_dados_questao -> adicionar(new Filtro("cod_questao", "=", "'{$cod_questao}'"));

            $sql_atualizar_dados_questao -> setCriterio($criterio_atualizar_dados_questao);

            $atualizar_dados_questao = $conexao_sql_station21 -> query($sql_atualizar_dados_questao -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método getCodigoQuestaoPorCodigoProvaEPosicao
        //Retorna o código da questão que compõe uma prova através de sua posição ordinal
        //@param $cod_prova - código da prova para a qual o código da questão será recuperado
        //@param $posicao - número da posição da questão
        public function getCodigoQuestaoPorCodigoProvaEPosicao($cod_prova, $posicao) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $contador = 0;
            $cod_questao = "";

            $sql_cod_questao = new SqlSelect();
            $sql_cod_questao -> adicionarColuna("cod_prova, cod_questao");
            $sql_cod_questao -> setEntidade("Questao");

            $criterio_cod_questao = new Criterio();
            $criterio_cod_questao -> adicionar(new Filtro("cod_prova", "=", "$cod_prova"));

            $sql_cod_questao -> setCriterio($criterio_cod_questao);

            $localizar_cod_questao = $conexao_sql_station21 -> query($sql_cod_questao -> getInstrucao());

            while($linhas_cod_questao = $localizar_cod_questao -> fetch(PDO::FETCH_ASSOC)) {

                $contador++;

                if($contador == $posicao) {

                    $cod_questao = $linhas_cod_questao["cod_questao"];

                }

            }

            return $cod_questao;

            $conexao_sql_station21 = NULL;

        }

    }

?>