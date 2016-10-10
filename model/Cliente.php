<?php

require_once '../model/Banco.php';

class Cliente extends Banco {

    private $nome;
    private $email;
    private $telefone;
    private $empresa;
    private $endereco;
    private $senha;
    private $cpf;
    private $id;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }

    public function getEmpresa() {
        return $this->empresa;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function cadastrarUsuario() {
        $db = $this->instancia();
        $sql = "INSERT INTO cliente (nome,email,telefone,cpf,empresa,endereco, senha)VALUES (:nome,:email,:telefone,:cpf,:empresa,:endereco, :senha)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":cpf", $this->cpf);
        $stmt->bindParam(":empresa", $this->empresa);
        $stmt->bindParam(":endereco", $this->endereco);
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
            $stmt = $db->prepare("UPDATE cliente SET nome= ?, email= ?, telefone= ?, cpf = ?, empresa= ?, endereco= ?, senha= ? WHERE id_cliente= ?");
            $stmt->bindParam("1", $this->nome);
            $stmt->bindParam("2", $this->email);
            $stmt->bindParam("3", $this->telefone);
            $stmt->bindParam("4", $this->cpf);
            $stmt->bindParam("5", $this->empresa);
            $stmt->bindParam("6", $this->endereco);
            $stmt->bindParam("7", $this->senha);
            $stmt->bindParam("8", $this->id);
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














