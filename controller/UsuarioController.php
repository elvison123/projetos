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
            $this->listarUsuario();
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
            header ('Location: ../view/usuarios/cadastrar-usuario.php');
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();

        }
            
    }
    function listarUsuario(){
        try{
        $usuarios = $this->usuario->listarUsuario();
//        include '../view/usuarios/listar-usuario.php';
        session_start();
        $_SESSION["usuarios"] = $usuarios;
        echo "ok";
        header ('Location: ../view/usuarios/listar-usuario.php');
        
        }  catch (Exception $e){
            echo $e->getMessage();
            exit();
        }
        
    }
    function excluirUsuario(){
        try{
        $id = isset($_GET['id'])?$_GET["id"]:null;
        $this->usuario->excluirUsuarioId($id);
        $this->listarUsuario();
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
            $this->listarUsuario();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        
    }
        
}
new UsuarioController();
