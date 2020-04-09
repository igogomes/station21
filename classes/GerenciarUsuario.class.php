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
            $criterio_gerar_tabela_ultimos_acessos -> setPropriedade("ORDER", "usuario.ultimo_acesso DESC");
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

        //Método gerarTabelaUltimosCadastros()
        //Método para geração de tabela simples contendo os últimos usuários cadastrados
        public function gerarTabelaUltimosCadastros() {

            $tabela_ultimos_cadastros = "";
            $nome_usuario = "";
            $data_cadastro = "";

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_gerar_tabela_ultimos_cadastros = new SqlSelect();
            $sql_gerar_tabela_ultimos_cadastros -> adicionarColuna("*");
            $sql_gerar_tabela_ultimos_cadastros -> setEntidade("Usuario");

            $criterio_gerar_tabela_ultimos_cadastros = new Criterio();
            $criterio_gerar_tabela_ultimos_cadastros -> setPropriedade("ORDER", "usuario.data_cadastro DESC");
            $criterio_gerar_tabela_ultimos_cadastros -> setPropriedade("LIMIT", 5);
    
            $sql_gerar_tabela_ultimos_cadastros -> setCriterio($criterio_gerar_tabela_ultimos_cadastros);

            $localizar_ultimos_cadastros = $conexao_sql_station21 -> query($sql_gerar_tabela_ultimos_cadastros -> getInstrucao());

            $tabela_ultimos_cadastros = 
                "<table class=\"table table-striped table-hover\">
                    <thead>
                        <tr>
                            <th>Usuários</th>
                            <th>Data do Cadastro</th>
                        </tr>
                    </thead>
                    <tbody>";

            while($linhas_ultimos_cadastros = $localizar_ultimos_cadastros -> fetch(PDO::FETCH_ASSOC)) {

                $nome_usuario = utf8_encode($linhas_ultimos_cadastros["nome"]);
                $data_cadastro = $linhas_ultimos_cadastros["data_cadastro"];

                $data_hora_cadastro_br = new GerenciarData();
                $data_hora_cadastro_br = $data_hora_cadastro_br -> gerarDataHoraBr($data_cadastro);

                $tabela_ultimos_cadastros .= "<tr> <td>" . $nome_usuario . "</td> <td>" . $data_hora_cadastro_br . "</td> </tr>";

            }

            $tabela_ultimos_cadastros .= 
                    "</tbody>
                </table>";

            return $tabela_ultimos_cadastros;

            $conexao_sql_station21 = NULL;

        }

        //Método gerarTabelaUsuarios()
        //Método para geração de tabela simples contendo todos os usuários cadastrados
        //@param $cod_usuario_autenticado - Código do usuário autenticado que não será exibido na relação de usuários 
        //cadastrados
        public function gerarTabelaUsuarios($cod_usuario_autenticado) {

            $tabela_usuarios = "";
            $cod_usuario = "";
            $nome = "";
            $email = "";
            $data_cadastro = "";
            $permissao = "";

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_gerar_tabela_usuarios = new SqlSelect();
            $sql_gerar_tabela_usuarios -> adicionarColuna("*");
            $sql_gerar_tabela_usuarios -> setEntidade("Usuario");

            $criterio_gerar_tabela_usuarios = new Criterio();
            $criterio_gerar_tabela_usuarios -> setPropriedade("ORDER", "usuario.nome ASC");
    
            $sql_gerar_tabela_usuarios -> setCriterio($criterio_gerar_tabela_usuarios);

            $localizar_usuarios = $conexao_sql_station21 -> query($sql_gerar_tabela_usuarios -> getInstrucao());

            while($linhas_usuarios = $localizar_usuarios -> fetch(PDO::FETCH_ASSOC)) {

                $cod_usuario = $linhas_usuarios["cod_usuario"];
                $nome = utf8_encode($linhas_usuarios["nome"]);
                $email = $linhas_usuarios["email"];
                $data_cadastro = $linhas_usuarios["data_cadastro"];
                $permissao = $linhas_usuarios["cod_permissao"];

                $data_hora_cadastro_br = new GerenciarData();
                $data_hora_cadastro_br = $data_hora_cadastro_br -> gerarDataHoraBr($data_cadastro);

                $descricao_permissao = $this -> getPermissao($permissao);

                if($cod_usuario != $cod_usuario_autenticado) {

                    $tabela_usuarios .= "<tr> 
                                            <td>" . $nome . "</td> 
                                            <td>" . $email . "</td> 
                                            <td>" . $data_hora_cadastro_br . "</td> 
                                            <td>" . $descricao_permissao . "</td> 
                                            <td> 
                                                <a href=\"edit-user?cod-user=$cod_usuario\">
                                                    <button class=\"btn btn-default btn-xs m-r-5\" data-toggle=\"tooltip\" data-original-title=\"Editar\">
                                                        <i class=\"fa fa-pencil font-14\"></i>
                                                    </button>
                                                </a>
                                                <a href=\"users?cod-delete-user=$cod_usuario&delete-user=1\">
                                                    <button class=\"btn btn-default btn-xs\" data-toggle=\"tooltip\" data-original-title=\"Excluir\">
                                                        <i class=\"fa fa-trash font-14\"></i>
                                                    </button> 
                                                </a>
                                            </td>
                                        </tr>";

                }

            }

            return $tabela_usuarios;

            $conexao_sql_station21 = NULL;

        }

        //Método getPermissao()
        //Método para obtenção da descrição do tipo de permissão concedida ao usuário de acordo com o código
        //da mesma
        //@param $cod_permissao - código da permissão da qual se deseja obter a descrição
        public function getPermissao($cod_permissao) {

            $permissao = "";

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_permissao = new SqlSelect();
            $sql_permissao -> adicionarColuna("permissao");
            $sql_permissao -> setEntidade("Permissao");

            $criterio_permissao = new Criterio();
            $criterio_permissao -> adicionar(new Filtro("cod_permissao", "=", "'{$cod_permissao}'"));

            $sql_permissao -> setCriterio($criterio_permissao);

            $localizar_permissao = $conexao_sql_station21 -> query($sql_permissao -> getInstrucao());

            while($linhas_permissao = $localizar_permissao -> fetch(PDO::FETCH_ASSOC)) {

                $permissao = utf8_encode($linhas_permissao["permissao"]);

            }

            return $permissao;

            $conexao_sql_station21 = NULL;

        }

        //Método gerarListaPermissoes
        //Método para geração de lista de permissões cadastradas no sistema
        public function gerarListaPermissoes() {

            $cod_permissao = "";
            $permissao = "";
            $lista_permissao = "";

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_lista_permissao = new SqlSelect();
            $sql_lista_permissao -> adicionarColuna("*");
            $sql_lista_permissao -> setEntidade("Permissao");

            $criterio_lista_permissao = new Criterio();
            $criterio_lista_permissao -> setPropriedade("ORDER", "permissao.cod_permissao ASC");

            $sql_lista_permissao -> setCriterio($criterio_lista_permissao);

            $localizar_lista_permissao = $conexao_sql_station21 -> query($sql_lista_permissao -> getInstrucao());

            while($linhas_lista_permissao = $localizar_lista_permissao -> fetch(PDO::FETCH_ASSOC)) {

                $cod_permissao = $linhas_lista_permissao["cod_permissao"];
                $permissao = utf8_encode($linhas_lista_permissao["permissao"]);

                $lista_permissao .= "<option value=\"" . $cod_permissao . "\">" . $permissao . "</option>";

            }

            return $lista_permissao;

            $conexao_sql_station21 = NULL;

        }

        //Método gerarListaPermissoesComSelecao
        //Método para geração de lista de permissões cadastradas no sistema com seleção de permissão específica
        public function gerarListaPermissoesComSelecao($cod_permissao) {

            $cod_permissao_base = "";
            $permissao = "";
            $lista_permissao = "";

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_lista_permissao = new SqlSelect();
            $sql_lista_permissao -> adicionarColuna("*");
            $sql_lista_permissao -> setEntidade("Permissao");

            $criterio_lista_permissao = new Criterio();
            $criterio_lista_permissao -> setPropriedade("ORDER", "permissao.cod_permissao ASC");

            $sql_lista_permissao -> setCriterio($criterio_lista_permissao);

            $localizar_lista_permissao = $conexao_sql_station21 -> query($sql_lista_permissao -> getInstrucao());

            while($linhas_lista_permissao = $localizar_lista_permissao -> fetch(PDO::FETCH_ASSOC)) {

                $cod_permissao_base = $linhas_lista_permissao["cod_permissao"];
                $permissao = utf8_encode($linhas_lista_permissao["permissao"]);

                if($cod_permissao == $cod_permissao_base) {

                    $lista_permissao .= "<option value=\"" . $cod_permissao . "\" selected>" . $permissao . "</option>";

                }

                else {

                    $lista_permissao .= "<option value=\"" . $cod_permissao . "\">" . $permissao . "</option>";

                }

            }

            return $lista_permissao;

            $conexao_sql_station21 = NULL;

        }

        //Método setUsuario
        //Método para o cadastro de usuário na base de dados
        //@param $nome - nome do usuário a ser cadastrado
        //@param $email - e-mail do usuário a ser cadastrado
        //@param $permissao - permissão do usuário a ser cadastrado
        public function setUsuario($nome, $email, $permissao) {

            $nome = utf8_decode($nome);

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_cadastrar_usuario = new SqlInsert();
            $sql_cadastrar_usuario -> setEntidade("Usuario");
            $sql_cadastrar_usuario -> setValorLinha("nome", $nome);
            $sql_cadastrar_usuario -> setValorLinha("email", $email);
            $sql_cadastrar_usuario -> setValorLinha("cod_permissao", $permissao);
            $sql_cadastrar_usuario -> setValorLinha("senha", "station21");

            $cadastrar_usuario = $conexao_sql_station21 -> query($sql_cadastrar_usuario -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método getNomePorCodigoUsuario
        //Retorna o nome do usuário a partir do código do mesmo
        //@param $cod_usuario - código do usuário do qual o nome será recuperado
        public function getNomePorCodigoUsuario($cod_usuario) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $nome = "";

            $sql_nome_usuario = new SqlSelect();
            $sql_nome_usuario -> adicionarColuna("nome");
            $sql_nome_usuario -> setEntidade("Usuario");

            $criterio_nome_usuario = new Criterio();
            $criterio_nome_usuario -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));

            $sql_nome_usuario -> setCriterio($criterio_nome_usuario);

            $localizar_nome_usuario = $conexao_sql_station21 -> query($sql_nome_usuario -> getInstrucao());

            while($linhas_nome_usuario = $localizar_nome_usuario -> fetch(PDO::FETCH_ASSOC)) {

                $nome = $linhas_nome_usuario["nome"];

            }

            return $nome;

            $conexao_sql_station21 = NULL;

        }

        //Método getEmailPorCodigoUsuario
        //Retorna o e-mail do usuário a partir do código do mesmo
        //@param $cod_usuario - código do usuário do qual o e-mail será recuperado
        public function getEmailPorCodigoUsuario($cod_usuario) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $email = "";

            $sql_email_usuario = new SqlSelect();
            $sql_email_usuario -> adicionarColuna("email");
            $sql_email_usuario -> setEntidade("Usuario");

            $criterio_email_usuario = new Criterio();
            $criterio_email_usuario -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));

            $sql_email_usuario -> setCriterio($criterio_email_usuario);

            $localizar_email_usuario = $conexao_sql_station21 -> query($sql_email_usuario -> getInstrucao());

            while($linhas_email_usuario = $localizar_email_usuario -> fetch(PDO::FETCH_ASSOC)) {

                $email = $linhas_email_usuario["email"];

            }

            return $email;

            $conexao_sql_station21 = NULL;

        }

        //Método getPermissaoPorCodigoUsuario
        //Retorna a permissão do usuário a partir do código do mesmo
        //@param $cod_usuario - código do usuário do qual a permissão será recuperada
        public function getPermissaoPorCodigoUsuario($cod_usuario) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $permissao = "";

            $sql_permissao_usuario = new SqlSelect();
            $sql_permissao_usuario -> adicionarColuna("cod_permissao");
            $sql_permissao_usuario -> setEntidade("Usuario");

            $criterio_permissao_usuario = new Criterio();
            $criterio_permissao_usuario -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));

            $sql_permissao_usuario -> setCriterio($criterio_permissao_usuario);

            $localizar_permissao_usuario = $conexao_sql_station21 -> query($sql_permissao_usuario -> getInstrucao());

            while($linhas_permissao_usuario = $localizar_permissao_usuario -> fetch(PDO::FETCH_ASSOC)) {

                $permissao = $linhas_permissao_usuario["cod_permissao"];

            }

            return $permissao;

            $conexao_sql_station21 = NULL;

        }

        //Método atualizarDadosUsuario()
        //Método para atualização dos dados de usuários na base de dados
        //@param $cod_usuario - código do usuário do qual os dados serão alterados
        //@param $nome - nome do usuário para atualização na base de dados
        //@param $email - e-mail do usuário para atualização na base de dados
        //@param $permissao - código de permissão para atualização na base de dados
        public function atualizarDadosUsuario($cod_usuario, $nome, $email, $permissao) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_atualizar_dados_usuario = new SqlUpdate();
            $sql_atualizar_dados_usuario -> setEntidade("Usuario");
            $sql_atualizar_dados_usuario -> setValorLinha("nome", "{$nome}");
            $sql_atualizar_dados_usuario -> setValorLinha("email", "{$email}");
            $sql_atualizar_dados_usuario -> setValorLinha("cod_permissao", "$permissao");

            $criterio_atualizar_dados_usuario = new Criterio();
            $criterio_atualizar_dados_usuario -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));

            $sql_atualizar_dados_usuario -> setCriterio($criterio_atualizar_dados_usuario);

            $atualizar_dados_usuario = $conexao_sql_station21 -> query($sql_atualizar_dados_usuario -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método excluirUsuario() 
        //Método para exclusão de usuário da base de dados
        //@param $cod_usuario - código do usuário do qual os dados serão excluidos da base de dados
        public function excluirUsuario($cod_usuario) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_excluir_usuario = new SqlDelete();

            $sql_excluir_usuario -> setEntidade("Usuario");

            $criterio_excluir_usuario = new Criterio();
            $criterio_excluir_usuario -> adicionar(new Filtro("cod_usuario", "=", "'$cod_usuario'"));

            $sql_excluir_usuario -> setCriterio($criterio_excluir_usuario);

            $excluir_usuario = $conexao_sql_station21 -> query($sql_excluir_usuario -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método atualizarNomeUsuario()
        //Método para atualização do nome do usuário na base de dados
        //@param $cod_usuario - código do usuário do qual o nome será atualizado
        //@param $nome - nome do usuário que será atualizado
        public function atualizarNomeUsuario($cod_usuario, $nome) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $nome_usuario = "";
            $nome_usuario = utf8_decode($nome);

            $sql_atualizar_perfil_usuario = new SqlUpdate();
            $sql_atualizar_perfil_usuario -> setEntidade("Usuario");
            $sql_atualizar_perfil_usuario -> setValorLinha("nome", "{$nome_usuario}");

            $criterio_atualizar_perfil_usuario = new Criterio();
            $criterio_atualizar_perfil_usuario -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));

            $sql_atualizar_perfil_usuario -> setCriterio($criterio_atualizar_perfil_usuario);

            $atualizar_perfil_usuario = $conexao_sql_station21 -> query($sql_atualizar_perfil_usuario -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método atualizarEmailUsuario()
        //Método para atualização do e-mail do usuário na base de dados
        //@param $cod_usuario - código do usuário do qual o e-mail será atualizado
        //@param $email - e-mail do usuário que será atualizado
        public function atualizarEmailUsuario($cod_usuario, $email) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_atualizar_perfil_usuario = new SqlUpdate();
            $sql_atualizar_perfil_usuario -> setEntidade("Usuario");
            $sql_atualizar_perfil_usuario -> setValorLinha("email", "{$email}");

            $criterio_atualizar_perfil_usuario = new Criterio();
            $criterio_atualizar_perfil_usuario -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));

            $sql_atualizar_perfil_usuario -> setCriterio($criterio_atualizar_perfil_usuario);

            $atualizar_perfil_usuario = $conexao_sql_station21 -> query($sql_atualizar_perfil_usuario -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método atualizarSenhaUsuario()
        //Método para atualização da senha do usuário na base de dados
        //@param $cod_usuario - código do usuário do qual a senha será atualizada
        //@param $senha - senha do usuário que será atualizada
        public function atualizarSenhaUsuario($cod_usuario, $senha) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_atualizar_perfil_usuario = new SqlUpdate();
            $sql_atualizar_perfil_usuario -> setEntidade("Usuario");
            $sql_atualizar_perfil_usuario -> setValorLinha("senha", "{$senha}");

            $criterio_atualizar_perfil_usuario = new Criterio();
            $criterio_atualizar_perfil_usuario -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));

            $sql_atualizar_perfil_usuario -> setCriterio($criterio_atualizar_perfil_usuario);

            $atualizar_perfil_usuario = $conexao_sql_station21 -> query($sql_atualizar_perfil_usuario -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método gerarListaInstrutores
        //Método para geração de lista de instrutores cadastrados no sistema
        public function gerarListaInstrutores() {

            $cod_permissao = "";
            $nome = "";
            $lista_instrutores = "";

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_lista_instrutores = new SqlSelect();
            $sql_lista_instrutores -> adicionarColuna("*");
            $sql_lista_instrutores -> setEntidade("Usuario");

            $criterio_lista_instrutores = new Criterio();
            $criterio_lista_instrutores -> setPropriedade("ORDER", "Usuario.nome ASC");

            $sql_lista_instrutores -> setCriterio($criterio_lista_instrutores);

            $localizar_lista_instrutores = $conexao_sql_station21 -> query($sql_lista_instrutores -> getInstrucao());

            while($linhas_lista_instrutores = $localizar_lista_instrutores -> fetch(PDO::FETCH_ASSOC)) {

                $cod_permissao = $linhas_lista_instrutores["cod_permissao"];
                $nome = utf8_encode($linhas_lista_instrutores["nome"]);

                if($cod_permissao == 2) {

                    $lista_instrutores .= "<option value=\"" . $cod_permissao . "\">" . $nome . "</option>";

                }

            }

            return $lista_instrutores;

            $conexao_sql_station21 = NULL;

        }

        //Método verificarEmailExistente
        //Avalia se e-mail já se encontra cadastrado no sistema
        //@param $email - e-mail para o qual a verificação será realizada
        public function verificarEmailExistente($email) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $email_base_dados = "";
            $quantidade = 0;

            $sql_verificar_email = new SqlSelect();
            $sql_verificar_email -> adicionarColuna("email");
            $sql_verificar_email -> setEntidade("Usuario");

            $criterio_verificar_email = new Criterio();
            $criterio_verificar_email -> adicionar(new Filtro("email", "=", "'{$email}'"));

            $sql_verificar_email -> setCriterio($criterio_verificar_email);

            $localizar_email = $conexao_sql_station21 -> query($sql_verificar_email -> getInstrucao());

            while($linhas_verificar_email = $localizar_email -> fetch(PDO::FETCH_ASSOC)) {

                $email_base_dados = $linhas_verificar_email["email"];

                if($email == $email_base_dados) {

                    $quantidade++;

                }

            }

            return $quantidade;

            $conexao_sql_station21 = NULL;

        }

    }

?>