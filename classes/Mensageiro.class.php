<?php 

    //Classe Mensageiro.class.php
    //Classe para provimento dos métodos destinados ao gerenciamento de mensagens

    include_once "Autoload.inc";

    class Mensageiro {  

        //Método emailRecuperarSenha
        //Envia e-mail para recuperação de senha de usuário
        //@param $email - e-mail do usuário que solicita a recuperação da senha
        public function emailRecuperarSenha($email) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $senha = "";
            $nome = "";
            $email_remetente = "contato@igogomes.com.br";

            $sql_recuperar_senha_usuario = new SqlSelect();
            $sql_recuperar_senha_usuario -> adicionarColuna("email, senha");
            $sql_recuperar_senha_usuario -> setEntidade("Usuario");

            $criterio_recuperar_senha_usuario = new Criterio();
            $criterio_recuperar_senha_usuario -> adicionar(new Filtro("email", "=", "'{$email}'"));

            $sql_recuperar_senha_usuario -> setCriterio($criterio_recuperar_senha_usuario);

            $localizar_senha_usuario = $conexao_sql_station21 -> query($sql_recuperar_senha_usuario -> getInstrucao());

            while($linhas_senha_usuario = $localizar_senha_usuario -> fetch(PDO::FETCH_ASSOC)) {

                $nome = $linhas_senha_usuario["nome"];
                $senha = $linhas_senha_usuario["senha"];

            }

            $headers  = "From: $email_remetente\r\n";
            $headers .= "Reply-To: $email_remetente\r\n";

            $assunto = "Recuperação de senha - Station 21 - $nome";

            $mensagem = "Olá!<br>O Station21 recebeu sua solicitação de recuperação de senha e, seus dados 
            estão descritos a seguir:<br><br>
            E-mail: $email<br>
            Senha: $senha<br><br>
            Em caso de dúvidas, entre em contato com o administrador.<br><br>
            Station21";

            mail($email, $assunto, $mensagem, $headers);

            $conexao_sql_station21 = NULL;

        }

    }

?>