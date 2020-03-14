<?php

    //Classe Conexao
    //Gerenciamento de conexões com o banco de dados através de arquivos de configuração
    final class Conexao {
        
        //Método __construct()
        //Não haverá instâncias da classe, por isto, o método se encontra marcado como private
        private function __construct() {}
            
        //Método abrir
        //Recepção do nome do banco de dados e instanciamento do objeto PDO correspondente 
        //@param $nome = nome do banco de dados
        public static function abrir($nome) {
                
            //Verificação para avaliar se existe arquivo de configuração para o banco de dados
            if(file_exists("classes/{$nome}.ini")) {
                    
                //Leitura do arquivo INI e retorno de um array
                $banco = parse_ini_file("{$nome}.ini");
                    
            }
                
            else {
                    
                //Em caso de arquivo inexistente, há o lançamento de um erro
                throw new Exception("O arquivo '$nome' não foi encontrado.");
                    
            }
                
            //Leitura das informações contidas no arquivo
            $usuario = isset($banco["usuario"]) ? $banco["usuario"] : NULL;
            $senha = isset($banco["senha"]) ? $banco["senha"] : NULL;
            $nome = isset($banco["nome"]) ? $banco["nome"] : NULL;
            $servidor = isset($banco["servidor"]) ? $banco["servidor"] : NULL;
            $tipo = isset($banco["tipo"]) ? $banco["tipo"] : NULL;
            $porta = isset($banco["porta"]) ? $banco["porta"] : NULL; 
                
            //Avaliação de qual tipo (driver) de banco de dados esta sendo utilizado
            switch($tipo) {
                    
                case "pgsql":
                        
                    $porta = $porta ? $porta : "5432";
                    $conexao = new PDO("pgsql:dbname={$nome}; user={$usuario}; password={$senha}; host=$servidor; port={$porta}");
                    break;
                    
                case "mysql":
                        
                    $porta = $porta ? $porta : "3306";
                    $conexao = new PDO("mysql:host={$servidor};port={$porta};dbname={$nome}", $usuario, $senha);
                    break;
                    
                case "sqlite":
                        
                    $conexao = new PDO("sqlite:{$nome}");
                    break;
                    
                case "ibase":
                        
                    $conexao = new PDO("firebird:dbname={$nome}", $usuario, $senha);
                    break;
                    
                case "oci8":
                        
                    $conexao = new PDO("oci:dbname={$nome}", $usuario, $senha);
                    break;
                    
                case "mssql":
                
                    $conexao = new PDO("mssql:host={$servidor}, 1433, dbname={$nome}", $usuario, $senha);
                    break;
                    
            }
                
            //Definição para que o PDO lance exceções na ocorrência de erros
            $conexao -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            //Retorno do objeto instanciado
            return $conexao;
                
        }
            
    }

?>