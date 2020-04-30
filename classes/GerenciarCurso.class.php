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

        //Método excluirCurso() 
        //Método para exclusão de curso da base de dados
        //@param $cod_curso - código do curso do qual os dados serão excluidos da base de dados
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

    }

?>