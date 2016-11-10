<?php

require_once '../model/Banco.php';

class Fornecedor extends Banco {

    private $nome;
    private $email;
    private $telefone;
    private $endereco;
    private $cpf;
    private $id;
    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getEndereco() {
        return $this->endereco;
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

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setId($id) {
        $this->id = $id;
    }

        

    
    public function cadastrarFornecedor() {
        $db = $this->instancia();
        $sql = "INSERT INTO fornecedor (nome,email,telefone,cpf,endereco)VALUES (:nome,:email,:telefone,:cpf,:endereco)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":cpf", $this->cpf);
        $stmt->bindParam(":endereco", $this->endereco);
        

        $result = $stmt->execute();
        if (!$result) {
            var_dump($stmt->errorInfo());
            exit();
        }
        echo $stmt->rowCount() . " linhas inseridas";
    }

    public function listarTodosFornecedores() {
        
        try{
        
        $db = $this->instancia();
        $sql = "SELECT * FROM fornecedor";
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
            $stmt = $db->prepare("DELETE FROM fornecedor WHERE id_fornecedor=?");
            $stmt->bindParam("1", $id);
            $stmt->execute();
        } catch (Exception $e) {

           throw $e;
        }
        echo "deletada linha $id";
    }

    public function editarFornecedor() {

        try {
            $db = $this->instancia();
            $stmt = $db->prepare("UPDATE fornecedor SET nome= ?, email= ?, telefone= ?, cpf = ?, endereco= ? WHERE id_fornecedor= ?");
            $stmt->bindParam("1", $this->nome);
            $stmt->bindParam("2", $this->email);
            $stmt->bindParam("3", $this->telefone);
            $stmt->bindParam("4", $this->cpf);
            $stmt->bindParam("5", $this->endereco);
            $stmt->bindParam("6", $this->id);
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














