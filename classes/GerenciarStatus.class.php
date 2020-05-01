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

        //Método gerarListaStatusPorCodigo
        //Método para geração de lista de status de cursos cadastrados no sistema com seleção a partir 
        //do código do status
        //@param $cod_status - código do status que será selecionado na lista
        public function gerarListaStatusPorCodigo($cod_status) {

            $cod_status_base = "";
            $status = "";
            $lista_status = "";

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_lista_status = new SqlSelect();
            $sql_lista_status -> adicionarColuna("*");
            $sql_lista_status -> setEntidade("Status");

            $criterio_lista_status = new Criterio();
            $criterio_lista_status -> setPropriedade("ORDER", "Status.cod_status ASC");

            $sql_lista_status -> setCriterio($criterio_lista_status);

            $localizar_lista_status = $conexao_sql_station21 -> query($sql_lista_status -> getInstrucao());

            while($linhas_lista_status = $localizar_lista_status -> fetch(PDO::FETCH_ASSOC)) {

                $cod_status_base = $linhas_lista_status["cod_status"];
                $status = utf8_encode($linhas_lista_status["status"]);

                if($cod_status_base == $cod_status) {

                    $lista_status .= "<option value=\"" . $cod_status_base . "\" selected>" . $status . "</option>";

                }

                else {

                    $lista_status .= "<option value=\"" . $cod_status_base . "\">" . $status . "</option>";

                }

            }

            return $lista_status;

            $conexao_sql_station21 = NULL;

        }

    }

?>