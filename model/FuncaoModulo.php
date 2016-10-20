<?php

require_once '../model/Banco.php';

class FuncaoModulo extends Banco {

    private $funcao;
    private $codigo;
    private $modulofk;
    private $id;

    function getFuncao() {
        return $this->funcao;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getModulofk() {
        return $this->modulofk;
    }

    function getId() {
        return $this->id;
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

    function setId($id) {
        $this->id = $id;
    }

    public function cadastrarFuncao() {
        try {
            $db = $this->instancia();
            $sql = "INSERT INTO funcaomodulo (nome,codigo,id_modulo_fk) VALUES (?,?,?)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("1", $this->funcao);
            $stmt->bindParam("2", $this->codigo);
            $stmt->bindParam("3", $this->modulofk);
            $stmt->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }

    public function editarFuncao($id) {
        try {
            $db = $this->instancia();
            $sql = "UPDATE funcaomodulo SET nome=? ,codigo=? ,id_modulo_fk=? WHERE id_funcao = ?";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("1", $this->funcao);
            $stmt->bindParam("2", $this->codigo);
            $stmt->bindParam("3", $this->modulofk);
            $stmt->bindParam("4", $id);
            $stmt->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function listarTodos() {
        try {
            $db = $this->instancia();
            $sql = "SELECT m.nomeModulo, f.codigo, f.nome, f.id_funcao, f.id_modulo_fk"
                    . " FROM modulo m JOIN funcaomodulo f ON m.id_modulo = f.id_modulo_fk";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $linhas;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function deletarPorId($id) {
        try {
            $db = $this->instancia();
            $sql = "DELETE FROM funcaomodulo WHERE id_funcao = ?";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("1", $id);
            $stmt->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }

}
