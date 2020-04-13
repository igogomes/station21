<?php

    //Classe GerenciarCurso.class.php
    //Classe para provimento dos métodos destinados ao gerenciamento de informações relacionadas a cursos

    include_once "Autoload.inc";

    class GerenciarCurso {

        //Método gerarTabelaCursos()
        //Método para geração de tabela simples contendo todos os cursos cadastrados
        public function gerarTabelaCursos() {

            $tabela_cursos = "";
            $cod_curso = "";
            $titulo = "";
            $cod_instrutor = "";
            $nome_instrutor = "";
            $ultima_atualizacao = "";
            $data_ultima_atualizacao = "";
            $cod_status = "";
            $status = "";

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_gerar_tabela_cursos = new SqlSelect();
            $sql_gerar_tabela_cursos -> adicionarColuna("*");
            $sql_gerar_tabela_cursos -> setEntidade("Curso");

            $criterio_gerar_tabela_cursos = new Criterio();
            $criterio_gerar_tabela_cursos -> setPropriedade("ORDER", "curso.titulo ASC");
        
            $sql_gerar_tabela_cursos -> setCriterio($criterio_gerar_tabela_cursos);

            $localizar_cursos = $conexao_sql_station21 -> query($sql_gerar_tabela_cursos -> getInstrucao());

            while($linhas_cursos = $localizar_cursos -> fetch(PDO::FETCH_ASSOC)) {

                $cod_curso = $linhas_cursos["cod_curso"];
                $titulo = utf8_encode($linhas_cursos["titulo"]);
                $cod_instrutor = $linhas_cursos["cod_instrutor"];

                $nome_instrutor = new GerenciarUsuario();
                $nome_instrutor = $nome_instrutor -> getNomePorCodigoUsuario($cod_instrutor);

                $ultima_atualizacao = $linhas_cursos["ultima_atualizacao"];

                $data_ultima_atualizacao = new GerenciarData();
                $data_ultima_atualizacao = $data_ultima_atualizacao -> gerarDataBR($ultima_atualizacao);

                $cod_status = $linhas_cursos["cod_status"];

                $status = new GerenciarStatus();
                $status = $status -> getStatusPorCodigo($cod_status);

                $tabela_cursos .= "<tr> 
                                        <td>" . $titulo . "</td> 
                                        <td>" . $nome_instrutor . "</td> 
                                        <td>" . $data_ultima_atualizacao . "</td> 
                                        <td>" . $status . "</td> 
                                        <td> 
                                            <a href=\"edit-course?cod-course=$cod_curso\">
                                                <button class=\"btn btn-default btn-xs m-r-5\" data-toggle=\"tooltip\" data-original-title=\"Editar\">
                                                    <i class=\"fa fa-pencil font-14\"></i>
                                                </button>
                                            </a>
                                            <a href=\"courses?cod-delete-course=$cod_curso&delete-course=1\">
                                                <button class=\"btn btn-default btn-xs\" data-toggle=\"tooltip\" data-original-title=\"Excluir\">
                                                    <i class=\"fa fa-trash font-14\"></i>
                                                </button> 
                                            </a>
                                        </td>
                                    </tr>";

            }

            return $tabela_cursos;

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

    }

?>