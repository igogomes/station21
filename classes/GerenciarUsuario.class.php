<?php

    //Classe GerenciarUsuario.class.php
    //Classe para provimento dos métodos destinados ao gerenciamento de informações relacionadas a usuários

    include_once "Autoload.inc";

    class GerenciarUsuario {

        //Método atualizarUltimoAcesso
        //Realiza a atualização do último acesso do usuário através do e-mail do mesmo
        //@param $email - e-mail do usuário para o qual a atualização será realizada
        public function atualizarUltimoAcesso($email) {

            date_default_timezone_set('America/Sao_Paulo');
            
            $ultimo_acesso = date('Y-m-d H:i:s', time());

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_atualizar_ultimo_acesso = new SqlUpdate();
            $sql_atualizar_ultimo_acesso -> setEntidade("Usuario");
            $sql_atualizar_ultimo_acesso -> setValorLinha("ultimo_acesso", "$ultimo_acesso");

            $criterio_atualizar_ultimo_acesso = new Criterio();
            $criterio_atualizar_ultimo_acesso -> adicionar(new Filtro("email", "=", "'{$email}'"));

            $sql_atualizar_ultimo_acesso -> setCriterio($criterio_atualizar_ultimo_acesso);

            $atualizar_ultimo_acesso = $conexao_sql_station21 -> query($sql_atualizar_ultimo_acesso -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método getCadastradosPorData
        //Obtém a quantidade de usuários cadastrados em uma determinada data
        //@param $data - data da qual se deseja obter a quantidade de usuários cadastrados
        public function getCadastradosPorData($data) {

            $quantidade_cadastrados = 0;

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_cadastrados_por_data = new SqlSelect();
            $sql_cadastrados_por_data -> adicionarColuna("data_cadastro");
            $sql_cadastrados_por_data -> setEntidade("Usuario");

            $criterio_cadastrados_por_data = new Criterio();
            $criterio_cadastrados_por_data -> adicionar(new Filtro("data_cadastro", "LIKE", "'{$data}%'"));
            
            $sql_cadastrados_por_data -> setCriterio($criterio_cadastrados_por_data);

            $localizar_cadastrados_por_data = $conexao_sql_station21 -> query($sql_cadastrados_por_data -> getInstrucao());

            while($linhas_quantidade_cadastrados_por_data = $localizar_cadastrados_por_data -> fetch(PDO::FETCH_ASSOC)) {

                $quantidade_cadastrados++;

            }

            return $quantidade_cadastrados;

            $conexao_sql_station21 = NULL;

        }

        //Método gerarGraficoQuantidadeCadastrados() 
        //Método para geração de gráfico contendo as quantidades diárias de usuários cadastrados ao longo de 
        //uma semana
        public function gerarGraficoQuantidadeCadastrados() {

            $relacao_datas = new GerenciarData();
            $relacao_datas = $relacao_datas -> gerarDatasSemana();

            $data_atual = date("Y-m-d");
            $data_atual_menos_um = date('Y-m-d', strtotime('-1 days'));
            $data_atual_menos_dois = date('Y-m-d', strtotime('-2 days'));
            $data_atual_menos_tres = date('Y-m-d', strtotime('-3 days'));
            $data_atual_menos_quatro = date('Y-m-d', strtotime('-4 days'));
            $data_atual_menos_cinco = date('Y-m-d', strtotime('-5 days'));
            $data_atual_menos_seis = date('Y-m-d', strtotime('-6 days'));

            $quantidade_usuarios_data_atual = $this -> getCadastradosPorData($data_atual); 
            $quantidade_usuarios_data_menos_um = $this -> getCadastradosPorData($data_atual_menos_um);
            $quantidade_usuarios_data_menos_dois = $this -> getCadastradosPorData($data_atual_menos_dois);
            $quantidade_usuarios_data_menos_tres = $this -> getCadastradosPorData($data_atual_menos_tres);
            $quantidade_usuarios_data_menos_quatro = $this -> getCadastradosPorData($data_atual_menos_quatro);
            $quantidade_usuarios_data_menos_cinco = $this -> getCadastradosPorData($data_atual_menos_cinco);
            $quantidade_usuarios_data_menos_seis = $this -> getCadastradosPorData($data_atual_menos_seis);

            $script = "<script>
            $(function() {
                var qtdeUsuarios = {
                        labels: [" . $relacao_datas . "],
                        datasets: [{
                            label: 'Valor Total',
                            borderColor: 'rgba(41,183,102,1)',
                            backgroundColor: 'rgba(46,204,113,1)',
                            pointBackgroundColor: 'rgba(41,183,102,1)',
                            data: [$quantidade_usuarios_data_menos_seis, $quantidade_usuarios_data_menos_cinco, $quantidade_usuarios_data_menos_quatro, " . $quantidade_usuarios_data_menos_tres . ", $quantidade_usuarios_data_menos_dois, $quantidade_usuarios_data_menos_um, $quantidade_usuarios_data_atual]
                        }]
                    },
                    config = {
                        responsive: !0,
                        maintainAspectRatio: !1
                    },
                    quadroUsuarios = document.getElementById('bar_chart').getContext('2d');
                new Chart(quadroUsuarios, {
                    type: 'line',
                    data: qtdeUsuarios,
                    options: config
                });
            });
            </script>";

            return $script;

        }

        //Método gerarTabelaUltimosAcessos()
        //Método para geração de tabela simples contendo os últimos acessos dos usuários
        public function gerarTabelaUltimosAcessos() {

            $tabela_ultimos_acessos = "";
            $nome_usuario = "";
            $ultimo_acesso = "";

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_gerar_tabela_ultimos_acessos = new SqlSelect();
            $sql_gerar_tabela_ultimos_acessos -> adicionarColuna("*");
            $sql_gerar_tabela_ultimos_acessos -> setEntidade("Usuario");

            $criterio_gerar_tabela_ultimos_acessos = new Criterio();
            $criterio_gerar_tabela_ultimos_acessos -> setPropriedade("ORDER", "usuario.data_cadastro DESC");
            $criterio_gerar_tabela_ultimos_acessos -> setPropriedade("LIMIT", 5);
    
            $sql_gerar_tabela_ultimos_acessos -> setCriterio($criterio_gerar_tabela_ultimos_acessos);

            $localizar_ultimos_acessos = $conexao_sql_station21 -> query($sql_gerar_tabela_ultimos_acessos -> getInstrucao());

            $tabela_ultimos_acessos = 
                "<table class=\"table table-striped table-hover\">
                    <thead>
                        <tr>
                            <th>Usuários</th>
                            <th>Último Acesso</th>
                        </tr>
                    </thead>
                    <tbody>";

            while($linhas_ultimos_acessos = $localizar_ultimos_acessos -> fetch(PDO::FETCH_ASSOC)) {

                $nome_usuario = utf8_encode($linhas_ultimos_acessos["nome"]);
                $ultimo_acesso = $linhas_ultimos_acessos["ultimo_acesso"];

                $ultimo_acesso_data_hora_br = new GerenciarData();
                $ultimo_acesso_data_hora_br = $ultimo_acesso_data_hora_br -> gerarDataHoraBr($ultimo_acesso);

                $tabela_ultimos_acessos .= "<tr> <td>" . $nome_usuario . "</td> <td>" . $ultimo_acesso_data_hora_br . "</td> </tr>";

            }

            $tabela_ultimos_acessos .= 
                    "</tbody>
                </table>";

            return $tabela_ultimos_acessos;

            $conexao_sql_station21 = NULL;

        }

        //Método getQuantidadeUsuarios
        //Método para obtenção da quantidade de usuários cadastrados no sistema
        public function getQuantidadeUsuarios() {

            $quantidade_usuarios = "";

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_quantidade_usuarios = new SqlSelect();
            $sql_quantidade_usuarios -> adicionarColuna("cod_usuario");
            $sql_quantidade_usuarios -> setEntidade("Usuario");

            $localizar_quantidade_usuarios = $conexao_sql_station21 -> query($sql_quantidade_usuarios -> getInstrucao());

            while($linhas_quantidade_usuarios = $localizar_quantidade_usuarios -> fetch(PDO::FETCH_ASSOC)) {

                $quantidade_usuarios++;

            }
            
            return $quantidade_usuarios;

            $conexao_sql_station21 = NULL;

        }

    }

?>