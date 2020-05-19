<?php

    //Classe GerenciarAvaliacao.class.php
    //Classe para provimento dos métodos destinados ao gerenciamento de informações relacionadas a avaliação

    include_once "Autoload.inc";

    class GerenciarAvaliacao { 

        //Método getAvaliacaoPorCodigoCurso
        //Retorna a avaliação do curso com base no código do mesmo
        //@param $cod_curso - código da curso para o qual a avaliação será recuperada
        public function getAvaliacaoPorCodigoCurso($cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $nota_um = 0;
            $nota_dois = 0;
            $nota_tres = 0;
            $nota_quatro = 0;
            $nota_cinco = 0;
            $avaliacao = 0;

            $sql_avaliacao = new SqlSelect();
            $sql_avaliacao -> adicionarColuna("*");
            $sql_avaliacao -> setEntidade("Avaliacao");

            $criterio_avaliacao = new Criterio();
            $criterio_avaliacao -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $sql_avaliacao -> setCriterio($criterio_avaliacao);

            $localizar_avaliacao = $conexao_sql_station21 -> query($sql_avaliacao -> getInstrucao());

            while($linhas_avaliacao = $localizar_avaliacao -> fetch(PDO::FETCH_ASSOC)) {

                $nota_um = $linhas_avaliacao["nota_um"];
                $nota_dois = $linhas_avaliacao["nota_dois"];
                $nota_tres = $linhas_avaliacao["nota_tres"];
                $nota_quatro = $linhas_avaliacao["nota_quatro"];
                $nota_cinco = $linhas_avaliacao["nota_cinco"];

            }

            if($nota_um == 0 && $nota_dois == 0 && $nota_tres == 0 && $nota_quatro == 0 && $nota_cinco == 0) {

                $avaliacao = 0;

            }

            else {

                $avaliacao = ($nota_um * 1 + $nota_dois * 2 + $nota_tres * 3 + $nota_quatro * 4 + $nota_cinco * 5) / ($nota_um + $nota_dois + $nota_tres + $nota_quatro + $nota_cinco);

            }

            return $avaliacao;

            $conexao_sql_station21 = NULL;

        }

    }

?>