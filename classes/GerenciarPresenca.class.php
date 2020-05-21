<?php

    //Classe GerenciarPresenca.class.php
    //Classe para provimento dos métodos destinados ao gerenciamento de informações relacionadas a presenças

    include_once "Autoload.inc";

    class GerenciarPresenca {

        //Método getPresencaPorCodigoUsuarioECodigoCurso
        //Retorna a presença de um usuário em um curso através do código de ambos
        //@param $cod_usuario - código do usuário do qual a presença será recuperada
        //@param $cod_curso - código do curso do qual a presença será recuperada
        public function getPresencaPorCodigoUsuarioECodigoCurso($cod_usuario, $cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $presenca = "0%";

            $sql_presenca = new SqlSelect();
            $sql_presenca -> adicionarColuna("cod_usuario, cod_curso, presenca");
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

                $presenca = $linhas_presenca["presenca"];

            }

            return $presenca;

            $conexao_sql_station21 = NULL;

        }

    }

?>