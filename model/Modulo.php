<?php

require_once '../model/Banco.php';

class Modulo extends Banco {

    private $nome;
    private $id;
    private $classificacaofk;
    function getNome() {
        return $this->nome;
    }

    function getId() {
        return $this->id;
    }

    function getClassificacaofk() {
        return $this->classificacaofk;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setClassificacaofk($classificacaofk) {
        $this->classificacaofk = $classificacaofk;
    }

        
    public function cadastrarModulos() {
        try {
            $db = $this->instancia();
            $sql = "INSERT INTO modulo (nomeModulo,id_classificacao_fk) VALUES (?,?)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("1", $this->nome);
            $stmt->bindParam("2", $this->classificacaofk);
            $stmt->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
        

    public function listarModulos() {
        try{
        $db=$this->instancia();
        $sql="SELECT * FROM modulo";
        $stmt=$db->prepare($sql);
        $stmt->execute();
        $linha = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $linha;
        }  catch (Exception $ex){
            echo $ex->getMessage();
            exit();
        }
        
    }
    public function listarTodos() {
        try {
            $db = $this->instancia();
            $sql = "SELECT m.nomeModulo, m.id_modulo, m.id_classificacao_fk, c.nome, c.id_classificacao, c.tipo "
                    . "FROM classificacao c JOIN modulo m ON c.id_classificacao = m.id_classificacao_fk ";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $linhas;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    

    public function editarModulos($id) {
        try {
            $db = $this->instancia();
            $sql = "UPDATE modulo SET nomeModulo=? ,id_classificacao_fk=? WHERE id_modulo = ?";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("1", $this->nome);
            $stmt->bindParam("2", $this->classificacaofk);
            $stmt->bindParam("3", $id);
            $stmt->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    

    public function deletarPorId($id) {
        try {
            $db = $this->instancia();
            $sql = "DELETE FROM modulo WHERE id_modulo = ?";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("1", $id);
            $stmt->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }
    
    public function buscaPorClassificacao($classificacao){
        try {
            $db = $this->instancia();
            $sql = "SELECT * FROM modulo where id_classificacao_fk = ?";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("1", $classificacao);
            $stmt->execute();
            $linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dados = array();
            
            $dados[] = array(
                    'value'=> null,
                    'text'=> '--'
                );
            
            foreach ($linhas as $linha){
                $dados[] = array(
                    'value'=> $linha['id_modulo'],
                    'text'=> $linha['nomeModulo']
                );
            }
            return $dados;
        } catch (Exception $ex) {
            echo $e->getMessage();
            exit();
        }
    }

}
