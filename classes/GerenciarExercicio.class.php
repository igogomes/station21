<?php

    //Classe GerenciarExercicio.class.php
    //Classe para provimento dos métodos destinados ao gerenciamento de exercícios relacionados 
    //aos módulos dos cursos

    include_once "Autoload.inc";

    class GerenciarExercicio { 

        //Método setExercicio
        //Método para o cadastro de exercícios na base de dados
        //@param $modulo - módulo do curso para o qual o exercício será cadastrado
        public function setExercicio($modulo) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $sql_cadastrar_exercicio = new SqlInsert();
            $sql_cadastrar_exercicio -> setEntidade("Exercicio");
            $sql_cadastrar_exercicio -> setValorLinha("cod_modulo", "$modulo");

            $cadastrar_exercicio = $conexao_sql_station21 -> query($sql_cadastrar_exercicio -> getInstrucao());

            $conexao_sql_station21 = NULL;

        }

        //Método getCodigoExercicioPorModulo
        //Retorna o código do exercício através do módulo ao qual o mesmo pertence
        //@param $cod_modulo - código do módulo ao qual o exercício pertence
        public function getCodigoExercicioPorModulo($cod_modulo) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $cod_exercicio = "";

            $sql_cod_exercicio = new SqlSelect();
            $sql_cod_exercicio -> adicionarColuna("cod_exercicio, cod_modulo");
            $sql_cod_exercicio -> setEntidade("Exercicio");

            $criterio_cod_exercicio = new Criterio();
            $criterio_cod_exercicio -> adicionar(new Filtro("cod_modulo", "=", "$cod_modulo"));

            $sql_cod_exercicio -> setCriterio($criterio_cod_exercicio);

            $localizar_cod_exercicio = $conexao_sql_station21 -> query($sql_cod_exercicio -> getInstrucao());

            while($linhas_cod_exercicio = $localizar_cod_exercicio -> fetch(PDO::FETCH_ASSOC)) {

                $cod_exercicio = $linhas_cod_exercicio["cod_exercicio"];

            }

            return $cod_exercicio;

            $conexao_sql_station21 = NULL;

        }

        //Método verificarExercicioExistente
        //Verifica se existe exercício associado a um módulo
        //@param $cod_modulo - código do módulo ao qual o exercício pertence
        public function verificarExercicioExistente($cod_modulo) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $exercicios = 0;

            $sql_verificar_exercicio = new SqlSelect();
            $sql_verificar_exercicio -> adicionarColuna("cod_modulo");
            $sql_verificar_exercicio -> setEntidade("Exercicio");

            $criterio_verificar_exercicio = new Criterio();
            $criterio_verificar_exercicio -> adicionar(new Filtro("cod_modulo", "=", "$cod_modulo"));

            $sql_verificar_exercicio -> setCriterio($criterio_verificar_exercicio);

            $localizar_exercicio = $conexao_sql_station21 -> query($sql_verificar_exercicio -> getInstrucao());

            while($linhas_exercicio = $localizar_exercicio -> fetch(PDO::FETCH_ASSOC)) {

                $exercicios++;

            }

            return $exercicios;

            $conexao_sql_station21 = NULL;

        }

        //Método verificarExerciciosCursos
        //Verifica se existe um exercício avaliativo para cada módulo associado ao curso
        //@param $cod_curso - código do curso para o qual a verificação será realizada
        public function verificarExerciciosCursos($cod_curso) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $exercicios = 0;

            $sql_verificar_exercicios_cursos = new SqlSelect();
            $sql_verificar_exercicios_cursos -> adicionarColuna("Curso.cod_curso, Modulo.cod_curso, Modulo.cod_modulo, Exercicio.cod_modulo");
            $sql_verificar_exercicios_cursos -> setEntidade("Curso, Modulo, Exercicio"); 

            $criterio_verificar_exercicios_cursos_1 = new Criterio();
            $criterio_verificar_exercicios_cursos_1 -> adicionar(new Filtro("Curso.cod_curso", "=", "'{$cod_curso}'"));
            $criterio_verificar_exercicios_cursos_2 = new Criterio();
            $criterio_verificar_exercicios_cursos_2 -> adicionar(new Filtro("Curso.cod_curso", "=", "Modulo.cod_curso"));
            $criterio_verificar_exercicios_cursos_3 = new Criterio();
            $criterio_verificar_exercicios_cursos_3 -> adicionar(new Filtro("Modulo.cod_modulo", "=", "Exercicio.cod_modulo"));
            $criterio_verificar_exercicios_cursos = new Criterio();
            $criterio_verificar_exercicios_cursos -> adicionar($criterio_verificar_exercicios_cursos_1, Expressao::OPERADOR_AND);
            $criterio_verificar_exercicios_cursos -> adicionar($criterio_verificar_exercicios_cursos_2, Expressao::OPERADOR_AND);
            $criterio_verificar_exercicios_cursos -> adicionar($criterio_verificar_exercicios_cursos_3, Expressao::OPERADOR_AND);

            $sql_verificar_exercicios_cursos -> setCriterio($criterio_verificar_exercicios_cursos);

            $localizar_exercicios_cursos = $conexao_sql_station21 -> query($sql_verificar_exercicios_cursos -> getInstrucao());

            while($linhas_exercicios_cursos = $localizar_exercicios_cursos -> fetch(PDO::FETCH_ASSOC)) {

                $exercicios++;

            }

            return $exercicios;

            $conexao_sql_station21 = NULL;

        }

        //Método getCodigoModuloPorCodigoExercicio
        //Retorna o código do módulo ao qual o exercício pertence através do código do mesmo
        //@param $cod_exercicio - código do exercício para o qual o módulo será verificado
        public function getCodigoModuloPorCodigoExercicio($cod_exercicio) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");
            $cod_modulo = "";

            $sql_cod_modulo = new SqlSelect();
            $sql_cod_modulo -> adicionarColuna("cod_exercicio, cod_modulo");
            $sql_cod_modulo -> setEntidade("Exercicio");

            $criterio_cod_modulo = new Criterio();
            $criterio_cod_modulo -> adicionar(new Filtro("cod_exercicio", "=", "$cod_exercicio"));

            $sql_cod_modulo -> setCriterio($criterio_cod_modulo);

            $localizar_cod_modulo = $conexao_sql_station21 -> query($sql_cod_modulo -> getInstrucao());

            while($linhas_cod_modulo = $localizar_cod_modulo -> fetch(PDO::FETCH_ASSOC)) {

                $cod_modulo = $linhas_cod_modulo["cod_modulo"];

            }

            return $cod_modulo;

            $conexao_sql_station21 = NULL;

        }

        //Método gerarListaExerciciosAdminPorModulo
        //Método para a geração de lista de exercicios associados a um módulo de um curso
        //@param $cod_modulo - Código do módulo para o qual a lista será gerada
        public function gerarListaExerciciosAdminPorModulo($cod_modulo) {

            $conexao_sql_station21 = Conexao::abrir("conexao-station21");

            $lista_exercicios = "<table style=\"width: 100%;\">";
            $contador = 0;
            $cod_exercicio = "";

            $sql_lista_exercicios = new SqlSelect();
            $sql_lista_exercicios -> adicionarColuna("cod_exercicio, cod_modulo");
            $sql_lista_exercicios -> setEntidade("Exercicio");

            $criterio_lista_exercicios = new Criterio();
            $criterio_lista_exercicios -> adicionar(new Filtro("cod_modulo", "=", "'{$cod_modulo}'"));

            $sql_lista_exercicios -> setCriterio($criterio_lista_exercicios);

            $localizar_exercicios = $conexao_sql_station21 -> query($sql_lista_exercicios -> getInstrucao());

            while($linhas_lista_exercicios = $localizar_exercicios -> fetch(PDO::FETCH_ASSOC)) {

                $contador++;
                $cod_exercicio = $linhas_lista_exercicios["cod_exercicio"];

            }

            if($contador > 0) {

                $lista_exercicios .= "<tr style=\"width: 100%;\">";
                $lista_exercicios .= "<td style=\"width: 100%;\">
                                        <div style=\"float: left; width: 90%;\">Exercício</div>
                                        <div style=\"float: right; width: 10%;\">
                                            <span style=\"text-align: right; float: right;\">
                                                <a href=\"edit-content?cod-exercise=$cod_exercicio\">
                                                    <button class=\"btn btn-default btn-xs m-r-5\" data-toggle=\"tooltip\" data-original-title=\"Editar\">
                                                        <i class=\"fa fa-pencil font-14\"></i>
                                                    </button>
                                                </a>
                                                <a href=\"contents?cod-delete-exercise=$cod_exercicio&delete-content=1\">
                                                    <button class=\"btn btn-default btn-xs\" data-toggle=\"tooltip\" data-original-title=\"Excluir\">
                                                        <i class=\"fa fa-trash font-14\"></i>
                                                    </button> 
                                                </a>
                                            </span>
                                        </div>
                                    </td>";
                $lista_exercicios .= "</tr>";

            }

            $lista_exercicios .= "</table>";

            return $lista_exercicios;

            $conexao_sql_station21 = NULL;

        }

    }

?>