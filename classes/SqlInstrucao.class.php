<?php

    //Classe SqlInstrucao.class.php
    //Classe para provimento dos métodos em comum entre todas as instruções SQL (Select, Insert, Delete e Update)
    abstract class SqlInstrucao {
        
        protected $sql; //Armazenamento da instrução SQL
        protected $criterio; //Armazenamento do objeto critério
        protected $entidade; //Entidade ou tabela
        
        //Método setEntidade
        //Definição do nome da entidade ou tabela manipulada pela instrução SQL
        //@param $entidade = tabela
        final public function setEntidade($entidade) {
            
            $this -> entidade = $entidade;
            
        }
        
        //Método getEntidade 
        //Retorno do nome da entidade ou tabela
        final public function getEntidade() {
            
            return $this -> entidade; 
            
        }
        
        //Método setCriterio
        //Definição de um método para seleção de dados através da composição de um objeto do tipo Criterio, que oferece
        //uma interface para definição dos critérios 
        //@param $criterio = objeto do tipo Criterio
        public function setCriterio(Criterio $criterio) {
            
            $this -> criterio = $criterio;
            
        }
        
        //Método getInstrucao
        //Declaração como abstract para obrigar sua declaração nas classes filhas, uma vez que seu comportamento será 
        //distinto para cada uma destas
        abstract function getInstrucao();
        
    }
    
?>