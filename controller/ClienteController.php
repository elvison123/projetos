<?php
require_once '../model/Cliente.php';
//require_once '../view/cadastrar-cliente.php';
//require_once '../view/listar-cliente.php';

class ClienteController{
	private $cliente;
	

	
	function __construct(){
		
            
            try{
                $this->cliente = new Cliente();
		$acao = isset($_GET["acao"])?$_GET["acao"]:null;
               
                
		
		if($acao == "cadastrar"){
                    $this->cadastrar();
		}
                if($acao == "buscartodos"){
                    
                    $this->listarTodos(null);
                    
                }
                if($acao=="listarclientes"){
                    $this->listarTodos("titulos");
                }
                if($acao == "deletar"){
                    $this->deletarCliente();
                }
                if($acao == "editar"){
                    $this->editarCliente();
                    
                }
                if($acao == null){
                    
                }
                                
            }  catch (Exception $e){
                var_dump($e->getMessage());
            }
        
                
				
	}
        
	
	public function cadastrar(){
            try{
		$this->cliente->setNome($_GET["nome"]);
		$this->cliente->setEmail($_GET["email"]);
		$this->cliente->setTelefone($_GET["telefone"]);
		$this->cliente->setEmpresa($_GET["empresa"]);
		$this->cliente->setCpf($_GET["cpf"]);
		$this->cliente->setEndereco($_GET["endereco"]);
		$this->cliente->setSenha($_GET["senha"]);
		$this->cliente->cadastrarUsuario();
                $mensagem= "O usuario<strong> " .$this->cliente->getNome()." </strong>foi cadastrado";
                header("Location: ../view/clientes/cadastrar-cliente.php?status=".$mensagem);
//                include '../../view/clientes/cadastrar-cliente.php';
            }  catch (Exception $e){
                echo $e->getMessage();
                exit();
            }
            
                
                
		
	}
        public function listarTodos($pagina){
            try{
            if($pagina==null){
            $clientes1 = $this->cliente->listarTodosClintes();
            session_start();
            $_SESSION["clientes1"] = $clientes1;
            header("Location: ../view/clientes/listar-cliente.php");
//          include '../view/clientes/listar-cliente.php';
            }else{
            $clientes1 = $this->cliente->listarTodosClintes();
            session_start();
            $_SESSION["clientes1"] = $clientes1;
            header("Location: ../view/titulos/cadastrar-titulos.php");
//          include '../view/titulos/cadastrar-titulos.php';
                
            }
            }  catch (Exception $e){
                echo $e->getMessage();
                exit();
            }
                    
        }
        public function deletarCliente(){
            try{
            $id = $_GET["id"];
            $this->cliente->deletarPorId($id);
            $this->listarTodos(null);
            }  catch (Exception $e){
                echo $e->getMessage();
                exit();
            }
            
        }
        public function editarCliente(){
            try{
            $this->cliente->setNome($_GET["nome"]);
            $this->cliente->setEmail($_GET["email"]);
            $this->cliente->setTelefone($_GET["telefone"]);
            $this->cliente->setEmpresa($_GET["empresa"]);
            $this->cliente->setCpf($_GET["cpf"]);
            $this->cliente->setEndereco($_GET["endereco"]);
            $this->cliente->setSenha($_GET["senha"]);
            $this->cliente->setId($_GET["id_cliente"]);
            $this->cliente->editarCliente();
            $this->listarTodos(null);
            }  catch (Exception $e){
                echo $e->getMessage();
                exit();
            }
            
                  
        }

      
	
	
	
}
new ClienteController();



