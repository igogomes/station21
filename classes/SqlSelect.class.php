<?php

    //Classe SqlSelect
    //Classe para provimento de meios para manipulação de uma instrução SELECT no banco de dados

    final class SqlSelect extends SqlInstrucao {
        
        private $colunas; //Array de colunas a serem retornadas
        
        //Método adicionarColunas
        //Adição de uma coluna a ser retornada pelo SELECT
        //@param $coluna = coluna da tabela
        public function adicionarColuna($coluna) {
            
            //Adição da coluna no array
            $this -> colunas[] = $coluna; 
            
        }
        
        //Método getInstrucao()
        //Retorno da instrução SELECT em forma de string
        public function getInstrucao() {
            
            //Montagem da instrução SELECT
            $this -> sql = "SELECT ";
            //Montagem da string com os nomes das colunas
            $this -> sql .= implode(", ", $this -> colunas);
            //Adição do nome da tabela na cláusula FROM
            $this -> sql .= " FROM " . $this -> entidade;
            
            //Obtenção da cláusula WHERE do objeto $criterio
            if($this -> criterio) {
                
                $expressao = $this -> criterio -> dump();
                
                if($expressao) {
                    
                    $this -> sql .= " WHERE " . $expressao;
                    
                }
            
                //Obtenção das propriedades do critério
                $order = $this -> criterio -> getPropriedade("ORDER");
                $limit = $this -> criterio -> getPropriedade("LIMIT");
                $offset = $this -> criterio -> getPropriedade("OFFSET");

                //Obtenção da ordenação da instrução SELECT
                if($order) {

                    $this -> sql .= " ORDER BY " . $order;

                }

                if($limit) {

                    $this -> sql .= " LIMIT " . $limit; 

                }

                if($offset) {

                    $this -> sql .= " OFFSET " . $offset; 

                }
            
            }
            
            return $this -> sql;
            
        }
        
    }

?>