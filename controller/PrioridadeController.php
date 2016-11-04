<?php

require_once '../model/Prioridade.php';


class PrioridadeController {
    
    private $prioridade;
    
    function __construct() {
        try {
            $this->prioridade = new Prioridade();
            $acao = isset($_GET["acao"]) ? $_GET["acao"] : null;
            
            
            
            if ($acao == "cadastrarprioridade") {
                $this->cadastrarPrioridade();
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
    
    public function cadastrar(){
        $this->prioridade->setDescricao($_GET['descricao']);
        
        $this->prioridade->cadastrarPrioridade();
        $mensagem= "A prioridade <strong> " .$this->prioridade->getDescricao()." </strong> foi cadastrado com sucesso!";
        header("Location: ../view/prioridade/cadastrar-prioridade.php?status=".$mensagem);
    
  
    function listarTodos($pagina) {
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
    
    
    }   

