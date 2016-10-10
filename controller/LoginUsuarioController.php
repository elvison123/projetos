<?php
require '../model/LoginUsuario.php';
class LoginUsuarioController{
    private $loginsUsuario;
    
    function __construct() {
        try{
        $this->loginsUsuario= new LoginUsuario();
        $this->EfetuarLogin();
        $acao = isset($_GET["acao"])?$_GET["acao"]:null;
        if($acao == "logout"){
            $this->logout();
        }
        }  catch (Exception $e){
            echo $e->getMessage();
            exit();
        }
        
    }
    
    function EfetuarLogin(){
        try{
        $this->loginsUsuario->setLogin(isset($_GET["login"])?($_GET["login"]):null);
        $this->loginsUsuario->setSenha(isset($_GET["senha"])?($_GET["senha"]):null);
        $mensagem;
        if($this->loginsUsuario->login()){
            
            $mensagem = "Login efetuado com sucesso!";
            session_start();
            $_SESSION["nomeusuario"] = isset($_GET["login"])?($_GET["login"]):false;
            header('Location: ../view/home/login-sucesso.php?erro='.$mensagem);
            
           
            
            
        }else{//senha incorreta
           $mensagem = "Usuário ou senha incorretos!"; 
           header('Location: ../view/home/LoginUsuario.php?erro='.$mensagem);
           
           
        }
        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
    }
    function logout(){
        session_start();
        session_destroy();
        header('Location: ../view/home/LoginUsuario.php');
        
    }
    
    
    
    
    
}
new LoginUsuarioController();