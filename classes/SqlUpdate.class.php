<?php

    //Classe SqlUpdate
    //Classe para provimento de meios para manipulação de uma instrução UPDATE no banco de dados 
    final class SqlUpdate extends SqlInstrucao {
        
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
        
        //Método getInstrucao() 
        //Retorno da instrução UPDATE em forma de string
        public function getInstrucao() {
            
            //Montagem da string de UPDATE
            $this -> sql = "UPDATE {$this -> entidade}";
            //Montagem dos pares coluna = valor
            if($this -> valoresColunas) {
                
                foreach($this -> valoresColunas as $coluna => $valor) {
                    
                    $set[] = "{$coluna} = {$valor}";
                    
                }
                
            }
            
            $this -> sql .= " SET " . implode(", ", $set);
            //Retorno da cláusula WHERE do objeto $this -> criterio
            if($this -> criterio) {
                
                $this -> sql .= " WHERE " . $this -> criterio -> dump();
                
            }
            
            return $this -> sql;
            
        }
        
    }

?>