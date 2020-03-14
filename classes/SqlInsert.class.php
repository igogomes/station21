<?php

    //Classe SqlInsert
    //Classe para provimento de meios para manipulação de uma instrução INSERT no banco de dados 
    final class SqlInsert extends SqlInstrucao {
        
        private $valoresColunas;
        
        //Método setValorLinha
        //Atribuição de valores a determinadas colunas no banco de dados
        //@param $column = coluna da tabela
        //@param $value = valor a ser armazenado 
        public function setValorLinha($coluna, $valor) {
            
            //Verificação para avaliar se é um dado escalar (string, inteiro, dentre outros)
            if(is_scalar($valor)) {
                
                if(is_string($valor) AND (!empty($valor))) {
                    
                    //Adição de escape
                    $valor = addslashes($valor); 
                    //Caso seja uma string
                    $this -> valoresColunas[$coluna] = "'$valor'";
                    
                }
                
                else if(is_bool($valor)) {
                    
                    //Caso seja um booleano
                    $this -> valoresColunas[$coluna] = $valor ? "TRUE" : "FALSE";
                    
                }
                
                else if($valor !== "") {
                    
                    //Caso seja outro tipo de dado
                    $this -> valoresColunas[$coluna] = $valor; 
                    
                }
                
                else {
                    
                    $this -> valoresColunas[$coluna] = "NULL";
                    
                }
                
            }
            
        }
        
        //Método setCriterio() 
        //Não há contexto para esta classe em inserções, logo, caso acionada, lançará um erro
        public function setCriterio(Criterio $criterio) {
            
            //Lançamento de erro
            throw new Exception("Não foi possível chamar setCriterio de " . __CLASS__);
            
        }
        
        //Método getInstrucao() 
        //Retorno da instrução INSERT em forma de string
        public function getInstrucao() {
            
            $this -> sql = "INSERT INTO {$this -> entidade} (";
            //Montagem de uma string contendo os nomes das colunas 
            $colunas = implode(", ", array_keys($this -> valoresColunas));
            //Montagem de uma string contendo os valores
            $valores = implode(", ", array_values($this -> valoresColunas));
            $this -> sql .= $colunas . ")";
            $this -> sql .= " VALUES ({$valores})";
            return $this -> sql;
            
        }
        
    }

?>