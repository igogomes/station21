<?php

    //Classe AutenticarUsuario.class.php
    //Classe para provimento dos métodos destinados à autenticação de usuários e permissão de acesso ao sistema

    include_once "Autoload.inc";

    class AutenticarUsuario {
        
        //Método localizarUsuario
        //Localiza o usuário na base de dados de dados de acordo com o e-mail fornecido
        //@param $email - e-mail do usuário sobre o qual a localização será realizada
        public function localizarUsuario($email) {
            
            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $localizador_usuario = 0;
            
            $sql_email = new SqlSelect();
            $sql_email -> adicionarColuna("email");
            $sql_email -> setEntidade("Usuario");
            $criterio_usuario = new Criterio();
            $criterio_usuario -> adicionar(new Filtro("email", "=", "'{$email}'"));
            $sql_email -> setCriterio($criterio_usuario);
            
            $localizar_usuario = $conexao_sql_station21 -> query($sql_email -> getInstrucao());
            
            while($linhas_usuario = $localizar_usuario -> fetch(PDO::FETCH_ASSOC)) {
                
                $localizador_usuario++;
                
            }
            
            if($localizador_usuario == 0) {
                
                return 0;
                
            }

            else if($localizador_usuario > 1) {

                return 2;

            }
            
            else {
                
                return 1;
                
            }
            
            $conexao_sql_station21 = NULL;
            
        }

        //Método getNomeUsuario
        //Retorna o nome do usuário de acordo com o e-mail do mesmo
        //@param $email - e-mail do usuário do qual se deseja recuperar o nome
        public function getNomeUsuario($email) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $nome_usuario = "";

            $sql_nome_usuario = new SqlSelect();
            $sql_nome_usuario -> adicionarColuna("nome, email");
            $sql_nome_usuario -> setEntidade("Usuario");
            $criterio_nome_usuario = new Criterio();
            $criterio_nome_usuario -> adicionar(new Filtro("email", "=", "'{$email}'"));
            $sql_nome_usuario -> setCriterio($criterio_nome_usuario);

            $localizar_nome_usuario = $conexao_sql_station21 -> query($sql_nome_usuario -> getInstrucao());

            while($linhas_nome_usuario = $localizar_nome_usuario -> fetch(PDO::FETCH_ASSOC)) {

                $nome_usuario = $linhas_nome_usuario["nome"];

            }

            return $nome_usuario;

            $conexao_sql_station21 = NULL;

        }

        //Método getSenha
        //Retorna a senha do usuário mediante o e-mail do mesmo
        //@param $email - e-mail do usuário do qual se deseja recuperar a senha
        public function getSenha($email) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $senha = "";

            $sql_senha = new SqlSelect();
            $sql_senha -> adicionarColuna("email, senha");
            $sql_senha -> setEntidade("Usuario");
            $criterio_senha = new Criterio();
            $criterio_senha -> adicionar(new Filtro("email", "=", "'{$email}'"));
            $sql_senha -> setCriterio($criterio_senha);

            $localizar_senha = $conexao_sql_station21 -> query($sql_senha -> getInstrucao());

            while($linhas_senha = $localizar_senha -> fetch(PDO::FETCH_ASSOC)) {

                $senha = $linhas_senha["senha"];

            }

            return $senha;

            $conexao_sql_station21 = NULL;

        }

        //Método getEmail
        //Retorna um e-mail de usuário da base de dados caso o mesmo exista
        //@param $email - e-mail do usuário para o qual se deseja realizar a confirmação e recuperação
        public function getEmail($email) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $email = "";

            $sql_email = new SqlSelect();
            $sql_email -> adicionarColuna("email");
            $sql_email -> setEntidade("Usuario");
            $criterio_email = new Criterio();
            $criterio_email -> adicionar(new Filtro("email", "=", "'{$email}'"));
            $sql_email -> setCriterio($criterio_email);

            $localizar_email = $conexao_sql_station21 -> query($sql_email -> getInstrucao());

            while($linhas_email = $localizar_email -> fetch(PDO::FETCH_ASSOC)) {

                $email = $linhas_email["email"];

            }

            return $email;

            $conexao_sql_station21 = NULL;

        }

        //Método getCodigoUsuario
        //Retorna o código do usuário de acordo com o e-mail
        //@param $email - e-mail do usuário do qual se deseja recuperar o código
        public function getCodigoUsuario($email) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $codigo_usuario = "";

            $sql_codigo_usuario = new SqlSelect();
            $sql_codigo_usuario -> adicionarColuna("cod_usuario, email");
            $sql_codigo_usuario -> setEntidade("Usuario");
            $criterio_codigo_usuario = new Criterio();
            $criterio_codigo_usuario -> adicionar(new Filtro("email", "=", "'{$email}'"));
            $sql_codigo_usuario -> setCriterio($criterio_codigo_usuario);

            $localizar_codigo_usuario = $conexao_sql_station21 -> query($sql_codigo_usuario -> getInstrucao());

            while($linhas_codigo_usuario = $localizar_codigo_usuario -> fetch(PDO::FETCH_ASSOC)) {

                $codigo_usuario = $linhas_codigo_usuario["cod_usuario"];

            }

            return $codigo_usuario;

            $conexao_sql_station21 = NULL;

        }

        //Método getPermissao
        //Retorna o tipo de permissão que o usuário possui para acesso às funcionalidades do sistema
        //@param $email - e-mail do usuário do qual se deseja obter o tipo de permissão
        public function getPermissao($email) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $permissao = "";

            $sql_permissao = new SqlSelect();
            $sql_permissao -> adicionarColuna("email, cod_permissao");
            $sql_permissao -> setEntidade("Usuario");
            $criterio_permissao = new Criterio();
            $criterio_permissao -> adicionar(new Filtro("email", "=", "'{$email}'"));
            $sql_permissao -> setCriterio($criterio_permissao);

            $localizar_permissao = $conexao_sql_station21 -> query($sql_permissao -> getInstrucao());

            while($linhas_permissao = $localizar_permissao -> fetch(PDO::FETCH_ASSOC)) {

                $permissao = $linhas_permissao["cod_permissao"];

            }

            return $permissao;

            $conexao_sql_station21 = NULL;

        }
        
        //Método validarAcesso
        //Verificar a compatibilidade entre o usuário e a senha para permitir o acesso ao sistema
        //@param $email - e-mail do usuário sobre o qual a verificação será realizada
        //@param $senha - senha do usuário sobre a qual a verificação será realizada
        public function validarAcesso($email, $senha) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $localizar_validacao = 0;

            $sql_validar_acesso = new SqlSelect();
            $sql_validar_acesso -> adicionarColuna("email, senha");
            $sql_validar_acesso -> setEntidade("Usuario");
            $criterio_validar_acesso_1 = new Criterio();
            $criterio_validar_acesso_1 -> adicionar(new Filtro("email", "=", "'{$email}'"));
            $criterio_validar_acesso_2 = new Criterio();
            $criterio_validar_acesso_2 -> adicionar(new Filtro("senha", "=", "'{$senha}'"));
            $criterio_validar_acesso = new Criterio();
            $criterio_validar_acesso -> adicionar($criterio_validar_acesso_1, Expressao::OPERADOR_AND);
            $criterio_validar_acesso -> adicionar($criterio_validar_acesso_2, Expressao::OPERADOR_AND);

            $sql_validar_acesso -> setCriterio($criterio_validar_acesso);

            $validar_acesso = $conexao_sql_station21 -> query($sql_validar_acesso -> getInstrucao());

            while($linhas_validar_acesso = $validar_acesso -> fetch(PDO::FETCH_ASSOC)) {

                $localizar_validacao++;

            }

            if($localizar_validacao == 0) {

                return 0;

            }

            else if($localizar_validacao == 1) {

                return 1;

            }

            else {

                return 2;

            }

            $conexao_sql_informador = NULL;

        }
        
    }

?>