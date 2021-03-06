<?php

require_once '../model/Prioridade.php';

class PrioridadeController {

    private $prioridade;

    function __construct() {
        try {
            $this->prioridade = new Prioridade();
            $acao = isset($_GET["acao"]) ? $_GET["acao"] : null;


            if ($acao == "cadastrar") {
                $this->cadastrar();
            }

            if ($acao == "buscartodos") {
                $this->listarTodos("mostrartabelaprioridades");
            }

            if ($acao == "listarprioridades") {
                $this->listaTodos("prioridade");
            }
            if ($acao == "deletar") {

                $this->deletarPrioridade();
            }
            if ($acao == "editar") {
                $this->editarPrioridade();
            } else {
                echo "ação não informada";
            }
        } catch (Exception $ex) {
            var_dump($e->getMessage());
        }
    }

    public function cadastrar() {

        try {


            $this->prioridade->setNome($_GET["nome"]);
            $this->prioridade->cadastarPrioridade();
            $nome = $this->prioridade->getNome();

            $mensagem = "A Prioridade <strong> " . $nome . " </strong> foi cadastrada";
            header("Location: ../view/Prioridade/cadastrar-prioridade.php?status=" . $mensagem);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

    function listarTodos($pagina) {
        try {
            if ($pagina == 'mostrartabelaprioridades') {
                $linha = $this->prioridade->listarTodosPrioridade();
                session_start();
                $_SESSION ["linha"] = $linha;
                header("Location: ../view/prioridade/listar-prioridade.php");
            } elseif ($pagina == "editar") {
                $linha = $this->prioridade->listarTodosPrioridade();
                session_start();
                $_SESSION["linha"] = $linha;
                $mensagem = "A prioridade<strong> " . $this->prioridade->getNome() . " </strong> teve seus dados alterados";
                header("Location: ../view/prioridade/listar-prioridade.php?status=" . $mensagem);
            } elseif ($pagina == "apagar") {
                $linha = $this->prioridade->listarTodosPrioridade();
                session_start();
                $_SESSION["linha"] = $linha;
                $mensagem = "A prioridade<strong> " . $this->prioridade->getNome() . " </strong>foi deletada.";
                header("Location: ../view/prioridade/listar-prioridade.php?status=" . $mensagem);
            } elseif ($pagina == "cadastrarprioridade") {

                $linha = $this->prioridade->listarTodosPrioridade();
                session_start();
                $_SESSION["linha"] = $linha;
                header("Location: ../view/prioridade/cadastrar-prioridade.php");
            } else {
                echo "nada informado em listar";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

    function deletarPrioridade() {
        try {
            $id = $_GET["id"];
            $this->prioridade->deletarPorId($id);
            $this->listarTodos("apagar");
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

    function editarPrioridade() {
        try {
            $this->prioridade->setNome($_GET["nome"]);
            $this->prioridade->setId($_GET["id_prioridade"]);
            $this->prioridade->editarPrioridade();
            $this->listarTodos("editar");
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

}

new PrioridadeController();



