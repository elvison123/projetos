<?php

require_once '../model/Banco.php';

class Prioridade extends Banco {
    private $descricao;
    
    function getDescricao() {
        return $this->descricao;
    }
    
    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    
     public function cadastar(){
        try{
            $db=  $this->instancia();
            $sql="INSERT INTO prioridade (descricao) VALUES (?)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("1", $this->nome);
            $stmt->execute();
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();

        }
    }
}

