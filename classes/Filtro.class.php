<?php

    //Classe Filtro
    //Classe para provimento de interface para identificação de filtros de seleção
    class Filtro extends Expressao {
        
        private $variavel;
        private $operador;
        private $valor; 
        
        //Método __construct()
        //Instância de um novo filtro
        //@param $variavel = variável
        //@param $operador = operador (>, <)
        //@param $valor = valor a ser comparado
        public function __construct($variavel, $operador, $valor) {
            
            //Armazenamento das propriedades 
            $this -> variavel = $variavel;
            $this -> operador = $operador;
            //Transformação do valor de acordo com regras definidas antes da atribuição à propriedade $this -> valor
            $this -> valor = $this -> transformar($valor);
            
        }
        
        //Método transformar()
        //Recepção de um valor e realização das modificações necessárias sobre o mesmo para que seja interpretado
        //pelo banco de dados, podendo ser inteiro / string / booleano ou array
        //@param $valor = valor a ser transformado
        private function transformar($valor) {
            
            //Caso seja um array
            if(is_array($valor)) {
                
                //Percorrendo os valores
                foreach($valor as $x) {
                    
                    //Se for um inteiro
                    if(is_integer($x)) {
                       
                        $foo[] = $x;
                        
                    }
                    
                    else if(is_string($x)) {
                        
                        //Se for string, adicionar aspas
                        $foo[] = "'$x'"; 
                        
                    }
                    
                }
                
                //Conversão do array em string separada por vírgula (,)
                $resultado = "(" . implode(",", $foo) . ")";
                
            }
            
            //Caso seja uma string
            else if(is_string($valor)) {
                
                //Adição de aspas
                $resultado = "$valor";
                
            }
            
            //Caso seja um valor nulo
            else if(is_null($valor)) {
                
                //Armazenamento NULL
                $resultado = "NULL";
                
            }
            
            //Caso seja um booleano
            else if(is_bool($valor)) {
                
                //Armazenamento do TRUE ou FALSE
                $resultado = $valor ? "TRUE" : "FALSE";
                
            }
            
            else {
                
                $resultado = $valor; 
                
            }
            
            //Retorno do valor 
            return $resultado; 
            
        }
        
        //Método dump() 
        //Retorno do filtro em forma de expressão
        public function dump() {
            
            //Concatenação da expressão
            return "{$this -> variavel} {$this -> operador} {$this -> valor}";
            
        }
        
    }

?>