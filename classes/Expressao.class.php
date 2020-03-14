<?php

    //Classe Expressao
    //Classe abstrata para gerenciamento de expressões SQL
    abstract class Expressao {
        
        //Operadores lógicos 
        const OPERADOR_AND = "AND ";
        const OPERADOR_OR = "OR ";
        
        //Marcação do método dump() como obrigatório
        abstract public function dump();
        
    }

?>