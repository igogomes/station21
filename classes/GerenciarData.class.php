<?php

    include_once "Autoload.inc";

    //Classe GerenciarData
    //Classe destinada à manipulação do formato de datas
    class GerenciarData {

        //Método gerarDataBR() 
        //Método para formatação de data em formato brasileiro (dd/mm/yyyy)
        //@param $data = Data para a qual se deseja realizar a formatação
        public function gerarDataBR($data) {
            
            if(strstr($data, "-") && strstr($data, ":")) {
                
                $data = explode(" ", $data);
                $data = $data[0];
                
                $data = explode("-", $data);
                
                $data = $data[2] . "/" . $data[1] . "/" . $data[0];
                
            }
            
            else if(strstr($data, "-")) {
                
                $data = explode('-', $data);
                $data = $data[2] . '/' . $data[1] . '/' . $data[0];
                
            }
            
            else {
                
                $data = 0;
                
            }
            
            return $data;
            
        }

        //Método gerarDataHoraBR() 
        //Método para formatação de data e hora em formato brasileiro (dd/mm/yyyy HH:mm)
        //@param $data_hora = Data para a qual se deseja realizar a formatação
        public function gerarDataHoraBr($data_hora) { 

            if(strstr($data_hora, "-") && strstr($data_hora, ":")) {
                
                $data_hora_formato_br = "";

                $data = explode(" ", $data_hora);
                $data = $data[0];
                
                $data = explode("-", $data);
                
                $data = $data[2] . "/" . $data[1] . "/" . $data[0];

                $hora = explode(" ", $data_hora);
                $hora = $hora[1];

                $hora = explode(":", $hora);

                $hora = $hora[0] . ":" . $hora[1];

                $data_hora_formato_br = $data . " " . $hora;
                
            }

            else {

                $data_hora_formato_br = 0;

            }

            return $data_hora_formato_br;

        }

        //Método gerarDataBanco() 
        //Método para formatação de data em formato da base de dados (yyyy-mm-dd)
        //@param $data = Data para a qual se deseja realizar a formatação
        public function gerarDataBanco($data) {

            if(strstr($data, "/")) {

                $data = explode("/", $data);
                $data = $data[2] . "-" . $data[1] . "-" . $data[0];

            }

            return $data;

        }

        //Método gerarDataBancoSemAno() 
        //Método para formatação de data em formato da base de dados sem ano (mm-dd)
        //@param $data = Data para a qual se deseja realizar a formatação
        public function gerarDataBancoSemAno($data) {

            if(strstr($data, "/")) {

                $data = explode("/", $data);
                $data = $data[1] . "-" . $data[0];

            }

            return $data;

        }

        //Método gerarDatasSemana()
        //Método para obter as datas (dd/mm) dentro do período de uma semana, sendo data atual última data
        public function gerarDatasSemana() {

            $data_atual = date("d/m");
            $relacao_datas = "";
            $data_menos_um = date('d/m', strtotime('-1 days'));
            $data_menos_dois = date('d/m', strtotime('-2 days'));
            $data_menos_tres = date('d/m', strtotime('-3 days'));
            $data_menos_quatro = date('d/m', strtotime('-4 days'));
            $data_menos_cinco = date('d/m', strtotime('-5 days'));
            $data_menos_seis = date('d/m', strtotime('-6 days'));

            $relacao_datas = '"' . $data_menos_seis . '", "' . $data_menos_cinco . '", "' . $data_menos_quatro . '", "' . $data_menos_tres . '", "' . $data_menos_dois . '", "' . $data_menos_um . '", "' . $data_atual . '"';

            return $relacao_datas;

        }
        
    }
    
?>