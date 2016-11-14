<?php

require_once '../model/Banco.php';

class Chamados extends Banco {
    
    private $cliente;
    private $equipamento; 
    private $classificação; 
    private $modulo;
    private $funcao;
    private $prioridade; 
    private $descricao;
    private $id_chamado;
    
    function getCliente() {
        return $this->cliente;
    }

    function getEquipamento() {
        return $this->equipamento;
    }

    function getClassificação() {
        return $this->classificação;
    }

    function getModulo() {
        return $this->modulo;
    }

    function getFuncao() {
        return $this->funcao;
    }

    function getPrioridade() {
        return $this->prioridade;
    }

    function getDescricao() {
        return $this->descricao;
    }
    
    function getIdChamado() {
        return $this->id_chamado;
    }
    
    function setCliente ($cliente){
        $this->cliente = $cliente; 
    }
    
    function setEquipamento($equipamento) {
        $this->equipamento = $equipamento;
    }

    function setClassificação($classificação) {
        $this->classificação = $classificação;
    }

    function setModulo($modulo) {
        $this->modulo = $modulo;
    }

    function setFuncao($funcao) {
        $this->funcao = $funcao;
    }

    function setPrioridade($prioridade) {
        $this->prioridade = $prioridade;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    
    function setIdChamado($id_chamado) {
        $this->id_chamado = $id_chamado;
    }
    
    public function cadastrarChamados() {
        $db = $this->instancia();
        $sql = "INSERT INTO chamados (cliente,equipamento,classificacao,modulo,funcao,prioridade,descricao)VALUES (:cliente,:equipamento,:classificacao,:modulo,:funcao,:prioridade,:descricao)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":cliente", $this->cliente);
        $stmt->bindParam(":equipamento", $this->equipamento);
        $stmt->bindParam(":classificacao", $this->classificacao);
        $stmt->bindParam(":modulo", $this->modulo);
        $stmt->bindParam(":funcao", $this->funcao);
        $stmt->bindParam(":prioridade", $this->prioridade);
        $stmt->bindParam(":descricao", $this->descricao);
       

        $result = $stmt->execute();
        if (!$result) {
            var_dump($stmt->errorInfo());
            exit();
        }
        echo $stmt->rowCount() . " linhas inseridas";
    }

     public function listarTodosChamados() {
        
        try{
        
        $db = $this->instancia();
        $sql = "SELECT * FROM chamados";
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
            $stmt = $db->prepare("DELETE FROM chamados WHERE id_chamado=?");
            $stmt->bindParam("1", $id);
            $stmt->execute();
        } catch (Exception $e) {

            throw $e;
        }
        echo "deletada linha $id";
    }
    
    public function editarCliente() {

        try {
            $db = $this->instancia();
            $stmt = $db->prepare("UPDATE chamados SET cliente= ?, equipamento= ?, classificacao= ?, modulo = ?, funcao= ?, prioridade= ?, descricao=? WHERE id_chamado= ?");
            $stmt->bindParam("1", $this->cliente);
            $stmt->bindParam("2", $this->equipamento);
            $stmt->bindParam("3", $this->classificacao);
            $stmt->bindParam("4", $this->modulo);
            $stmt->bindParam("5", $this->funcao);
            $stmt->bindParam("6", $this->prioridade);
            $stmt->bindParam("7", $this->descricao);
            $stmt->bindParam("8", $this->id);
            
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
        echo $this->id." linhas editada";
    }
}
