<?php

    //Classe SqlDelete
    //Classe para provimento de meios para manipulação de uma instrução DELETE no banco de dados
    final class SqlDelete extends SqlInstrucao {
        
        //Método getInstrucao
        //Retorno da instrução DELETE em forma de string
        public function getInstrucao() {
            
            //Montagem da string de DELETE
            $this -> sql = "DELETE FROM {$this -> entidade}";
            
            //Retorno da cláusula WHERE do objeto $this -> criterio
            if($this -> criterio) {
                
                $expressao = $this -> criterio -> dump();
                
                if($expressao) {
                    
                    $this -> sql .= " WHERE " . $expressao;
                    
                }
                
            }
            
            return $this -> sql;
        
        }
        
    }

?>