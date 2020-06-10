<?php

    //Classe GerenciarNota.class.php
    //Classe para provimento dos métodos destinados ao gerenciamento de informações relacionadas a notas

    include_once "Autoload.inc";

    class GerenciarNota {

        //Método setNota
        //Registra a nota para a atividade avaliativa realizada por um usuário
        //@param $cod_usuario - código do usuário para o qual a nota será registrada
        //@param $cod_curso - código do curso ao qual a atividade pertence
        //@param $cod_exercicio - código do exercício para o qual a nota será atribuída
        //@param $cod_prova - código da prova para a qual a nota será atribuída
        //@param $nota - valor da nota 
        public function setNota($cod_usuario, $cod_curso, $cod_exercicio, $cod_prova, $nota) {
            
            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_cadastrar_nota = new SqlInsert();
            $sql_cadastrar_nota -> setEntidade("Nota");
            $sql_cadastrar_nota -> setValorLinha("cod_usuario", "$cod_usuario");
            $sql_cadastrar_nota -> setValorLinha("cod_curso", $cod_curso);
            $sql_cadastrar_nota -> setValorLinha("cod_exercicio", $cod_exercicio);
            $sql_cadastrar_nota -> setValorLinha("cod_prova", $cod_prova);
            $sql_cadastrar_nota -> setValorLinha("nota", $nota);

            $cadastrar_nota = $conexao_sql_station21 -> query($sql_cadastrar_nota -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método verificarNotaExercicio
        //Verifica a existência de nota para uma atividade avaliativa associada a um usuário
        //@param $cod_usuario - código do usuário para o qual a verificação será realizada
        //@param $cod_curso - código do curso para o qual a verificação será realizada
        //@param $cod_exercicio - código do exercício para o qual a verificação será realizada
        public function verificarNotaExercicio($cod_usuario, $cod_curso, $cod_exercicio) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $quantidade = 0;

            $sql_verificar_nota = new SqlSelect();
            $sql_verificar_nota -> adicionarColuna("cod_usuario, cod_curso, cod_exercicio");
            $sql_verificar_nota -> setEntidade("Nota");

            $criterio_verificar_nota_1 = new Criterio();
            $criterio_verificar_nota_1 -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));

            $criterio_verificar_nota_2 = new Criterio();
            $criterio_verificar_nota_2 -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $criterio_verificar_nota_3 = new Criterio();
            $criterio_verificar_nota_3 -> adicionar(new Filtro("cod_exercicio", "=", "'{$cod_exercicio}'"));

            $criterio_verificar_nota = new Criterio();
            $criterio_verificar_nota -> adicionar($criterio_verificar_nota_1, Expressao::OPERADOR_AND);
            $criterio_verificar_nota -> adicionar($criterio_verificar_nota_2, Expressao::OPERADOR_AND); 
            $criterio_verificar_nota -> adicionar($criterio_verificar_nota_3, Expressao::OPERADOR_AND);

            $sql_verificar_nota -> setCriterio($criterio_verificar_nota);

            $localizar_nota = $conexao_sql_station21 -> query($sql_verificar_nota -> getInstrucao());

            while($linhas_verificar_nota = $localizar_nota -> fetch(PDO::FETCH_ASSOC)) {

                $quantidade++;

            }

            return $quantidade;

            $conexao_sql_station21 = NULL;

        }

        //Método atualizarNotaExercicio
        //Método para atualização da nota do exercício realizado pelo usuário
        //@param $cod_usuario - código do usuário para o qual a nota será atualizada
        //@param $cod_curso - código do curso ao qual o exercício está associado
        //@param $cod_exercicio - código do exercício realizado pelo usuário
        //@param $nota - nota obtida pelo usuário
        public function atualizarNotaExercicio($cod_usuario, $cod_curso, $cod_exercicio, $nota) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_atualizar_nota_exercicio = new SqlUpdate();
            $sql_atualizar_nota_exercicio -> setEntidade("Nota");
            $sql_atualizar_nota_exercicio -> setValorLinha("nota", "{$nota}");

            $criterio_atualizar_nota_exercicio_1 = new Criterio();
            $criterio_atualizar_nota_exercicio_1 -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));

            $criterio_atualizar_nota_exercicio_2 = new Criterio();
            $criterio_atualizar_nota_exercicio_2 -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $criterio_atualizar_nota_exercicio_3 = new Criterio();
            $criterio_atualizar_nota_exercicio_3 -> adicionar(new Filtro("cod_exercicio", "=", "'{$cod_exercicio}'"));

            $criterio_atualizar_nota_exercicio = new Criterio();
            $criterio_atualizar_nota_exercicio -> adicionar($criterio_atualizar_nota_exercicio_1, Expressao::OPERADOR_AND);
            $criterio_atualizar_nota_exercicio -> adicionar($criterio_atualizar_nota_exercicio_2, Expressao::OPERADOR_AND); 
            $criterio_atualizar_nota_exercicio -> adicionar($criterio_atualizar_nota_exercicio_3, Expressao::OPERADOR_AND);

            $sql_atualizar_nota_exercicio -> setCriterio($criterio_atualizar_nota_exercicio);

            $atualizar_nota_exercicio = $conexao_sql_station21 -> query($sql_atualizar_nota_exercicio -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método getNotaExercicio
        //Retorna a nota de um exercício
        //@param $cod_usuario - código do usuário para o qual a nota foi atribuída
        //@param $cod_curso - código do curso ao qual o exercício está associado
        //@param $cod_exercicio - código do exercício ao qual a nota está associada
        public function getNotaExercicio($cod_usuario, $cod_curso, $cod_exercicio) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $nota = "";

            $sql_nota_exercicio = new SqlSelect();
            $sql_nota_exercicio -> adicionarColuna("cod_usuario, cod_curso, cod_exercicio, nota");
            $sql_nota_exercicio -> setEntidade("Nota");

            $criterio_nota_exercicio_1 = new Criterio();
            $criterio_nota_exercicio_1 -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));

            $criterio_nota_exercicio_2 = new Criterio();
            $criterio_nota_exercicio_2 -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $criterio_nota_exercicio_3 = new Criterio();
            $criterio_nota_exercicio_3 -> adicionar(new Filtro("cod_exercicio", "=", "'{$cod_exercicio}'"));

            $criterio_nota_exercicio = new Criterio();
            $criterio_nota_exercicio -> adicionar($criterio_nota_exercicio_1, Expressao::OPERADOR_AND);
            $criterio_nota_exercicio -> adicionar($criterio_nota_exercicio_2, Expressao::OPERADOR_AND); 
            $criterio_nota_exercicio -> adicionar($criterio_nota_exercicio_3, Expressao::OPERADOR_AND);

            $sql_nota_exercicio -> setCriterio($criterio_nota_exercicio);

            $localizar_nota_exercicio = $conexao_sql_station21 -> query($sql_nota_exercicio -> getInstrucao());

            while($linhas_nota_exercicio = $localizar_nota_exercicio -> fetch(PDO::FETCH_ASSOC)) {

                $nota = $linhas_nota_exercicio["nota"];

            }

            return $nota;

            $conexao_sql_station21 = NULL;

        }

        //Método verificarNotaProva
        //Verifica a existência de nota para uma atividade avaliativa associada a um usuário
        //@param $cod_usuario - código do usuário para o qual a verificação será realizada
        //@param $cod_curso - código do curso para o qual a verificação será realizada
        //@param $cod_prova - código da prova para a qual a verificação será realizada
        public function verificarNotaProva($cod_usuario, $cod_curso, $cod_prova) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $quantidade = 0;

            $sql_verificar_nota = new SqlSelect();
            $sql_verificar_nota -> adicionarColuna("cod_usuario, cod_curso, cod_prova");
            $sql_verificar_nota -> setEntidade("Nota");

            $criterio_verificar_nota_1 = new Criterio();
            $criterio_verificar_nota_1 -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));

            $criterio_verificar_nota_2 = new Criterio();
            $criterio_verificar_nota_2 -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $criterio_verificar_nota_3 = new Criterio();
            $criterio_verificar_nota_3 -> adicionar(new Filtro("cod_prova", "=", "'{$cod_prova}'"));

            $criterio_verificar_nota = new Criterio();
            $criterio_verificar_nota -> adicionar($criterio_verificar_nota_1, Expressao::OPERADOR_AND);
            $criterio_verificar_nota -> adicionar($criterio_verificar_nota_2, Expressao::OPERADOR_AND); 
            $criterio_verificar_nota -> adicionar($criterio_verificar_nota_3, Expressao::OPERADOR_AND);

            $sql_verificar_nota -> setCriterio($criterio_verificar_nota);

            $localizar_nota = $conexao_sql_station21 -> query($sql_verificar_nota -> getInstrucao());

            while($linhas_verificar_nota = $localizar_nota -> fetch(PDO::FETCH_ASSOC)) {

                $quantidade++;

            }

            return $quantidade;

            $conexao_sql_station21 = NULL;

        }

        //Método getNotaProva
        //Retorna a nota de uma prova
        //@param $cod_usuario - código do usuário para o qual a nota foi atribuída
        //@param $cod_curso - código do curso ao qual a prova está associada
        //@param $cod_prova - código da prova a qual a nota está associada
        public function getNotaProva($cod_usuario, $cod_curso, $cod_prova) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $nota = "";

            $sql_nota_prova = new SqlSelect();
            $sql_nota_prova -> adicionarColuna("cod_usuario, cod_curso, cod_prova, nota");
            $sql_nota_prova -> setEntidade("Nota");

            $criterio_nota_prova_1 = new Criterio();
            $criterio_nota_prova_1 -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));

            $criterio_nota_prova_2 = new Criterio();
            $criterio_nota_prova_2 -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $criterio_nota_prova_3 = new Criterio();
            $criterio_nota_prova_3 -> adicionar(new Filtro("cod_prova", "=", "'{$cod_prova}'"));

            $criterio_nota_prova = new Criterio();
            $criterio_nota_prova -> adicionar($criterio_nota_prova_1, Expressao::OPERADOR_AND);
            $criterio_nota_prova -> adicionar($criterio_nota_prova_2, Expressao::OPERADOR_AND); 
            $criterio_nota_prova -> adicionar($criterio_nota_prova_3, Expressao::OPERADOR_AND);

            $sql_nota_prova -> setCriterio($criterio_nota_prova);

            $localizar_nota_prova = $conexao_sql_station21 -> query($sql_nota_prova -> getInstrucao());

            while($linhas_nota_prova = $localizar_nota_prova -> fetch(PDO::FETCH_ASSOC)) {

                $nota = $linhas_nota_prova["nota"];

            }

            return $nota;

            $conexao_sql_station21 = NULL;

        }

        //Método atualizarNotaProva
        //Método para atualização da nota da prova realizada pelo usuário
        //@param $cod_usuario - código do usuário para o qual a nota será atualizada
        //@param $cod_curso - código do curso ao qual a prova está associada
        //@param $cod_prova - código da prova realizada pelo usuário
        //@param $nota - nota obtida pelo usuário
        public function atualizarNotaProva($cod_usuario, $cod_curso, $cod_prova, $nota) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_atualizar_nota_prova = new SqlUpdate();
            $sql_atualizar_nota_prova -> setEntidade("Nota");
            $sql_atualizar_nota_prova -> setValorLinha("nota", "{$nota}");

            $criterio_atualizar_nota_prova_1 = new Criterio();
            $criterio_atualizar_nota_prova_1 -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));

            $criterio_atualizar_nota_prova_2 = new Criterio();
            $criterio_atualizar_nota_prova_2 -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $criterio_atualizar_nota_prova_3 = new Criterio();
            $criterio_atualizar_nota_prova_3 -> adicionar(new Filtro("cod_prova", "=", "'{$cod_prova}'"));

            $criterio_atualizar_nota_prova = new Criterio();
            $criterio_atualizar_nota_prova -> adicionar($criterio_atualizar_nota_prova_1, Expressao::OPERADOR_AND);
            $criterio_atualizar_nota_prova -> adicionar($criterio_atualizar_nota_prova_2, Expressao::OPERADOR_AND); 
            $criterio_atualizar_nota_prova -> adicionar($criterio_atualizar_nota_prova_3, Expressao::OPERADOR_AND);

            $sql_atualizar_nota_prova -> setCriterio($criterio_atualizar_nota_prova);

            $atualizar_nota_prova = $conexao_sql_station21 -> query($sql_atualizar_nota_prova -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método getNotaCurso
        //Retorna a nota geral de um curso para um usuário
        //@param $cod_usuario - código do usuário para o qual a nota será verificada
        //@param $cod_curso - código do curso para o qual a nota será verificada
        public function getNotaCurso($cod_usuario, $cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $nota = 0;

            $sql_nota_curso_usuario = new SqlSelect();
            $sql_nota_curso_usuario -> adicionarColuna("cod_usuario, cod_curso, nota");
            $sql_nota_curso_usuario -> setEntidade("Nota");

            $criterio_nota_curso_usuario_1 = new Criterio();
            $criterio_nota_curso_usuario_1 -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));

            $criterio_nota_curso_usuario_2 = new Criterio();
            $criterio_nota_curso_usuario_2 -> adicionar(new Filtro("cod_curso", "=", "'{$cod_curso}'"));

            $criterio_nota_curso_usuario = new Criterio();
            $criterio_nota_curso_usuario -> adicionar($criterio_nota_curso_usuario_1, Expressao::OPERADOR_AND);
            $criterio_nota_curso_usuario -> adicionar($criterio_nota_curso_usuario_2, Expressao::OPERADOR_AND); 

            $sql_nota_curso_usuario -> setCriterio($criterio_nota_curso_usuario);

            $localizar_nota_curso_usuario = $conexao_sql_station21 -> query($sql_nota_curso_usuario -> getInstrucao());

            while($linhas_nota_curso_usuario = $localizar_nota_curso_usuario -> fetch(PDO::FETCH_ASSOC)) {

                $nota = $nota + $linhas_nota_curso_usuario["nota"];

            }

            return $nota;

            $conexao_sql_station21 = NULL;

        }

        //Método verificarCursosConcluidos
        //Verifica a quantidade de cursos nos quais um usuário se encontra aprovado
        //@param $cod_usuario - código do usuário para o qual a verificação será realizada
        public function verificarCursosConcluidos($cod_usuario) { 

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $contador = 0;
            $cod_curso = "";
            $cursos_concluidos = 0;

            $sql_verificar_cursos_concluidos = new SqlSelect();
            $sql_verificar_cursos_concluidos -> adicionarColuna("cod_usuario, cod_curso");
            $sql_verificar_cursos_concluidos -> setEntidade("Inscricao");

            $criterio_verificar_cursos_concluidos = new Criterio();
            $criterio_verificar_cursos_concluidos -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));

            $sql_verificar_cursos_concluidos -> setCriterio($criterio_verificar_cursos_concluidos);

            $localizar_verificar_cursos_concluidos = $conexao_sql_station21 -> query($sql_verificar_cursos_concluidos -> getInstrucao());

            while($linhas_verificar_cursos_concluidos = $localizar_verificar_cursos_concluidos -> fetch(PDO::FETCH_ASSOC)) {

                $cod_curso = $linhas_verificar_cursos_concluidos["cod_curso"];

                $nota_curso = $this::getNotaCurso($cod_usuario, $cod_curso);

                if($nota_curso >= 70) {

                    $cursos_concluidos++;

                }

            }

            return $cursos_concluidos;

            $conexao_sql_station21 = NULL;

        }

        //Método gerarListaUltimasAtividades
        //Gera a lista contendo as últimas atividades realizadas por um usuário
        //@param $cod_usuario - código do usuário para o qual a lista será gerada
        public function gerarListaUltimasAtividades($cod_usuario) { 

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $contador = 0;
            $cod_curso = "";
            $cod_exercicio = "";
            $cod_prova = "";
            $nota = "";
            $lista_ultimas_atividades = "";
            $titulo_atividade = "";

            $sql_gerar_lista_ultimas_atividades = new SqlSelect();
            $sql_gerar_lista_ultimas_atividades -> adicionarColuna("*");
            $sql_gerar_lista_ultimas_atividades -> setEntidade("Nota");

            $criterio_gerar_lista_ultimas_atividades = new Criterio();
            $criterio_gerar_lista_ultimas_atividades -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));
            $criterio_gerar_lista_ultimas_atividades -> setPropriedade("ORDER", "cod_nota DESC");

            $sql_gerar_lista_ultimas_atividades -> setCriterio($criterio_gerar_lista_ultimas_atividades);

            $localizar_lista_ultimas_atividades = $conexao_sql_station21 -> query($sql_gerar_lista_ultimas_atividades -> getInstrucao());

            while($linhas_lista_ultimas_atividades = $localizar_lista_ultimas_atividades -> fetch(PDO::FETCH_ASSOC)) {

                if($contador < 5) {

                    $cod_curso = $linhas_lista_ultimas_atividades["cod_curso"];
                    $cod_exercicio = $linhas_lista_ultimas_atividades["cod_exercicio"];
                    $cod_prova = $linhas_lista_ultimas_atividades["cod_prova"];
                    $nota = $linhas_lista_ultimas_atividades["nota"];

                    $titulo_curso = new GerenciarCurso();
                    $titulo_curso = $titulo_curso -> getTituloCursoPorCodigo($cod_curso);

                    if($cod_prova != "") {

                        $titulo_atividade = "Avaliação Final";

                    }

                    if($cod_exercicio != "") {

                        $cod_modulo = new GerenciarExercicio();
                        $cod_modulo = $cod_modulo -> getCodigoModuloPorCodigoExercicio($cod_exercicio);

                        $titulo_modulo = new GerenciarModulo();
                        $titulo_modulo = $titulo_modulo -> getTituloModuloPorCodigo($cod_modulo);

                        $titulo_atividade = "Exercício Avaliativo do " . $titulo_modulo;

                    }

                    $lista_ultimas_atividades .= "<tr>
                                                    <td>$titulo_curso</td>
                                                    <td>$titulo_atividade</td>
                                                    <td>$nota</td>
                                                 </tr>";

                    $contador++; 

                }

            }

            return $lista_ultimas_atividades;

            $conexao_sql_station21 = NULL;

        }

        //Método gerarListaAprovacoes
        //Gera a lista contendo aprovações em cursos para um usuário
        //@param $cod_usuario - código do usuário para o qual a lista será gerada
        public function gerarListaAprovacoes($cod_usuario) { 

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $contador = 0;
            $cod_curso = "";
            $nota = "";
            $lista_aprovacoes = "";

            $sql_gerar_lista_aprovacoes = new SqlSelect();
            $sql_gerar_lista_aprovacoes -> adicionarColuna("cod_curso, sum(nota)");
            $sql_gerar_lista_aprovacoes -> setEntidade("Nota");

            $criterio_gerar_lista_aprovacoes = new Criterio();
            $criterio_gerar_lista_aprovacoes -> adicionar(new Filtro("cod_usuario", "=", "'{$cod_usuario}'"));

            $sql_gerar_lista_aprovacoes -> setCriterio($criterio_gerar_lista_aprovacoes);

            $group_gerar_lista_aprovacoes = $sql_gerar_lista_aprovacoes -> getInstrucao() . " GROUP BY cod_curso";

            $localizar_lista_aprovacoes = $conexao_sql_station21 -> query($group_gerar_lista_aprovacoes);

            while($linhas_lista_aprovacoes = $localizar_lista_aprovacoes -> fetch(PDO::FETCH_ASSOC)) {

                if($contador < 5) {

                    $cod_curso = $linhas_lista_aprovacoes["cod_curso"];
                    $nota = $linhas_lista_aprovacoes["sum(nota)"];

                    $titulo_curso = new GerenciarCurso();
                    $titulo_curso = $titulo_curso -> getTituloCursoPorCodigo($cod_curso);

                    if($nota >= 70) {

                        $lista_aprovacoes .= "<tr>
                                                <td>$titulo_curso</td>
                                                <td>$nota</td>
                                              </tr>";

                    }

                    $contador++; 

                }

            } 

            return $lista_aprovacoes; 

            $conexao_sql_station21 = NULL;

        }

    }

?>