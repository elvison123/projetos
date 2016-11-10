<?php
require_once '../model/Classificacao.php';

class ClassificacaoController{
    private $classificacao;
    
    function __construct() {


        try {
            $this->classificacao = new Classificacao();
            $acao = isset($_GET["acao"]) ? $_GET["acao"] : null;
            if ($acao == "paginamodulo") {
                $this->listarTodos("cadastrarmodulo");
            }


            if ($acao == "cadastrar") {
                $this->cadastrar();
            }
            if ($acao == "buscartodos") {
                $this->listarTodos("mostrartabelaclassificacao");
            }
            if ($acao == "listarclassificacao") {
                $this->listarTodos("funcao");
            }
            if ($acao == "deletar") {
                $this->deletarClassificao();
            }
            if ($acao == "editar") {
                $this->editarClassificao();
            }
            else {
                echo "ação nao informada";
            }
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }

    public function cadastrar(){
            try{
		$this->classificacao->setNome($_GET["nome"]);
		            
		$this->classificacao->cadastarClassificacao();
                $nome = $this->classificacao->getNome();
                
                $mensagem= "A Classificacão<strong> " .$nome." </strong>foi cadastrada";
                header("Location: ../view/classificacoes/cadastrar-classificacao.php?status=".$mensagem);
//                include '../view/classificacoes/cadastrar-classificacao.php';
            }  catch (Exception $e){
                echo $e->getMessage();
                exit();
            }
            
                
                
		
	}

    public function listarTodos($pagina) {
        try {
            if ($pagina == "mostrartabelaclassificacao") {
                $classificacao1 = $this->classificacao->listarTodosClassificacao();
                session_start();
                $_SESSION["classificacao1"] = $classificacao1;
                header("Location: ../view/classificacoes/listar-classificacao.php");
//         include '../view/classificacoes/listar-classificacao.php';
            }
            elseif ($pagina == "editar") {
                $classificacao1 = $this->classificacao->listarTodosClassificacao();
                session_start();
                $_SESSION["classificacao1"] = $classificacao1;
                $mensagem = "A classificacao<strong> " . $this->classificacao->getNome() . " </strong>tiveram seus dados alterados";
                header("Location: ../view/classificacoes/listar-classificacao.php?status=" . $mensagem);

            }
            elseif ($pagina == "apagar") {
                $classificacao1 = $this->classificacao->listarTodosClassificacao();
                session_start();
                $_SESSION["classificacao1"] = $classificacao1;
                $mensagem = "A classificacao<strong> " . $this->classificacao->getNome() . " </strong>foi deletada.";
                header("Location: ../view/classificacoes/listar-classificacao.php?status=" . $mensagem);

            } 
            elseif ($pagina == "cadastrarmodulo") {            
        
                $classificacao1 = $this->classificacao->listarTodosClassificacao();
                session_start();
                $_SESSION["classificacao1"] = $classificacao1;
                
                header("Location: ../view/modulos/cadastrar-modulo.php");
//                require '../view/modulos/cadastrar-modulo.php';
         
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }
    

    public function deletarClassificao() {
        try {
            $id = $_GET["id"];
            $this->classificacao->deletarPorId($id);
            $this->listarTodos("apagar");
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function editarClassificao(){
            try{
            $this->classificacao->setNome($_GET["nome"]);
            $this->classificacao->setId($_GET["id_classificacao"]);
            $this->classificacao->editarClassificacao();
            $this->listarTodos("editar");
            }  catch (Exception $e){
                echo $e->getMessage();
                exit();
            }
            
                  
        }
}



new ClassificacaoController();