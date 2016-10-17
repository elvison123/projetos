<?php

require_once '../model/Banco.php';

class Modulo extends Banco {

    private $nome;

    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
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

}
