<?php

require_once '../model/Prioridade.php';


class PrioridadeController {
    
    private $prioridade;
    
    function __construct() {
        try {
            $this->prioridade = new Prioridade();
            $acao = isset($_GET["acao"]) ? $_GET["acao"] : null;       
            
            if ($acao == cadastrar) {
                
            }
        
            if ($acao === "buscartodos"){
                
                $this->listarTodos("mostrartabelaprioridades");
            }
            if ($acao == "listatodasprioridades"){
                $this->listaTodos("prioridades");
            }
            if ($acao == "deletar"){
                $this->deletarPrioridade();
            }
            if ($acao == "editar"){
                $this->editarCliente();
            }
            if ($acao == null){
                
            }
        } catch (Exception $ex) {
            var_dump($e->getMessage());
        }
    }
    
    function cadastrar(){
        try{
            $prioridade = $this->prioridade;
            $prioridade->setNome(isset($_GET["nome"])?$_GET["nome"]:null);
        } catch (Exception $ex) {

      }
    }
       
    function listatodasprioridades ($pagina) {
        try {
            if ($pagina == 'mostrartabelaprioridade'){
                $prioridade = $this->prioridade->listarPrioridades();
                session_start();
                $_SESSION ["prioridade"] = $prioridade;
                header ("Location: ../view/prioridade/listar-prioridade.php");
            }
            elseif ($pagina == "editar"){
                $prioridade = $this->prioridade->listarPrioridades();
                session_start();
                $_SESSION["prioridade"] = $prioridade;
                $mensagem = "A prioridade<strong> " . $this->prioridade->getDescricao() . " </strong> teve seus dados alterados";
                header("Location: ../view/prioridade/listar-prioridade.php?status=" . $mensagem);
                }
                elseif ($pagina == "apagar") {
                $prioridade = $this->prioridade->listarPrioridades();
                session_start();
                $_SESSION["prioridade"] = $prioridade;
                $mensagem = "A prioridade<strong> " . $this->prioridade->getPrioridade() . " </strong>foi deletada.";
                header("Location: ../view/prioridade/listar-prioridade.php?status=" . $mensagem);
            } 
            elseif ($pagina == "titulos") {            
        
                $prioridade = $this->prioridade->listarPrioridades();
                session_start();
                $_SESSION["prioridade"] = $prioridade;
                header("Location: ../view/prioridade/cadastrar-prioridade.php");

            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
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

    function editarPrioridade(){
            try{
            $this->prioridade->setDescricao($_GET["descricao"]);
            
            }  catch (Exception $e){
                echo $e->getMessage();
                exit();
            }
    }
                
                
                
        } 
    }
    
    
  

