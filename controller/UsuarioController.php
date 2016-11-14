<?php
require_once '../model/Usuario.php';
class UsuarioController{
    private $usuario;
    function __construct() {
        $this->usuario= new Usuario();
        $acao = isset($_GET["acao"])?$_GET["acao"]:null;
        try{
        if($acao == "cadastrar"){
            $this->cadastrarUsuario();
            
        }
        if($acao =="listarusuarios"){
            $this->listarUsuario("padrao");
        }
        if($acao =="excluirusuario"){
            $this->excluirUsuario();
        }
        if($acao == "editar"){
            $this->editarUsuario();
        }
               
        }catch (Exception $e){
            echo $e->getMessage();
            exit();
        }
        
            
        
    }
        
    function cadastrarUsuario(){
        try{
            $this->usuario->setNome(isset($_GET["nome"])?$_GET["nome"]:null);
            $this->usuario->setEmail(isset($_GET["email"])?$_GET["email"]:null);
            $this->usuario->setLogin(isset($_GET["login"])?$_GET["login"]:null);
            $this->usuario->setCpf(isset($_GET["cpf"])?$_GET["cpf"]:null);
            $this->usuario->setEmpresa(isset($_GET["empresa"])?$_GET["empresa"]:null);
            $this->usuario->setSenha(isset($_GET["senha"])?$_GET["senha"]:null);
            $this->usuario->cadastrarUsuario();
            $mensagem = "O usuário <strong> " . $this->usuario->getNome() . " </strong>foi cadastrado.";
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();

        }
         header ('Location: ../view/usuarios/cadastrar-usuario.php?status='.$mensagem);   
    }
    function listarUsuario($acao){
       
        try {
            $linhas = $this->usuario->listarUsuario();
            session_start();
            $_SESSION["linhas"] = $linhas;
            $mensagem = null;

            if ($acao == "apagar") {
                $mensagem = "O usuário <strong> " . $this->usuario->getNome() . " </strong>foi deletado.";
                            
            } elseif ($acao == "editar") {
                $mensagem="O usuário <strong> " . $this->usuario->getNome() . " </strong>foi editado.";
                
            } else{
                
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        header("Location: ../view/usuarios/listar-usuario.php?status=" . $mensagem);
        
    }
    function excluirUsuario(){
        try{
        $id = isset($_GET['id'])?$_GET["id"]:null;
        $this->usuario->excluirUsuarioId($id);
        $this->listarUsuario("apagar");
        }  catch (Exception $e){
            echo $e->getMessage();
        }
    }
    function editarUsuario(){
        try{
            $id = isset($_GET["id_usuario"])?$_GET["id_usuario"]:null;
            $this->usuario->setNome(isset($_GET["nome"])?$_GET["nome"]:null);
            $this->usuario->setEmail(isset($_GET["email"])?$_GET["email"]:null);
            $this->usuario->setLogin(isset($_GET["login"])?$_GET["login"]:null);
            $this->usuario->setCpf(isset($_GET["cpf"])?$_GET["cpf"]:null);
            $this->usuario->setEmpresa(isset($_GET["empresa"])?$_GET["empresa"]:null);
            $this->usuario->setSenha(isset($_GET["senha"])?$_GET["senha"]:null);
            $this->usuario->editarUsuario($id);
            $this->listarUsuario("editar");
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        
    }
        
}
new UsuarioController();
