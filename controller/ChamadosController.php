<?php

class ChamadosController {
    
    private $chamado; 
    
    function __construct() {
        
        try {
            
            $this->chamado = new Chamado();
            $acao = isset($_GET["acao"]) ? $_GET["acao"] : null;



            if ($acao == "cadastrar") {
                $this->cadastrar();
            }
            if ($acao == "buscartodos") {

                $this->listarTodos("mostrartabelachamado");
            }
            if ($acao == "listarchamado") {
                $this->listarTodos("chamado");
            }
            if ($acao == "deletar") {
                $this->deletarChamados();
            }
            if ($acao == "editar") {
                $this->editarChamados();
            }
            if ($acao == null) {
                
            }
                
        } catch (Exception $ex) {
            var_dump($e->getMessage());
        }
    }
    
    public function cadastrar (){
        
        try {
            
            $this->chamado->setCliente($_GET["cliente"]);
            $this->chamado->setEquipamento($_GET["equipamento"]);
            $this->chamado->setClassificação($_GET["classificacao"]);
            $this->chamado->setModulo($_GET["modulo"]);
            $this->chamado->setFuncao($_GET["funcao"]);
            $this->chamado->setPrioridade($_GET["prioridade"]);
            $this->chamado->setDescricao($_GET["descricao"]);
            
            $this->chamado->cadastrarChamados();
            
            $mensagem = " O chamado <strong> " . $this->chamado->getIdChamado()." </strong> foi cadastrado com sucesso!";
            header("Location: ../view/chamado/cadastrar-chamado.php?status=".$mensagem);
            
        } catch (Exception $ex) {

        }
    }
    
    public function listarTodos($pagina) {
        try {
            if ($pagina == "mostrartabelachamados") {
                $chamados1 = $this->chamados->listarTodosChamados();
                session_start();
                $_SESSION["chamados1"] = $chamados1;
                header("Location: ../view/chamados/listar-chamado.php");
//          include '../view/chamados/listar-chamado.php';
            }
            elseif ($pagina == "editar") {
                $chamados1 = $this->chamado->listarTodosChamados();
                session_start();
                $_SESSION["chamados1"] = $chamados1;
                $mensagem = "O chamado<strong> " . $this->chamado->getIdChamado () . " </strong>teve seus dados alterados";
                header("Location: ../view/chamados/listar-chamado.php?status=" . $mensagem);

            }
            elseif ($pagina == "apagar") {
                $chamados1 = $this->chamado->listarTodosChamados();
                session_start();
                $_SESSION["chamados1"] = $chamados1;
                $mensagem = "O chamado<strong> " . $this->chamado->getIdChamado . " </strong>foi deletado.";
                header("Location: ../view/chamados/listar-chamado.php?status=" . $mensagem);
//          include '../view/chamados/listar-chamado.php';
            } 
            elseif ($pagina == "titulos") {            
        
                $chamados1 = $this->chamado->listarTodosChamados();
                session_start();
                $_SESSION["chamados1"] = $chamados1;
                header("Location: ../view/chamados/cadastrar-chamado.php");
//          include '../view/titulos/cadastrar-titulos.php';
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function deletarChamado() {
        try {
            $id = $_GET["id"];
            $this->chamado->deletarPorId($id);
            $this->listarTodos("apagar");
        } catch (Exception $e) {
            //echo $e->getMessage();
            session_start();
                $_SESSION["mensagem"]  = "O chamado <strong> " . $this->chamado->getIdChamado() . " </strong> foi deletado.";
                header("Location: /projetos/controller/ClienteController.php?acao=buscartodos");
        }
    }

    public function editarCliente(){
            try{
            $this->chamado->setCliente($_GET["cliente"]);
            $this->chamado->setEquipamento($_GET["equipamento"]);
            $this->chamado->setClassificacao($_GET["classificacao"]);
            $this->chamado->setModulo($_GET["modulo"]);
            $this->chamado->setFuncao($_GET["funcao"]);
            $this->chamado->setPrioridade($_GET["prioridade"]);
            $this->chamado->setDescricao($_GET["descricao"]);
            
            $this->listarTodos("editar");
            }  catch (Exception $e){
                echo $e->getMessage();
                exit();
            }
            
                  
        }
}