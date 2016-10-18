<?php
require_once '../model/Banco.php';
class FuncaoModulo extends Banco{
    private $funcao;
    private $codigo;
    private $modulofk;
    function getFuncao() {
        return $this->funcao;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getModulofk() {
        return $this->modulofk;
    }

    function setFuncao($funcao) {
        $this->funcao = $funcao;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setModulofk($modulofk) {
        $this->modulofk = $modulofk;
    }

    
        
    public function cadastrarFuncao(){
        try{
            $db = $this->instancia();
            $sql= "INSERT INTO funcaomodulo (nome,codigo,id_modulo_fk) VALUES (?,?,?)";
            $stmt= $db->prepare($sql);
            $stmt->bindParam("1", $this->funcao);
            $stmt->bindParam("2", $this->codigo);
            $stmt->bindParam("3", $this->modulofk);
            $stmt->execute();
                       
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();

        }
    }

}