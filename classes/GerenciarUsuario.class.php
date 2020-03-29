<?php

    //Classe GerenciarUsuario.class.php
    //Classe para provimento dos métodos destinados ao gerenciamento de informações relacionadas a usuários

    include_once "Autoload.inc";

    class GerenciarUsuario {

        //Método atualizarUltimoAcesso
        //Realiza a atualização do último acesso do usuário através do e-mail do mesmo
        //@param $email - e-mail do usuário para o qual a atualização será realizada
        public function atualizarUltimoAcesso($email) {

            date_default_timezone_set('America/Sao_Paulo');
            
            $ultimo_acesso = date('Y-m-d H:i:s', time());

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_atualizar_ultimo_acesso = new SqlUpdate();
            $sql_atualizar_ultimo_acesso -> setEntidade("Usuario");
            $sql_atualizar_ultimo_acesso -> setValorLinha("ultimo_acesso", "$ultimo_acesso");

            $criterio_atualizar_ultimo_acesso = new Criterio();
            $criterio_atualizar_ultimo_acesso -> adicionar(new Filtro("email", "=", "'{$email}'"));

            $sql_atualizar_ultimo_acesso -> setCriterio($criterio_atualizar_ultimo_acesso);

            $atualizar_ultimo_acesso = $conexao_sql_station21 -> query($sql_atualizar_ultimo_acesso -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

    }

?>