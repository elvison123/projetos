<?php

require_once '../model/Prioridade.php';


class PrioridadeController {
    
    private $prioridade;
    
    function __construct() {
        try {
            $this->prioridade = new Prioridade();
            $acao = isset($_GET["acao"]) ? $_GET["acao"] : null;       
            
            if ($acao == "paginaprioridade") {
                $this->listarTodos("cadastrarprioridade");
            }
        
            if ($acao === "cadastrar"){
                $this->cadastrar();
            }
            
            if($acao == "buscartodos"){
                $this->listarTodos("mostrartabelaprioridades");
            }
            
            if ($acao == "listarprioridades"){
                $this->listaTodos("prioridade");
            }
            if ($acao == "deletar"){
                $this->deletarPrioridade();
            }
            if ($acao == "editar"){
                $this->editarPrioridade();
            }
            else { 
                echo "ação não informada";
            }
                 
          } catch (Exception $ex) {
            var_dump($e->getMessage());
        }
    }
    
    public function cadastrar(){
        
        try{
            
            
            $this->prioridade->setNome($_GET["nome"]);
            $this->prioridade->cadastarPrioridade();
            $nome = $this->prioridade->getNome();
            
            $mensagem= "A Prioridade <strong> " .$nome." </strong> foi cadastrada";
            header("Location: ../view/Prioridade/cadastrar-prioridade.php?status=".$mensagem);
            
        } catch (Exception $e) {
            echo $e->getMessage();
                exit();
      }
    }
       
    function listarTodos ($pagina) {
        try {
            if ($pagina == 'mostrartabelaprioridades'){
                $prioridade = $this->prioridade->listarTodos();
                session_start();
                $_SESSION ["prioridade"] = $prioridade;
                header ("Location: ../view/prioridade/listar-prioridade.php");
            }
            elseif ($pagina == "editar"){
                $prioridade = $this->prioridade->listarPrioridades();
                session_start();
                $_SESSION["prioridade"] = $prioridade;
                $mensagem = "A prioridade<strong> " . $this->prioridade->getNome() . " </strong> teve seus dados alterados";
                header("Location: ../view/prioridade/listar-prioridade.php?status=" . $mensagem);
                }
                elseif ($pagina == "apagar") {
                $prioridade = $this->prioridade->listarPrioridades();
                session_start();
                $_SESSION["prioridade"] = $prioridade;
                $mensagem = "A prioridade<strong> " . $this->prioridade->getPrioridade() . " </strong>foi deletada.";
                header("Location: ../view/prioridade/listar-prioridade.php?status=" . $mensagem);
            } 
            elseif ($pagina == "cadastrarprioridade") {            
        
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
            $this->prioridade->setNome($_GET["nome"]);
            $this->prioridade->setId($_GET["id_classificacao"]);
            $this->prioridade->listarTodos("editar");
            
            }  catch (Exception $e){
                echo $e->getMessage();
                exit();
            }
    }   
                
        }
        
        
    }
    
    new PrioridadeController();
    
  

