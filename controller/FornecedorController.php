<?php

require_once '../model/Fornecedor.php';

//require_once '../view/cadastrar-cliente.php';
//require_once '../view/listar-cliente.php';

class FornecedorController {

    private $fornecedor;

    function __construct() {


        try {
            $this->fornecedor = new Fornecedor();
            $acao = isset($_GET["acao"]) ? $_GET["acao"] : null;



            if ($acao == "cadastrar") {
                $this->cadastrar();
            }
            if ($acao == "buscartodos") {

                $this->listarTodos("mostrartabelafornecedor");
            }
            if ($acao == "listarfornecedor") {
                $this->listarTodos("titulos");
            }
            if ($acao == "deletar") {
                $this->deletarFornecedor();
            }
            if ($acao == "editar") {
                $this->editarFornecedor();
            }
            if ($acao == null) {
                
            }
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }

    public function cadastrar(){
            try{
		$this->fornecedor->setNome($_GET["nome"]);
		$this->fornecedor->setEmail($_GET["email"]);
		$this->fornecedor->setTelefone($_GET["telefone"]);
		$this->fornecedor->setCpf($_GET["cpf"]);
		$this->fornecedor->setEndereco($_GET["endereco"]);
		              
		$this->fornecedor->cadastrarFornecedor();
                $mensagem= "O fornecedor <strong> " .$this->fornecedor->getNome()." </strong>foi cadastrado com sucesso!";
                header("Location: ../view/fornecedores/cadastrar-fornecedor.php?status=".$mensagem);
//                include '../view/fornecedores/cadastrar-fornecedor.php';
            }  catch (Exception $e){
                echo $e->getMessage();
                exit();
            }
            
                
                
		
	}

    public function listarTodos($pagina) {
        try {
            if ($pagina == "mostrartabelafornecedor") {
                $fornecedor1 = $this->fornecedor->listarTodosFornecedores();
                session_start();
                $_SESSION["fornecedor1"] = $fornecedor1;
                header("Location: ../view/fornecedores/listar-fornecedor.php");
//          include '../view/fornecedores/listar-fornecedor.php';
            }
            elseif ($pagina == "editar") {
                $fornecedor1 = $this->fornecedor->listarTodosFornecedores();
                session_start();
                $_SESSION["fornecedor1"] = $fornecedor1;
                $mensagem = "O fornecedor<strong> " . $this->fornecedor->getNome() . " </strong>teve seus dados alterados";
                header("Location: ../view/fornecedores/listar-fornecedor.php?status=" . $mensagem);
//          include '../view/clientes/listar-cliente.php';
            }
            elseif ($pagina == "apagar") {
                $fornecedor1 = $this->fornecedor->listarTodosFornecedores();
                session_start();
                $_SESSION["fornecedor1"] = $fornecedor1;
                $mensagem = "O fornecedor<strong> " . $this->fornecedor->getNome() . " </strong>foi deletado.";
                header("Location: ../view/fornecedores/listar-fornecedor.php?status=" . $mensagem);
//          include '../view/clientes/listar-cliente.php';
            } 
            elseif ($pagina == "titulos") {            
        
                $fornecedor1 = $this->fornecedor->listarTodosFornecedores();
                session_start();
                $_SESSION["fornecedor1"] = $fornecedor1;
                header("Location: ../view/titulospagar/cadastrar-titulopagar.php");
//          include '../view/titulospagar/cadastrar-titulopagar.php';
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function deletarFornecedor() {
        try {
            $id = $_GET["id"];
            $this->fornecedor->deletarPorId($id);
            $this->listarTodos("apagar");
        } catch (Exception $e) {
//            echo $e->getMessage();
            session_start();
                $_SESSION["mensagem"]  = "O cliente <strong> " . $this->fornecedor->getNome() . " </strong> possui titulos cadastrados.";
                header("Location: ../view/fornecedores/listar-fornecedor.php?acao=buscartodos");
            
        }
    }

    public function editarFornecedor(){
            try{
            $this->fornecedor->setNome($_GET["nome"]);
            $this->fornecedor->setEmail($_GET["email"]);
            $this->fornecedor->setTelefone($_GET["telefone"]);
            $this->fornecedor->setCpf($_GET["cpf"]);
            $this->fornecedor->setEndereco($_GET["endereco"]);
            $this->fornecedor->setId($_GET["id_fornecedor"]);
            $this->fornecedor->editarFornecedor();
            $this->listarTodos("editar");
            }  catch (Exception $e){
                echo $e->getMessage();
                exit();
            }
            
                  
        }
}



new FornecedorController();



