<?php
require_once '../model/Banco.php';
class Classificacao extends Banco{
    private $nome;
    private $id;
    function getNome() {
        return $this->nome;
    }

    function getId() {
        return $this->id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setId($id) {
        $this->id = $id;
    }

    public function cadastarClassificacao(){
        try{
            $db=  $this->instancia();
            $sql="INSERT INTO classificacao (nome) VALUES (?)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("1", $this->nome);
            $stmt->execute();
                  
        } catch (Exception $ex) {
            echo $ex->getMessage();

        }
    }
    public function listarTodosClassificacao() {
        
        try{
        
        $db = $this->instancia();
        $sql = "SELECT * FROM classificacao";
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
            $stmt = $db->prepare("DELETE FROM classificacao WHERE id_classificacao=?");
            $stmt->bindParam("1", $id);
            $stmt->execute();
        } catch (Exception $e) {

            echo $e->getMessage();
            die();
        }
        echo "deletada linha $id";
    }

    public function editariClassificacao() {

        try {
            $db = $this->instancia();
            $stmt = $db->prepare("UPDATE classificacao SET nome= ? WHERE id_classificacao= ?");
            $stmt->bindParam("1", $this->nome);
            $stmt->bindParam("2", $this->id);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
        echo $this->id." linhas editada";
    }

}

    
    
    
    
    
