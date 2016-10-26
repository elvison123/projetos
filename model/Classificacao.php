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

        public function cadastar(){
        try{
            $db=  $this->instancia();
            $sql="INSERT INTO classificao (descricao) VALUES (?)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("1", $this->nome);
            $stmt->execute();
                  
        } catch (Exception $ex) {
            echo $ex->getMessage();

        }
    }

    
    
    
    
    
}