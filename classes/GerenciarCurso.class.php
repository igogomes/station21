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

                $verificar_exercicios = new GerenciarExercicio();
                $verificar_exercicios = $verificar_exercicios -> verificarExerciciosCursos($cod_curso);

                if($verificar_exercicios < 4) {

                    $atualizar_status = $this::atualizarStatusCurso($cod_curso, 2);

                }

                $titulo = utf8_encode($linhas_cursos["titulo"]);
                $cod_instrutor = $linhas_cursos["cod_instrutor"];

                $nome_instrutor = new GerenciarUsuario();
                $nome_instrutor = utf8_encode($nome_instrutor -> getNomePorCodigoUsuario($cod_instrutor));

                $ultima_atualizacao = $linhas_cursos["ultima_atualizacao"];

                $data_ultima_atualizacao = new GerenciarData();
                $data_ultima_atualizacao = $data_ultima_atualizacao -> gerarDataBR($ultima_atualizacao);

                $cod_status = $linhas_cursos["cod_status"];

                $status = new GerenciarStatus();
                $status = utf8_encode($status -> getStatusPorCodigo($cod_status));

                $tabela_cursos .= "<tr> 
                                        <td>" . $titulo . "</td> 
                                        <td>" . $nome_instrutor . "</td> 
                                        <td>" . $data_ultima_atualizacao . "</td> 
                                        <td>" . $status . "</td> 
                                        <td> 
                                            <a href=\"overview-course?cod-course=$cod_curso\">
                                                <button class=\"btn btn-default btn-xs m-r-5\" data-toggle=\"tooltip\" data-original-title=\"Visualizar\">
                                                    <i class=\"fa fa-eye font-14\"></i>
                                                </button>
                                            </a>
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

        //Método setCurso
        //Método para o cadastro de curso na base de dados
        //@param $titulo - título do curso a ser cadastrado
        //@param $instrutor - código do instrutor responsável pelo curso a ser cadastrado
        //@param $status - status do curso a ser cadastrado
        //@param $categoria - categoria do curso a ser cadastrado
        //@param $palavras_chave - relação de palavras-chave relacionadas ao curso a ser cadastrado
        //@param $apresentacao - apresentação sobre o curso a ser cadastrado
        public function setCurso($titulo, $instrutor, $status, $categoria, $palavras_chave, $apresentacao) {

            date_default_timezone_set('America/Sao_Paulo');

            $titulo = utf8_decode($titulo);
            $titulo = ucwords($titulo);
            $palavras_chave = utf8_decode($palavras_chave);
            $apresentacao = utf8_decode($apresentacao);
            $ultima_atualizacao = date('Y-m-d H:i:s', time());

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_cadastrar_curso = new SqlInsert();
            $sql_cadastrar_curso -> setEntidade("Curso");
            $sql_cadastrar_curso -> setValorLinha("titulo", "$titulo");
            $sql_cadastrar_curso -> setValorLinha("cod_instrutor", $instrutor);
            $sql_cadastrar_curso -> setValorLinha("cod_status", $status);
            $sql_cadastrar_curso -> setValorLinha("cod_categoria", $categoria);
            $sql_cadastrar_curso -> setValorLinha("palavras_chave", "$palavras_chave");
            $sql_cadastrar_curso -> setValorLinha("apresentacao", "$apresentacao");
            $sql_cadastrar_curso -> setValorLinha("ultima_atualizacao", "$ultima_atualizacao");

            $cadastrar_curso = $conexao_sql_station21 -> query($sql_cadastrar_curso -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método getCodigoCursoPorTitulo
        //Retorna o código do curso através do título do mesmo
        //@param $titulo - título do curso do qual o código será recuperado
        public function getCodigoCursoPorTitulo($titulo) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $cod_curso = "";
            $titulo = utf8_decode($titulo);

            $sql_cod_curso = new SqlSelect();
            $sql_cod_curso -> adicionarColuna("cod_curso, titulo");
            $sql_cod_curso -> setEntidade("Curso");

            $criterio_cod_curso = new Criterio();
            $criterio_cod_curso -> adicionar(new Filtro("titulo", "=", "'{$titulo}'"));

            $sql_cod_curso -> setCriterio($criterio_cod_curso);

            $localizar_cod_curso = $conexao_sql_station21 -> query($sql_cod_curso -> getInstrucao());

            while($linhas_cod_curso = $localizar_cod_curso -> fetch(PDO::FETCH_ASSOC)) {

                $cod_curso = $linhas_cod_curso["cod_curso"];

            }

            return $cod_curso;

            $conexao_sql_station21 = NULL;

        }

        //Método verificarCursoExistente
        //Avalia se curso já se encontra cadastrado no sistema
        //@param $titulo - título do curso para o qual a verificação será realizada
        public function verificarCursoExistente($titulo) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $titulo_base_dados = "";
            $quantidade = 0;
            $titulo = utf8_decode($titulo);

            $sql_verificar_curso = new SqlSelect();
            $sql_verificar_curso -> adicionarColuna("titulo");
            $sql_verificar_curso -> setEntidade("Curso");

            $criterio_verificar_curso = new Criterio();
            $criterio_verificar_curso -> adicionar(new Filtro("titulo", "=", "'{$titulo}'"));

            $sql_verificar_curso -> setCriterio($criterio_verificar_curso);

            $localizar_curso = $conexao_sql_station21 -> query($sql_verificar_curso -> getInstrucao());

            while($linhas_verificar_curso = $localizar_curso -> fetch(PDO::FETCH_ASSOC)) {

                $titulo_base_dados = $linhas_verificar_curso["titulo"];

                if($titulo == $titulo_base_dados) {

                    $quantidade++;

                }

            }

            return $quantidade;

            $conexao_sql_station21 = NULL;

        }

        //Método getTituloCursoPorCodigo
        //Retorna o título do curso através do código do mesmo
        //@param $cod_curso - código do curso do qual o título será recuperado
        public function getTituloCursoPorCodigo($cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $titulo_curso = "";

            $sql_titulo_curso = new SqlSelect();
            $sql_titulo_curso -> adicionarColuna("cod_curso, titulo");
            $sql_titulo_curso -> setEntidade("Curso");

            $criterio_titulo_curso = new Criterio();
            $criterio_titulo_curso -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $sql_titulo_curso -> setCriterio($criterio_titulo_curso);

            $localizar_titulo_curso = $conexao_sql_station21 -> query($sql_titulo_curso -> getInstrucao());

            while($linhas_titulo_curso = $localizar_titulo_curso -> fetch(PDO::FETCH_ASSOC)) {

                $titulo_curso = utf8_encode($linhas_titulo_curso["titulo"]);

            }

            return $titulo_curso;

            $conexao_sql_station21 = NULL;

        }

        //Método getCodigoInstrutorPorCodigoCurso
        //Retorna código do instrutor do curso através do código deste
        //@param $cod_curso - código do curso do qual o código do instrutor será recuperado
        public function getCodigoInstrutorPorCodigoCurso($cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $cod_instrutor = "";

            $sql_cod_instrutor_curso = new SqlSelect();
            $sql_cod_instrutor_curso -> adicionarColuna("cod_curso, cod_instrutor");
            $sql_cod_instrutor_curso -> setEntidade("Curso");

            $criterio_cod_instrutor_curso = new Criterio();
            $criterio_cod_instrutor_curso -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $sql_cod_instrutor_curso -> setCriterio($criterio_cod_instrutor_curso);

            $localizar_cod_instrutor_curso = $conexao_sql_station21 -> query($sql_cod_instrutor_curso -> getInstrucao());

            while($linhas_cod_instrutor_curso = $localizar_cod_instrutor_curso -> fetch(PDO::FETCH_ASSOC)) {

                $cod_instrutor = utf8_encode($linhas_cod_instrutor_curso["cod_instrutor"]);

            }

            return $cod_instrutor;

            $conexao_sql_station21 = NULL;

        }

        //Método getInstrutorCursoPorCodigo
        //Retorna o instrutor do curso através do código do mesmo
        //@param $cod_curso - código do curso do qual o instrutor será recuperado
        public function getInstrutorCursoPorCodigo($cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $cod_instrutor = "";

            $sql_instrutor_curso = new SqlSelect();
            $sql_instrutor_curso -> adicionarColuna("cod_curso, cod_instrutor");
            $sql_instrutor_curso -> setEntidade("Curso");

            $criterio_instrutor_curso = new Criterio();
            $criterio_instrutor_curso -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $sql_instrutor_curso -> setCriterio($criterio_instrutor_curso);

            $localizar_instrutor_curso = $conexao_sql_station21 -> query($sql_instrutor_curso -> getInstrucao());

            while($linhas_instrutor_curso = $localizar_instrutor_curso -> fetch(PDO::FETCH_ASSOC)) {

                $cod_instrutor = utf8_encode($linhas_instrutor_curso["cod_instrutor"]);

            }

            return $cod_instrutor;

            $conexao_sql_station21 = NULL;

        }

        //Método getStatusCursoPorCodigo
        //Retorna o status do curso através do código do mesmo
        //@param $cod_curso - código do curso do qual o status será recuperado
        public function getStatusCursoPorCodigo($cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $cod_status = "";

            $sql_status_curso = new SqlSelect();
            $sql_status_curso -> adicionarColuna("cod_curso, cod_status");
            $sql_status_curso -> setEntidade("Curso");

            $criterio_status_curso = new Criterio();
            $criterio_status_curso -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $sql_status_curso -> setCriterio($criterio_status_curso);

            $localizar_status_curso = $conexao_sql_station21 -> query($sql_status_curso -> getInstrucao());

            while($linhas_status_curso = $localizar_status_curso -> fetch(PDO::FETCH_ASSOC)) {

                $cod_status = utf8_encode($linhas_status_curso["cod_status"]);

            }

            return $cod_status;

            $conexao_sql_station21 = NULL;

        }

        //Método getCategoriaCursoPorCodigo
        //Retorna a categoria do curso através do código do mesmo
        //@param $cod_curso - código do curso do qual a categoria será recuperada
        public function getCategoriaCursoPorCodigo($cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $cod_categoria = "";

            $sql_categoria_curso = new SqlSelect();
            $sql_categoria_curso -> adicionarColuna("cod_curso, cod_categoria");
            $sql_categoria_curso -> setEntidade("Curso");

            $criterio_categoria_curso = new Criterio();
            $criterio_categoria_curso -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $sql_categoria_curso -> setCriterio($criterio_categoria_curso);

            $localizar_categoria_curso = $conexao_sql_station21 -> query($sql_categoria_curso -> getInstrucao());

            while($linhas_categoria_curso = $localizar_categoria_curso -> fetch(PDO::FETCH_ASSOC)) {

                $cod_categoria = utf8_encode($linhas_categoria_curso["cod_categoria"]);

            }

            return $cod_categoria;

            $conexao_sql_station21 = NULL;

        }

        //Método getPalavrasChaveCursoPorCodigo
        //Retorna a palavras chave do curso através do código do mesmo
        //@param $cod_curso - código do curso do qual as palavras chave serão recuperadas
        public function getPalavrasChaveCursoPorCodigo($cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $palavras_chave = "";

            $sql_palavras_chave_curso = new SqlSelect();
            $sql_palavras_chave_curso -> adicionarColuna("cod_curso, palavras_chave");
            $sql_palavras_chave_curso -> setEntidade("Curso");

            $criterio_palavras_chave_curso = new Criterio();
            $criterio_palavras_chave_curso -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $sql_palavras_chave_curso -> setCriterio($criterio_palavras_chave_curso);

            $localizar_palavras_chave_curso = $conexao_sql_station21 -> query($sql_palavras_chave_curso -> getInstrucao());

            while($linhas_palavras_chave_curso = $localizar_palavras_chave_curso -> fetch(PDO::FETCH_ASSOC)) {

                $palavras_chave = utf8_encode($linhas_palavras_chave_curso["palavras_chave"]);

            }

            return $palavras_chave;

            $conexao_sql_station21 = NULL;

        }

        //Método getApresentacaoCursoPorCodigo
        //Retorna a apresentação do curso através do código do mesmo
        //@param $cod_curso - código do curso do qual a apresentação será recuperadas
        public function getApresentacaoCursoPorCodigo($cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $apresentacao = "";

            $sql_apresentacao_curso = new SqlSelect();
            $sql_apresentacao_curso -> adicionarColuna("cod_curso, apresentacao");
            $sql_apresentacao_curso -> setEntidade("Curso");

            $criterio_apresentacao_curso = new Criterio();
            $criterio_apresentacao_curso -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $sql_apresentacao_curso -> setCriterio($criterio_apresentacao_curso);

            $localizar_apresentacao_curso = $conexao_sql_station21 -> query($sql_apresentacao_curso -> getInstrucao());

            while($linhas_apresentacao_curso = $localizar_apresentacao_curso -> fetch(PDO::FETCH_ASSOC)) {

                $apresentacao = utf8_encode($linhas_apresentacao_curso["apresentacao"]);

            }

            return $apresentacao;

            $conexao_sql_station21 = NULL;

        }

        //Método atualizarStatusCurso()
        //Método para atualização do status do curso, para determinar se o mesmo está publicado ou não
        //@param $cod_curso - código da curso para o qual o status será alterado
        //@param $status - código do status para alteração
        public function atualizarStatusCurso($cod_curso, $status) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_atualizar_status_curso = new SqlUpdate();
            $sql_atualizar_status_curso -> setEntidade("Curso");
            $sql_atualizar_status_curso -> setValorLinha("cod_status", "{$status}");

            $criterio_atualizar_status_curso = new Criterio();
            $criterio_atualizar_status_curso -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $sql_atualizar_status_curso -> setCriterio($criterio_atualizar_status_curso);

            $atualizar_status_curso = $conexao_sql_station21 -> query($sql_atualizar_status_curso -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método atualizarDadosCurso()
        //Método para atualização dos dados de cursos na base de dados
        //@param $cod_curso - código do curso do qual os dados serão alterados
        //@param $titulo - título do curso para atualização na base de dados
        //@param $cod_instrutor - código do instrutor do curso para atualização na base de dados
        //@param $cod_status - código do status do curso para atualização na base de dados
        //@param $cod_categoria - código da categoria do curso para atualização na base de dados
        //@param $palavras_chave - palavras chave do curso para atualização na base de dados
        //@param $apresentacao - apresentação do curso para atualização na base de dados
        public function atualizarDadosUsuario($cod_curso, $titulo, $cod_instrutor, $cod_status, $cod_categoria, $palavras_chave, $apresentacao) {

            $titulo = utf8_decode($titulo);
            $palavras_chave = utf8_decode($palavras_chave);
            $apresentacao = utf8_decode($apresentacao);
            $ultima_atualizacao = date("Y-m-d H:i:s");

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_atualizar_dados_curso = new SqlUpdate();
            $sql_atualizar_dados_curso -> setEntidade("Curso");
            $sql_atualizar_dados_curso -> setValorLinha("titulo", "{$titulo}");
            $sql_atualizar_dados_curso -> setValorLinha("cod_instrutor", "{$cod_instrutor}");
            $sql_atualizar_dados_curso -> setValorLinha("cod_status", "$cod_status");
            $sql_atualizar_dados_curso -> setValorLinha("cod_categoria", "$cod_categoria");
            $sql_atualizar_dados_curso -> setValorLinha("palavras_chave", "$palavras_chave");
            $sql_atualizar_dados_curso -> setValorLinha("apresentacao", "$apresentacao");
            $sql_atualizar_dados_curso -> setValorLinha("ultima_atualizacao", "$ultima_atualizacao");

            $criterio_atualizar_dados_curso = new Criterio();
            $criterio_atualizar_dados_curso -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $sql_atualizar_dados_curso -> setCriterio($criterio_atualizar_dados_curso);

            $atualizar_dados_curso = $conexao_sql_station21 -> query($sql_atualizar_dados_curso -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método excluirCurso() 
        //Método para exclusão de curso da base de dados
        //@param $cod_curso - código do curso do qual os dados serão excluídos da base de dados
        public function excluirCurso($cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_excluir_curso = new SqlDelete();

            $sql_excluir_curso -> setEntidade("Curso");

            $criterio_excluir_curso = new Criterio();
            $criterio_excluir_curso -> adicionar(new Filtro("cod_curso", "=", "'$cod_curso'"));

            $sql_excluir_curso -> setCriterio($criterio_excluir_curso);

            $excluir_curso = $conexao_sql_station21 -> query($sql_excluir_curso -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método getQuantidadeCursos
        //Retorna a quantidade de cursos cadastrados na base de dados
        public function getQuantidadeCursos() {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $quantidade_cursos = "";

            $sql_quantidade_cursos = new SqlSelect();
            $sql_quantidade_cursos -> adicionarColuna("cod_curso");
            $sql_quantidade_cursos -> setEntidade("Curso");

            $localizar_cursos = $conexao_sql_station21 -> query($sql_quantidade_cursos -> getInstrucao());

            while($linhas_quantidade_cursos = $localizar_cursos -> fetch(PDO::FETCH_ASSOC)) {

                $quantidade_cursos++;

            }

            return $quantidade_cursos;

            $conexao_sql_station21 = NULL;

        }

        //Método gerarTabelaUltimosCursosCadastrados
        //Retorna lista contendo os cinco últimos cursos cadastrados na base de dados
        public function gerarTabelaUltimosCursosCadastrados() {

            $tabela_ultimos_cursos_cadastrados = "";
            $titulo_curso = "";
            $ultima_atualizacao = "";
            $cod_status = "";

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_gerar_tabela_ultimos_cursos_cadastrados = new SqlSelect();
            $sql_gerar_tabela_ultimos_cursos_cadastrados -> adicionarColuna("*");
            $sql_gerar_tabela_ultimos_cursos_cadastrados -> setEntidade("Curso");

            $criterio_gerar_tabela_ultimos_cursos_cadastrados = new Criterio();
            $criterio_gerar_tabela_ultimos_cursos_cadastrados -> setPropriedade("ORDER", "Curso.cod_curso DESC");
            $criterio_gerar_tabela_ultimos_cursos_cadastrados -> setPropriedade("LIMIT", 5);
    
            $sql_gerar_tabela_ultimos_cursos_cadastrados -> setCriterio($criterio_gerar_tabela_ultimos_cursos_cadastrados);

            $localizar_ultimos_cursos_cadastrados = $conexao_sql_station21 -> query($sql_gerar_tabela_ultimos_cursos_cadastrados -> getInstrucao());

            while($linhas_ultimos_cursos_cadastrados = $localizar_ultimos_cursos_cadastrados -> fetch(PDO::FETCH_ASSOC)) {

                $titulo_curso = utf8_encode($linhas_ultimos_cursos_cadastrados["titulo"]);
                $ultima_atualizacao = $linhas_ultimos_cursos_cadastrados["ultima_atualizacao"];
                $cod_status = $linhas_ultimos_cursos_cadastrados["cod_status"];

                $data_hora_atualizacao_br = new GerenciarData();
                $data_hora_atualizacao_br = $data_hora_atualizacao_br -> gerarDataBR($ultima_atualizacao);

                $status = new GerenciarStatus(); 
                $status = utf8_encode($status -> getStatusPorCodigo($cod_status));

                $tabela_ultimos_cursos_cadastrados .= "<tr> <td>" . $titulo_curso . "</td> <td>" . $data_hora_atualizacao_br . "</td> <td>" . $status . "</td> </tr>";

            }

            return $tabela_ultimos_cursos_cadastrados;

            $conexao_sql_station21 = NULL; 

        }

        //Método gerarTabelaNovosCursos
        //Retorna lista contendo os cinco últimos cursos cadastrados na base de dados
        public function gerarTabelaNovosCursos() {

            $tabela_novos_cursos = "";
            $cod_curso = "";
            $titulo_curso = "";
            $cod_instrutor = "";

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_gerar_tabela_novos_cursos = new SqlSelect();
            $sql_gerar_tabela_novos_cursos -> adicionarColuna("*");
            $sql_gerar_tabela_novos_cursos -> setEntidade("Curso");

            $criterio_gerar_tabela_novos_cursos = new Criterio();
            $criterio_gerar_tabela_novos_cursos -> setPropriedade("ORDER", "Curso.cod_curso DESC");
            $criterio_gerar_tabela_novos_cursos -> setPropriedade("LIMIT", 5);
    
            $sql_gerar_tabela_novos_cursos -> setCriterio($criterio_gerar_tabela_novos_cursos);

            $localizar_novos_cursos = $conexao_sql_station21 -> query($sql_gerar_tabela_novos_cursos -> getInstrucao());

            while($linhas_novos_cursos = $localizar_novos_cursos -> fetch(PDO::FETCH_ASSOC)) {

                $cod_curso = $linhas_novos_cursos["cod_curso"];
                $titulo_curso = utf8_encode($linhas_novos_cursos["titulo"]);
                $cod_instrutor = $linhas_novos_cursos["cod_instrutor"];

                $avaliacao = new GerenciarAvaliacao();
                $avaliacao = $avaliacao -> getAvaliacaoPorCodigoCurso($cod_curso);

                $nome_instrutor = new GerenciarUsuario();
                $nome_instrutor = utf8_encode($nome_instrutor -> getNomePorCodigoUsuario($cod_instrutor));

                $tabela_novos_cursos .= 
                    "<tr>   
                        <td>" . $titulo_curso . "</td> 
                        <td>" . $nome_instrutor . "</td> 
                        <td>" . $avaliacao . "</td> 
                        <td>  
                            <a href=\"overview-course?cod-course=$cod_curso\">
                                <button class=\"btn btn-default btn-xs m-r-5\" data-toggle=\"tooltip\" data-original-title=\"Conferir conteúdo\">
                                    <i class=\"fa fa-eye font-14\"></i>
                                </button>
                            </a>
                            <a href=\"subscribe-course?cod-course=$cod_curso\">
                                <button class=\"btn btn-default btn-xs m-r-5\" data-toggle=\"tooltip\" data-original-title=\"Inscreva-se\">
                                    <i class=\"fa fa-plus font-14\"></i>
                                </button>
                            </a>
                        </td> 
                    </tr>";
 
            }

            return $tabela_novos_cursos;

            $conexao_sql_station21 = NULL; 

        }

        //Método gerarTabelaOutrosCursos
        //Retorna lista contendo os cinco primeiros cursos cadastrados na base de dados
        public function gerarTabelaOutrosCursos() {

            $tabela_outros_cursos = "";
            $cod_curso = "";
            $titulo_curso = "";
            $cod_instrutor = "";

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_gerar_tabela_outros_cursos = new SqlSelect();
            $sql_gerar_tabela_outros_cursos -> adicionarColuna("*");
            $sql_gerar_tabela_outros_cursos -> setEntidade("Curso");

            $criterio_gerar_tabela_outros_cursos = new Criterio();
            $criterio_gerar_tabela_outros_cursos -> setPropriedade("ORDER", "Curso.cod_curso ASC");
            $criterio_gerar_tabela_outros_cursos -> setPropriedade("LIMIT", 5);
    
            $sql_gerar_tabela_outros_cursos -> setCriterio($criterio_gerar_tabela_outros_cursos);

            $localizar_outros_cursos = $conexao_sql_station21 -> query($sql_gerar_tabela_outros_cursos -> getInstrucao());

            while($linhas_outros_cursos = $localizar_outros_cursos -> fetch(PDO::FETCH_ASSOC)) {

                $cod_curso = $linhas_outros_cursos["cod_curso"];
                $titulo_curso = utf8_encode($linhas_outros_cursos["titulo"]);
                $cod_instrutor = $linhas_outros_cursos["cod_instrutor"];

                $avaliacao = new GerenciarAvaliacao();
                $avaliacao = $avaliacao -> getAvaliacaoPorCodigoCurso($cod_curso);

                $nome_instrutor = new GerenciarUsuario();
                $nome_instrutor = utf8_encode($nome_instrutor -> getNomePorCodigoUsuario($cod_instrutor));

                $tabela_outros_cursos .= 
                    "<tr>   
                        <td>" . $titulo_curso . "</td> 
                        <td>" . $nome_instrutor . "</td> 
                        <td>" . $avaliacao . "</td> 
                        <td>  
                            <a href=\"overview-course?cod-course=$cod_curso\">
                                <button class=\"btn btn-default btn-xs m-r-5\" data-toggle=\"tooltip\" data-original-title=\"Conferir conteúdo\">
                                    <i class=\"fa fa-eye font-14\"></i>
                                </button>
                            </a>
                            <a href=\"subscribe-course?cod-course=$cod_curso\">
                                <button class=\"btn btn-default btn-xs m-r-5\" data-toggle=\"tooltip\" data-original-title=\"Inscreva-se\">
                                    <i class=\"fa fa-plus font-14\"></i>
                                </button>
                            </a>
                        </td> 
                    </tr>";
 
            }

            return $tabela_outros_cursos;

            $conexao_sql_station21 = NULL; 

        }

        //Método gerarTabelaMeusCursos
        //Retorna lista contendo os cinco primeiros cursos cadastrados na base de dados e
        //nos quais o usuário é inscrito
        //@param $cod_usuario - código do usuário para o qual as inscrições em cursos serão recuperadas
        public function gerarTabelaMeusCursos($cod_usuario) {

            $tabela_meus_cursos = "";
            $cod_curso = "";
            $titulo_curso = "";
            $cod_instrutor = "";

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_gerar_tabela_meus_cursos = new SqlSelect();
            $sql_gerar_tabela_meus_cursos -> adicionarColuna("*");
            $sql_gerar_tabela_meus_cursos -> setEntidade("Inscricao");

            $criterio_gerar_tabela_meus_cursos = new Criterio();
            $criterio_gerar_tabela_meus_cursos -> setPropriedade("ORDER", "Inscricao.cod_curso ASC");
            $criterio_gerar_tabela_meus_cursos -> setPropriedade("LIMIT", 5);
            $criterio_gerar_tabela_meus_cursos -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));
    
            $sql_gerar_tabela_meus_cursos -> setCriterio($criterio_gerar_tabela_meus_cursos);

            $localizar_meus_cursos = $conexao_sql_station21 -> query($sql_gerar_tabela_meus_cursos -> getInstrucao());

            while($linhas_meus_cursos = $localizar_meus_cursos -> fetch(PDO::FETCH_ASSOC)) {

                $cod_curso = $linhas_meus_cursos["cod_curso"];
                
                $titulo_curso = $this::getTituloCursoPorCodigo($cod_curso);
                
                $cod_instrutor = $this::getCodigoInstrutorPorCodigoCurso($cod_curso);

                $nome_instrutor = new GerenciarUsuario();
                $nome_instrutor = utf8_encode($nome_instrutor -> getNomePorCodigoUsuario($cod_instrutor));

                $presenca = new GerenciarPresenca();
                $presenca = $presenca -> getPresencaPorCodigoUsuarioECodigoCurso($cod_usuario, $cod_curso);

                $tabela_meus_cursos .= 
                    "<tr>   
                        <td>" . $titulo_curso . "</td> 
                        <td>" . $nome_instrutor . "</td> 
                        <td>" . $presenca . "</td> 
                        <td>  
                            <a href=\"view-course?cod-course=$cod_curso\">
                                <button class=\"btn btn-default btn-xs m-r-5\" data-toggle=\"tooltip\" data-original-title=\"Acessar Curso\">
                                    <i class=\"fa fa-eye font-14\"></i>
                                </button>
                            </a>
                            <a href=\"unsubscribe-course?cod-course=$cod_curso\">
                                <button class=\"btn btn-default btn-xs m-r-5\" data-toggle=\"tooltip\" data-original-title=\"Remover Inscrição\">
                                    <i class=\"fa fa-minus font-14\"></i>
                                </button>
                            </a>
                        </td> 
                    </tr>";
 
            }

            return $tabela_meus_cursos;

            $conexao_sql_station21 = NULL; 

        }

        //Método gerarTabelaCompletaNovosCursos()
        //Retorna lista contendo todos os cursos cadastrados na base de dados, ordenados do mais
        //recentemente cadastrado até o primeiro curso cadastrado
        public function gerarTabelaCompletaNovosCursos() {

            $tabela_novos_cursos = "";
            $cod_curso = "";
            $titulo_curso = "";
            $cod_instrutor = "";

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_gerar_tabela_novos_cursos = new SqlSelect();
            $sql_gerar_tabela_novos_cursos -> adicionarColuna("*");
            $sql_gerar_tabela_novos_cursos -> setEntidade("Curso");

            $criterio_gerar_tabela_novos_cursos = new Criterio();
            $criterio_gerar_tabela_novos_cursos -> setPropriedade("ORDER", "Curso.cod_curso DESC");
    
            $sql_gerar_tabela_novos_cursos -> setCriterio($criterio_gerar_tabela_novos_cursos);

            $localizar_novos_cursos = $conexao_sql_station21 -> query($sql_gerar_tabela_novos_cursos -> getInstrucao());

            while($linhas_novos_cursos = $localizar_novos_cursos -> fetch(PDO::FETCH_ASSOC)) {

                $cod_curso = $linhas_novos_cursos["cod_curso"];
                $titulo_curso = utf8_encode($linhas_novos_cursos["titulo"]);
                $cod_instrutor = $linhas_novos_cursos["cod_instrutor"];

                $avaliacao = new GerenciarAvaliacao();
                $avaliacao = $avaliacao -> getAvaliacaoPorCodigoCurso($cod_curso);

                $nome_instrutor = new GerenciarUsuario();
                $nome_instrutor = utf8_encode($nome_instrutor -> getNomePorCodigoUsuario($cod_instrutor));

                $tabela_novos_cursos .= 
                    "<tr>   
                        <td>" . $titulo_curso . "</td> 
                        <td>" . $nome_instrutor . "</td> 
                        <td>" . $avaliacao . "</td> 
                        <td>  
                            <a href=\"overview-course?cod-course=$cod_curso\">
                                <button class=\"btn btn-default btn-xs m-r-5\" data-toggle=\"tooltip\" data-original-title=\"Conferir conteúdo\">
                                    <i class=\"fa fa-eye font-14\"></i>
                                </button>
                            </a>
                            <a href=\"subscribe-course?cod-course=$cod_curso\">
                                <button class=\"btn btn-default btn-xs m-r-5\" data-toggle=\"tooltip\" data-original-title=\"Inscreva-se\">
                                    <i class=\"fa fa-plus font-14\"></i>
                                </button>
                            </a>
                        </td> 
                    </tr>";
 
            }

            return $tabela_novos_cursos;

            $conexao_sql_station21 = NULL;

        }

        //Método gerarTabelaCompletaOutrosCursos()
        //Retorna lista contendo todos os cursos cadastrados na base de dados, ordenados por ordem
        //de cadastro
        public function gerarTabelaCompletaOutrosCursos() {

            $tabela_outros_cursos = "";
            $cod_curso = "";
            $titulo_curso = "";
            $cod_instrutor = "";

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_gerar_tabela_outros_cursos = new SqlSelect();
            $sql_gerar_tabela_outros_cursos -> adicionarColuna("*");
            $sql_gerar_tabela_outros_cursos -> setEntidade("Curso");

            $criterio_gerar_tabela_outros_cursos = new Criterio();
            $criterio_gerar_tabela_outros_cursos -> setPropriedade("ORDER", "Curso.cod_curso ASC");
    
            $sql_gerar_tabela_outros_cursos -> setCriterio($criterio_gerar_tabela_outros_cursos);

            $localizar_outros_cursos = $conexao_sql_station21 -> query($sql_gerar_tabela_outros_cursos -> getInstrucao());

            while($linhas_outros_cursos = $localizar_outros_cursos -> fetch(PDO::FETCH_ASSOC)) {

                $cod_curso = $linhas_outros_cursos["cod_curso"];
                $titulo_curso = utf8_encode($linhas_outros_cursos["titulo"]);
                $cod_instrutor = $linhas_outros_cursos["cod_instrutor"];

                $avaliacao = new GerenciarAvaliacao();
                $avaliacao = $avaliacao -> getAvaliacaoPorCodigoCurso($cod_curso);

                $nome_instrutor = new GerenciarUsuario();
                $nome_instrutor = utf8_encode($nome_instrutor -> getNomePorCodigoUsuario($cod_instrutor));

                $tabela_outros_cursos .= 
                    "<tr>   
                        <td>" . $titulo_curso . "</td> 
                        <td>" . $nome_instrutor . "</td> 
                        <td>" . $avaliacao . "</td> 
                        <td>  
                            <a href=\"overview-course?cod-course=$cod_curso\">
                                <button class=\"btn btn-default btn-xs m-r-5\" data-toggle=\"tooltip\" data-original-title=\"Conferir conteúdo\">
                                    <i class=\"fa fa-eye font-14\"></i>
                                </button>
                            </a>
                            <a href=\"subscribe-course?cod-course=$cod_curso\">
                                <button class=\"btn btn-default btn-xs m-r-5\" data-toggle=\"tooltip\" data-original-title=\"Inscreva-se\">
                                    <i class=\"fa fa-plus font-14\"></i>
                                </button>
                            </a>
                        </td> 
                    </tr>";
 
            }

            return $tabela_outros_cursos;

            $conexao_sql_station21 = NULL;

        }

    }

?>