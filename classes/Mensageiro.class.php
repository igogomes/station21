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
            $email_remetente = "contato@station21.com.br";

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

            $headers  = "From: Station21 <$email_remetente>\n";
            $headers .= "Reply-To: $email_remetente\n";

            $assunto = "Recuperação de senha - Station 21 - $nome";

            $mensagem = "Olá!\n\rO Station21 recebeu sua solicitação de recuperação de senha e, seus dados estão descritos a seguir:\n\rE-mail: $email\nSenha: $senha\n\rEm caso de dúvidas, entre em contato com o administrador.\n\rAtenciosamente,\nStation21";

            mail($email, $assunto, $mensagem, $headers);

            if(!mail($email, $assunto, $mensagem, $headers ,"-r".$email_remetente)) {
                $headers .= "Return-Path: Station21 <$email_remetente>\n";
                mail($email, $assunto, $mensagem, $headers);
            }

            $conexao_sql_station21 = NULL;

        }

    }

?>