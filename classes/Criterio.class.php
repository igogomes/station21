<?php

    //Classe Criterio
    //Classe para provimento de interface para definição de critérios em expressões
    class Criterio extends Expressao {
        
        private $expressoes; //Armazenamento da lista de expressões
        private $operadores; //Armazenamento da lista de operadores
        private $propriedades; //Propriedades do critério
        
        //Método __construct() 
        function __construct() {
            
            $this -> expressoes = array();
            $this -> operadores = array();
            
        }
        
        //Método adicionar() 
        //Adição de uma expressão ao critério
        //@param $expressao = expressão (objeto Expressao) 
        //@param $operador = operador lógico de comparação
        public function adicionar(Expressao $expressao, $operador = self::OPERADOR_AND) {
            
            //Na primeira execução não é necessário operador lógico para concatenação
            if(empty($this -> expressoes)) {
                
                $operador = NULL;
                
            }
            
            //Agregação do resultado da expressão à lista de expressões
            $this -> expressoes[] = $expressao; 
            $this -> operadores[] = $operador; 
            
        }
        
        //Método dump()
        //Retorno da expressão final
        public function dump() {
            
            //Concatenação da lista de expressões
            if(is_array($this -> expressoes)) {
                
                if(count($this -> expressoes) > 0) {
                    
                    $resultado = "";
                    foreach($this -> expressoes as $i => $expressao) {
                        
                        $operador = $this -> operadores[$i];
                        //Concatenação do operador com a respectiva expressão
                        $resultado .= $operador . $expressao -> dump() . " ";
                        
                    }
                    
                    $resultado = trim($resultado);
                    return "({$resultado})";
                    
                }
                
            }
            
        }
        
        //Método setPropriedade
        //Definição do valor de uma propriedade
        //@param $propriedade = propriedade
        //@param $valor = valor 
        public function setPropriedade($propriedade, $valor) {
            
            if(isset($valor)) {
                
                $this -> propriedades[$propriedade] = $valor; 
                
            }
            
            else {
                
                $this -> propriedades[$propriedade] = NULL;
                
            }
            
        }
        
        //Método getPropriedade
        //Retorno do valor de uma propriedade
        //@param $propriedade = propriedade
        public function getPropriedade($propriedade) {
            
            if(isset($this -> propriedades[$propriedade])) {
                
                return $this -> propriedades[$propriedade];
                
            }
            
        }
        
    }

?>