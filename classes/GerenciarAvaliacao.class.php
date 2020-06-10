<?php

    //Classe GerenciarAvaliacao.class.php
    //Classe para provimento dos métodos destinados ao gerenciamento de informações relacionadas a avaliação

    include_once "Autoload.inc";

    class GerenciarAvaliacao { 

        //Método setAvaliacao
        //Método para o cadastro de avaliação de um usuário para um curso na base de dados
        //@param $cod_curso - código do curso a ser avaliado
        //@param $cod_usuario - código do usuário responsável pela avaliação
        //@param $avaliacao - avaliacao do usuário atribuída ao curso
        public function setAvaliacao($cod_curso, $cod_usuario, $avaliacao) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_cadastrar_avaliacao_curso = new SqlInsert();
            $sql_cadastrar_avaliacao_curso -> setEntidade("Avaliacao");
            $sql_cadastrar_avaliacao_curso -> setValorLinha("cod_curso", $cod_curso);
            $sql_cadastrar_avaliacao_curso -> setValorLinha("cod_usuario", $cod_usuario);
            $sql_cadastrar_avaliacao_curso -> setValorLinha("avaliacao", $avaliacao);

            $cadastrar_avaliacao_curso = $conexao_sql_station21 -> query($sql_cadastrar_avaliacao_curso -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método getNotaUmCurso
        //Retorna a quantidade de notas "um" para um determinado curso através do código do mesmo
        //@param $cod_curso - código do curso do qual a quantidade de notas será recuperada
        public function getNotaUmCurso($cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $nota_um = 0;

            $sql_recuperar_nota_um = new SqlSelect();
            $sql_recuperar_nota_um -> adicionarColuna("cod_curso, avaliacao");
            $sql_recuperar_nota_um -> setEntidade("Avaliacao");

            $criterio_recuperar_nota_um = new Criterio();
            $criterio_recuperar_nota_um -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $sql_recuperar_nota_um -> setCriterio($criterio_recuperar_nota_um);

            $localizar_nota_um = $conexao_sql_station21 -> query($sql_recuperar_nota_um -> getInstrucao());

            while($linhas_nota_um = $localizar_nota_um -> fetch(PDO::FETCH_ASSOC)) {

                $cod_curso_avaliacao = $linhas_nota_um["cod_curso"];

                if($cod_curso_avaliacao == $cod_curso) {

                    $avaliacao_curso = $linhas_nota_um["avaliacao"];

                    if($avaliacao_curso == 1) {

                        $nota_um++;

                    }

                }

            }

            return $nota_um;

            $conexao_sql_station21 = NULL;

        }

        //Método getNotaDoisCurso
        //Retorna a quantidade de notas "dois" para um determinado curso através do código do mesmo
        //@param $cod_curso - código do curso do qual a quantidade de notas será recuperada
        public function getNotaDoisCurso($cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $nota_dois = 0;

            $sql_recuperar_nota_dois = new SqlSelect();
            $sql_recuperar_nota_dois -> adicionarColuna("cod_curso, avaliacao");
            $sql_recuperar_nota_dois -> setEntidade("Avaliacao");

            $criterio_recuperar_nota_dois = new Criterio();
            $criterio_recuperar_nota_dois -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $sql_recuperar_nota_dois -> setCriterio($criterio_recuperar_nota_dois);

            $localizar_nota_dois = $conexao_sql_station21 -> query($sql_recuperar_nota_dois -> getInstrucao());

            while($linhas_nota_dois = $localizar_nota_dois -> fetch(PDO::FETCH_ASSOC)) {

                $cod_curso_avaliacao = $linhas_nota_dois["cod_curso"];

                if($cod_curso_avaliacao == $cod_curso) {

                    $avaliacao_curso = $linhas_nota_dois["avaliacao"];

                    if($avaliacao_curso == 2) {

                        $nota_dois++;

                    }

                }

            }

            return $nota_dois;

            $conexao_sql_station21 = NULL;

        }

        //Método getNotaTresCurso
        //Retorna a quantidade de notas "três" para um determinado curso através do código do mesmo
        //@param $cod_curso - código do curso do qual a quantidade de notas será recuperada
        public function getNotaTresCurso($cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $nota_tres = 0;

            $sql_recuperar_nota_tres = new SqlSelect();
            $sql_recuperar_nota_tres -> adicionarColuna("cod_curso, avaliacao");
            $sql_recuperar_nota_tres -> setEntidade("Avaliacao");

            $criterio_recuperar_nota_tres = new Criterio();
            $criterio_recuperar_nota_tres -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $sql_recuperar_nota_tres -> setCriterio($criterio_recuperar_nota_tres);

            $localizar_nota_tres = $conexao_sql_station21 -> query($sql_recuperar_nota_tres -> getInstrucao());

            while($linhas_nota_tres = $localizar_nota_tres -> fetch(PDO::FETCH_ASSOC)) {

                $cod_curso_avaliacao = $linhas_nota_tres["cod_curso"];

                if($cod_curso_avaliacao == $cod_curso) {

                    $avaliacao_curso = $linhas_nota_tres["avaliacao"];

                    if($avaliacao_curso == 3) {

                        $nota_tres++;

                    }

                }

            }

            return $nota_tres;

            $conexao_sql_station21 = NULL;

        }

        //Método getNotaQuatroCurso
        //Retorna a quantidade de notas "quatro" para um determinado curso através do código do mesmo
        //@param $cod_curso - código do curso do qual a quantidade de notas será recuperada
        public function getNotaQuatroCurso($cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $nota_quatro = 0;

            $sql_recuperar_nota_quatro = new SqlSelect();
            $sql_recuperar_nota_quatro -> adicionarColuna("cod_curso, avaliacao");
            $sql_recuperar_nota_quatro -> setEntidade("Avaliacao");

            $criterio_recuperar_nota_quatro = new Criterio();
            $criterio_recuperar_nota_quatro -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $sql_recuperar_nota_quatro -> setCriterio($criterio_recuperar_nota_quatro);

            $localizar_nota_quatro = $conexao_sql_station21 -> query($sql_recuperar_nota_quatro -> getInstrucao());

            while($linhas_nota_quatro = $localizar_nota_quatro -> fetch(PDO::FETCH_ASSOC)) {

                $cod_curso_avaliacao = $linhas_nota_quatro["cod_curso"];

                if($cod_curso_avaliacao == $cod_curso) {

                    $avaliacao_curso = $linhas_nota_quatro["avaliacao"];

                    if($avaliacao_curso == 4) {

                        $nota_quatro++;

                    }

                }

            }

            return $nota_quatro;

            $conexao_sql_station21 = NULL;

        }

        //Método getNotaCincoCurso
        //Retorna a quantidade de notas "cinco" para um determinado curso através do código do mesmo
        //@param $cod_curso - código do curso do qual a quantidade de notas será recuperada
        public function getNotaCincoCurso($cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $nota_cinco = 0;

            $sql_recuperar_nota_cinco = new SqlSelect();
            $sql_recuperar_nota_cinco -> adicionarColuna("cod_curso, avaliacao");
            $sql_recuperar_nota_cinco -> setEntidade("Avaliacao");

            $criterio_recuperar_nota_cinco = new Criterio();
            $criterio_recuperar_nota_cinco -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $sql_recuperar_nota_cinco -> setCriterio($criterio_recuperar_nota_cinco);

            $localizar_nota_cinco = $conexao_sql_station21 -> query($sql_recuperar_nota_cinco -> getInstrucao());

            while($linhas_nota_cinco = $localizar_nota_cinco -> fetch(PDO::FETCH_ASSOC)) {

                $cod_curso_avaliacao = $linhas_nota_cinco["cod_curso"];

                if($cod_curso_avaliacao == $cod_curso) {

                    $avaliacao_curso = $linhas_nota_cinco["avaliacao"];

                    if($avaliacao_curso == 5) {

                        $nota_cinco++;

                    }

                }

            }

            return $nota_cinco;

            $conexao_sql_station21 = NULL;

        }

        //Método getAvaliacaoPorCodigoCurso
        //Retorna a avaliação do curso com base no código do mesmo
        //@param $cod_curso - código do curso para o qual a avaliação será recuperada
        public function getAvaliacaoPorCodigoCurso($cod_curso) {

            $avaliacao = 0;

            $nota_um = $this::getNotaUmCurso($cod_curso);
            $nota_dois = $this::getNotaDoisCurso($cod_curso);
            $nota_tres = $this::getNotaTresCurso($cod_curso);
            $nota_quatro = $this::getNotaQuatroCurso($cod_curso);
            $nota_cinco = $this::getNotaCincoCurso($cod_curso);

            if($nota_um == 0 && $nota_dois == 0 && $nota_tres == 0 && $nota_quatro == 0 && $nota_cinco == 0) {

                $avaliacao = 0;

            }

            else {

                $avaliacao = ($nota_um * 1 + $nota_dois * 2 + $nota_tres * 3 + $nota_quatro * 4 + $nota_cinco * 5) / ($nota_um + $nota_dois + $nota_tres + $nota_quatro + $nota_cinco);

            }

            return $avaliacao;

            $conexao_sql_station21 = NULL;

        }

        //Método verificarAvaliacaoExistente
        //Verifica se já existe avaliação para um determinado curso por um usuário específico através
        //dos códigos de ambos
        //@param $cod_curso - código do curso do qual a avaliação será recuperada
        //@param $cod_usuario - código do usuário do qual a avaliação será recuperada
        public function verificarAvaliacaoExistente($cod_curso, $cod_usuario) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $avaliacao = 0;

            $sql_verificar_avaliacao = new SqlSelect();
            $sql_verificar_avaliacao -> adicionarColuna("cod_curso, cod_usuario");
            $sql_verificar_avaliacao -> setEntidade("Avaliacao");

            $criterio_verificar_avaliacao_1 = new Criterio();
            $criterio_verificar_avaliacao_1 -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $criterio_verificar_avaliacao_2 = new Criterio();
            $criterio_verificar_avaliacao_2 -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));

            $criterio_verificar_avaliacao = new Criterio();
            $criterio_verificar_avaliacao -> adicionar($criterio_verificar_avaliacao_1, Expressao::OPERADOR_AND);
            $criterio_verificar_avaliacao -> adicionar($criterio_verificar_avaliacao_2, Expressao::OPERADOR_AND);

            $sql_verificar_avaliacao -> setCriterio($criterio_verificar_avaliacao);

            $localizar_verificar_nota = $conexao_sql_station21 -> query($sql_verificar_avaliacao -> getInstrucao());

            while($linhas_verificar_nota = $localizar_verificar_nota -> fetch(PDO::FETCH_ASSOC)) {

                $avaliacao++;

            }

            return $avaliacao;

            $conexao_sql_station21 = NULL;

        }

        //Método atualizarAvaliacao()
        //Método para atualização de uma avaliação a um curso de um determinado usuário
        //@param $cod_curso - código do curso para o qual a avaliação será atualizada
        //@param $cod_usuario - código do usuário responsável pela avaliação
        //@param $avaliacao - avaliação do curso a ser atualizado
        public function atualizarAvaliacao($cod_curso, $cod_usuario, $avaliacao) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_atualizar_avaliacao = new SqlUpdate();
            $sql_atualizar_avaliacao -> setEntidade("Avaliacao");
            $sql_atualizar_avaliacao -> setValorLinha("avaliacao", "{$avaliacao}");

            $criterio_atualizar_avaliacao_1 = new Criterio();
            $criterio_atualizar_avaliacao_1 -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $criterio_atualizar_avaliacao_2 = new Criterio();
            $criterio_atualizar_avaliacao_2 -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));

            $criterio_atualizar_avaliacao = new Criterio();
            $criterio_atualizar_avaliacao -> adicionar($criterio_atualizar_avaliacao_1, Expressao::OPERADOR_AND);
            $criterio_atualizar_avaliacao -> adicionar($criterio_atualizar_avaliacao_2, Expressao::OPERADOR_AND);

            $sql_atualizar_avaliacao -> setCriterio($criterio_atualizar_avaliacao);

            $atualizar_avaliacao = $conexao_sql_station21 -> query($sql_atualizar_avaliacao -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método excluirAvaliacao() 
        //Método para excluir avaliação feita por um usuário a um curso na base de dados
        //@param $cod_usuario - código do usuário responsável pela avaliação
        //@param $cod_curso - código do curso para o qual a avaliação foi realizada
        public function excluirAvaliacao($cod_usuario, $cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_excluir_avaliacao = new SqlDelete();

            $sql_excluir_avaliacao -> setEntidade("Avaliacao");

            $criterio_excluir_avaliacao_1 = new Criterio();
            $criterio_excluir_avaliacao_1 -> adicionar(new Filtro("cod_usuario", "=", "'$cod_usuario'"));

            $criterio_excluir_avaliacao_2 = new Criterio();
            $criterio_excluir_avaliacao_2 -> adicionar(new Filtro("cod_curso", "=", "'$cod_curso'"));

            $criterio_excluir_avaliacao = new Criterio();
            $criterio_excluir_avaliacao -> adicionar($criterio_excluir_avaliacao_1, Expressao::OPERADOR_AND);
            $criterio_excluir_avaliacao -> adicionar($criterio_excluir_avaliacao_2, Expressao::OPERADOR_AND);

            $sql_excluir_avaliacao -> setCriterio($criterio_excluir_avaliacao);

            $excluir_avaliacao = $conexao_sql_station21 -> query($sql_excluir_avaliacao -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

    }

?>