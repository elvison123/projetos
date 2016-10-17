<?php

require_once '../model/Banco.php';

class Cliente extends Banco {

    private $nome;
    private $login;
    private $email;
    private $telefone;
    private $empresa;
    private $endereco;
    private $senha;
    private $cpf;
    private $id;

    function getNome() {
        return $this->nome;
    }

    function getLogin() {
        return $this->login;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getEmpresa() {
        return $this->empresa;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getSenha() {
        return $this->senha;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getId() {
        return $this->id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setId($id) {
        $this->id = $id;
    }

    
    public function cadastrarUsuario() {
        $db = $this->instancia();
        $sql = "INSERT INTO cliente (nome,email,telefone,cpf,empresa,endereco,login,senha)VALUES (:nome,:email,:telefone,:cpf,:empresa,:endereco,:login,:senha)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":cpf", $this->cpf);
        $stmt->bindParam(":empresa", $this->empresa);
        $stmt->bindParam(":endereco", $this->endereco);
        $stmt->bindParam(":login", $this->login);
        $stmt->bindParam(":senha", $this->senha);

        $result = $stmt->execute();
        if (!$result) {
            var_dump($stmt->errorInfo());
            exit();
        }
        echo $stmt->rowCount() . " linhas inseridas";
    }

    public function listarTodosClintes() {
        
        try{
        
        $db = $this->instancia();
        $sql = "SELECT * FROM cliente";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e) {
            $e->getMessage();
            exit();
        }
        return $linhas;
    }

    public function deletarPorId($id) {
        try {
            $db = $this->instancia();
            $stmt = $db->prepare("DELETE FROM cliente WHERE id_cliente=?");
            $stmt->bindParam("1", $id);
            $stmt->execute();
        } catch (Exception $e) {

            echo $e->getMessage();
            die();
        }
        echo "deletada linha $id";
    }

    public function editarCliente() {

        try {
            $db = $this->instancia();
            $stmt = $db->prepare("UPDATE cliente SET nome= ?, email= ?, telefone= ?, cpf = ?, empresa= ?, endereco= ?, login=?, senha= ? WHERE id_cliente= ?");
            $stmt->bindParam("1", $this->nome);
            $stmt->bindParam("2", $this->email);
            $stmt->bindParam("3", $this->telefone);
            $stmt->bindParam("4", $this->cpf);
            $stmt->bindParam("5", $this->empresa);
            $stmt->bindParam("6", $this->endereco);
            $stmt->bindParam("7", $this->login);
            $stmt->bindParam("8", $this->senha);
            $stmt->bindParam("9", $this->id);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
        echo $this->id." linhas editada";
    }

}

//$cliente = new Cliente();
//$cliente->editarCliente(18);














