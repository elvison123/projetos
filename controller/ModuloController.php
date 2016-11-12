<?php

require_once '../model/Modulo.php';
//require_once '../controller/ClassificacaoController.php';

class ModuloController {

    private $modulo;
    
    function __construct() {
 
        try {
            $this->modulo = new Modulo();
            $acao = isset($_GET["acao"]) ? $_GET["acao"] : null;
            if ($acao == "cadastrarmodulo") {
                $this->cadastrarModulo();
            }
           
            if ($acao == "listarmodulo") {
                $this->listarModulos("padrao");
            }
            if ($acao == "excluirmodulo") {
                $this->deletarModuloPorId();
            }
            if ($acao == "editarmodulo") {
                $this->atualizarModulo();
            }
            
            if ($acao == "modulo") {
                $this->carregarModulo();
            } else {
                echo "acao nao definido";
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
        
    function deletarModuloPorId() {
        try {
            $id = isset($_GET["id_modulo"]) ? $_GET["id_modulo"] : null;
            $this->modulo->deletarPorId($id);
            if ($id) {
                echo "ok";
                $this->listarModulos("apagar");
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function listarModulos($acao) {

        try {
            if ($acao == "padrao") {
                $linha = $this->modulo->listarTodos();
                
                session_start();
                $_SESSION["linhas"] = $linha;
                $mensagem=null;
            }
            elseif ($acao == "apagar") {
                $linha = $this->modulo->listarTodos();
                
                session_start();
                $_SESSION["linhas"] = $linha;
                $mensagem = "O modulo <strong> " . $this->modulo->getNome() . " </strong>foi deletado.";
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
        
        header("Location: ../view/modulos/listar-modulo.php?status=".$mensagem);
        
    }
    

    

    function atualizarModulo() {
        try {
            $id = isset($_GET["moduloid"]) ? $_GET["moduloid"] : null;
            $this->modulo->setNome(isset($_GET["nome"]) ? $_GET["nome"] : null);
            $this->modulo->setClassificacaofk(isset($_GET["classificacaoid"]) ? $_GET["classificacaoid"] : null);
            $this->modulo->editarModulos($id);
            $this->listarModulos("padrao");
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }

    function cadastrarModulo() {
        try {

            $this->modulo->setNome(isset($_GET["nome"]) ? $_GET["nome"] : null);
            $this->modulo->setClassificacaofk(isset($_GET["classificacaoid"]) ? $_GET["classificacaoid"] : null);
            $this->modulo->cadastrarModulos();
            $this->listarModulos("padrao");
            $nome = $this->modulo->getNome();
            $mensagem = "O modulo <strong> " . $nome . " </strong>foi cadastrada";
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
        header("Location: ../view/modulos/cadastrar-modulo.php?status=" . $mensagem);
        
    }
    public function carregarModulo()
            {
        $data = $this->modulo->buscaPorClassificacao($_GET["tipo"]);
        
        header('Content-type: aplication/json');
        echo json_encode($data);
        exit;
    }

}

new ModuloController();
