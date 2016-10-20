<?php

require_once '../model/Modulo.php';
require_once '../model/FuncaoModulo.php';

class ModuloController {

    private $modulo;
    private $funcaoModulo;

    function __construct() {
        try {
            $this->modulo = new Modulo();
            $this->funcaoModulo = new FuncaoModulo();
            $acao = isset($_GET["acao"]) ? $_GET["acao"] : null;
            if ($acao == "cadastrarfuncao") {
                $this->cadastrarFuncao();
            }
            if ($acao == "paginafuncao") {
                $this->listarModulos("cadastrarfuncao");
            }
            if ($acao == "listarfuncoes") {
                $this->listarFuncoes("padrao");
            }
            if ($acao == "excluirfuncao") {
                $this->deletarFuncaoPorId();
            }
            if ($acao == "editarfuncao") {
                $this->atualizarFuncao();
            }
            if ($acao == null) {
                echo "acao nao definido";
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }

    function deletarFuncaoPorId() {
        try {
            $id = isset($_GET["id_funcao"]) ? $_GET["id_funcao"] : null;
            $this->funcaoModulo->deletarPorId($id);
            if ($id) {
                echo "ok";
                $this->listarFuncoes("apagar");
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function listarFuncoes($acao) {

        try {
            if ($acao == "padrao") {
                $linha = $this->funcaoModulo->listarTodos();
                var_dump($linha);
                session_start();
                $_SESSION["linhas"] = $linha;
                $mensagem=null;
            }
            elseif ($acao == "apagar") {
                $linha = $this->funcaoModulo->listarTodos();
                var_dump($linha);
                session_start();
                $_SESSION["linhas"] = $linha;
                $mensagem = "A função<strong> " . $this->funcaoModulo->getFuncao() . " </strong>foi deletada.";
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
        
        header("Location: ../view/modulos/listar-funcao-modulo.php?status=".$mensagem);
    }

    function listarModulos($parametro) {
        try {
            if ($parametro == "cadastrarfuncao") {
                $modulos = $this->modulo->listarModulos();
                session_start();
                $_SESSION["modulos"] = $modulos;
            } else {
                echo "paramentor nao informado em listarModulos";
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
        header("Location: ../view/modulos/cadastar-funcao-modulo.php");
    }

    function atualizarFuncao() {
        try {
            $id = isset($_GET["funcaoid"]) ? $_GET["funcaoid"] : null;
            $this->funcaoModulo->setFuncao(isset($_GET["nome"]) ? $_GET["nome"] : null);
            $this->funcaoModulo->setCodigo(isset($_GET["codigo"]) ? $_GET["codigo"] : null);
            $this->funcaoModulo->setModulofk(isset($_GET["moduloid"]) ? $_GET["moduloid"] : null);
            $this->funcaoModulo->editarFuncao($id);
            $this->listarFuncoes("padrao");
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }

    function cadastrarFuncao() {
        try {

            $this->funcaoModulo->setFuncao(isset($_GET["nome"]) ? $_GET["nome"] : null);
            $this->funcaoModulo->setCodigo(isset($_GET["codigo"]) ? $_GET["codigo"] : null);
            $this->funcaoModulo->setModulofk(isset($_GET["moduloid"]) ? $_GET["moduloid"] : null);
            $this->funcaoModulo->cadastrarFuncao();
            $this->listarFuncoes("padrao");
            $nome = $this->funcaoModulo->getFuncao();

            $mensagem = "A função <strong> " . $nome . " </strong>foi cadastrada";
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
        header("Location: ../view/modulos/cadastar-funcao-modulo.php?status=" . $mensagem);
    }

}

new ModuloController();
