<?php

require_once '../model/Banco.php';

class TituloPagar extends Banco {

    private $documento;
    private $valorDocumento;
    private $situacao;
    private $descricao;
    private $parcela;
    private $dataOperacao;
    private $formPagamento;
    private $id;
    private $id_fornecedor;
    function getDocumento() {
        return $this->documento;
    }

    function getValorDocumento() {
        return $this->valorDocumento;
    }

    function getSituacao() {
        return $this->situacao;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getParcela() {
        return $this->parcela;
    }

    function getDataOperacao() {
        return $this->dataOperacao;
    }

    function getFormPagamento() {
        return $this->formPagamento;
    }

    function getId() {
        return $this->id;
    }

    function getId_fornecedor() {
        return $this->id_fornecedor;
    }

    function setDocumento($documento) {
        $this->documento = $documento;
    }

    function setValorDocumento($valorDocumento) {
        $this->valorDocumento = $valorDocumento;
    }

    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setParcela($parcela) {
        $this->parcela = $parcela;
    }

    function setDataOperacao($dataOperacao) {
        $this->dataOperacao = $dataOperacao;
    }

    function setFormPagamento($formPagamento) {
        $this->formPagamento = $formPagamento;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_fornecedor($id_fornecedor) {
        $this->id_fornecedor = $id_fornecedor;
    }

        

    function cadastrarTitulo() {
        try {
            $db = $this->instancia();
            $sql = "INSERT INTO titulopagar (valor_documento,documento, situacao, parcela, data_operacao, forma_pagamento, descricao, id_fornecedor_fk) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $db->prepare($sql);
            $stmt->bindValue("1", $this->valorDocumento, PDO::PARAM_STR);
            $stmt->bindValue("2", $this->documento, PDO::PARAM_STR);
            $stmt->bindValue("3", $this->situacao, PDO::PARAM_STR);
            $stmt->bindValue("4", $this->parcela, PDO::PARAM_STR);
            $stmt->bindValue("5", $this->dataOperacao, PDO::PARAM_STR);
            $stmt->bindValue("6", $this->formPagamento, PDO::PARAM_STR);
            $stmt->bindValue("7", $this->descricao, PDO::PARAM_STR);
            $stmt->bindValue("8", $this->id_fornecedor, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e){

            echo $e->getMessage();
            exit();
        }
        echo $stmt->rowCount() . " linhas inclusas";
    }

    function listarTitulos() {
        try {
            $db = $this->instancia();
            $sql = "SELECT f.nome, t.id_titulo, t.valor_documento, t.documento, t.situacao, t.parcela, "
                    . "t.data_operacao, t.forma_pagamento, t.descricao FROM fornecedor f JOIN titulopagar "
                    . "t ON f.id_fornecedor = t.id_fornecedor_fk";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            $ex->getMessage();
            exit();
        }
        return $linhas;
    }

    function excluirTitulosId($id) {
        try {

            $db = $this->instancia();
            $sql = "DELETE FROM titulopagar WHERE id_titulo=?";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("1", $id);
            $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    function editarTituloId() {
        try {
            $db = $this->instancia();
            $sql = "UPDATE titulopagar SET valor_documento=?,documento=?, situacao=?, parcela=?, data_operacao=?, forma_pagamento=?, descricao=? WHERE id_titulo= ?";
            $stmt = $db->prepare($sql);
            $stmt->bindValue("1", $this->valorDocumento, PDO::PARAM_STR);
            $stmt->bindValue("2", $this->documento, PDO::PARAM_STR);
            $stmt->bindValue("3", $this->situacao, PDO::PARAM_STR);
            $stmt->bindValue("4", $this->parcela, PDO::PARAM_STR);
            $stmt->bindValue("5", $this->dataOperacao, PDO::PARAM_STR);
            $stmt->bindValue("6", $this->formPagamento, PDO::PARAM_STR);
            $stmt->bindValue("7", $this->descricao, PDO::PARAM_STR);
            $stmt->bindValue("8", $this->id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
        
        echo $stmt->rowCount()." linhas modificads";
    }

}
