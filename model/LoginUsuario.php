<?php
require '../model/Banco.php';
class LoginUsuario extends Banco{
    private $senha;
    private $login;
    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setLogin($login) {
        $this->login = $login;
    }
          
    
    function login(){
        try{
        session_start();
        $db=$this->instancia();
        $sql="SELECT id_usuario, nome FROM usuario WHERE login = ? AND senha = ?";
        $stmt = $db->prepare($sql);
        $stmt->bindParam("1", $this->login);
        $stmt->bindParam("2", $this->senha);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $validar = $stmt->rowCount();
        var_dump($resultado);
        if($validar == 1){
            return true;
            echo 'login ok model';
            
        }else{
            return false;
        }
        
        
        
        }  catch (Exception $e){
            echo $e->getMessage();
        }
        
        
        
        
        
    }
    
    
    
    
    
    
}
