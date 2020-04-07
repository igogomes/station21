<?php

    //Classe GerenciarStatus.class.php
    //Classe para provimento dos métodos destinados ao gerenciamento de informações relacionadas a status

    include_once "Autoload.inc";

    class GerenciarStatus {

        //Método getStatusPorCodigo()
        //Retorna a descrição do status a partir do código do mesmo
        //@param $cod_status - código do status do qual a descrição será recuperada
        public function getStatusPorCodigo($cod_status) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $status = "";

            $sql_status = new SqlSelect();
            $sql_status -> adicionarColuna("status");
            $sql_status -> setEntidade("Status");

            $criterio_status = new Criterio();
            $criterio_status -> adicionar(new Filtro("cod_status", "=", "'{$cod_status}'"));

            $sql_status -> setCriterio($criterio_status);

            $localizar_status = $conexao_sql_station21 -> query($sql_status -> getInstrucao());

            while($linhas_status = $localizar_status -> fetch(PDO::FETCH_ASSOC)) {

                $status = $linhas_status["status"];

            }

            return $status;

            $conexao_sql_station21 = NULL;

        }

    }

?>