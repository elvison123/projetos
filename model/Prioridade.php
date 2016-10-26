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
    
    public function  listarPrioridades(){
        try {
            $db=$this->instancia();
            $sql="SELECT * FROM prioridade";
            $stmt=$db->prepare($sql);
            $stmt->execute();
            $linha = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $linha; 
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();

        }
    }
}

