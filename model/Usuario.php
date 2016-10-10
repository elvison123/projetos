<?php
require_once '../model/Banco.php';

class Usuario extends Banco{
    private $nome;
    private $email;
    private $login;
    private $cpf;
    private $empresa;
    private $senha;
    private $id;
    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getLogin() {
        return $this->login;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getEmpresa() {
        return $this->empresa;
    }

    function getSenha() {
        return $this->senha;
    }

    function getId() {
        return $this->id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setId($id) {
        $this->id = $id;
    }
    function cadastrarUsuario(){
        try{
        $db=$this->instancia();
        $sql="INSERT INTO usuario (nome,email,login,cpf,empresa,senha) VALUES (?,?,?,?,?,?)";
        $stmt=$db->prepare($sql);
        $stmt->bindParam("1", $this->nome );
        $stmt->bindParam("2", $this->email);
        $stmt->bindParam("3", $this->login);
        $stmt->bindParam("4", $this->cpf);
        $stmt->bindParam("5", $this->empresa);
        $stmt->bindParam("6", $this->senha);
        $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
            exit();
        }
    }
    function listarUsuario(){
        try{
            $db= $this->instancia();
            $sql= "SELECT * FROM usuario";
            $stmt = $db->prepare($sql);
            $stmt->execute();
           $linhas = $stmt->fetchAll(pdo::FETCH_ASSOC);
            return $linhas;
            
            
        } catch (Exception $ex) {
            $ex->getMessage();
            exit();

        }
    }
    function excluirUsuarioId($id){
        try{
            $db = $this->instancia();
            $sql = "DELETE FROM usuario WHERE id_usuario=?";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("1", $id);
            $stmt->execute();
                    
                    
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            exit();

        }
        
        
        
    }
    function editarUsuario($id){
        try{
            $db=$this->instancia();
            $sql="UPDATE usuario set nome=?,email=?,login=?,cpf=?,empresa=?,senha=? WHERE id_usuario = ?";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("1",  $this->nome);
            $stmt->bindParam("2",  $this->email);
            $stmt->bindParam("3",  $this->login);
            $stmt->bindParam("4",  $this->cpf);
            $stmt->bindParam("5",  $this->empresa);
            $stmt->bindParam("6",  $this->senha);
            $stmt->bindParam("7",$id);
            $stmt->execute();
            
                    
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
            

        }
    }
        
    

    
    
    
}
