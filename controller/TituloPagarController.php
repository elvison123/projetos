<?php

require_once '../model/TituloPagar.php';
require_once '../controller/FornecedorController.php';
class TituloPagarController {
    private $fornecedor;
    private $titulo;

    function __construct() {
        $this->titulo = new TituloPagar();
        $this->fornecedor = new FornecedorController();
        
        $acao = isset($_GET["acao"]) ? $_GET["acao"] : null;

        try {
            if ($acao == "cadastrartitulo") {
                $this->cadastrarTitulo();
            }
            if ($acao == "listartitulos") {
                $this->listarTitulos();
            }
            if ($acao == "excluirtitulo") {
                $this->excluirTitulos();
            }
            if($acao== "editartitulo"){
                $this->editarTitulos();
            }
            if ($acao == null) {
                echo "form nao encontrado";
            }
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    function cadastrarTitulo() {
        try {
            $this->titulo->setValorDocumento(isset($_GET["valor"]) ? $_GET["valor"] : null);
            $this->titulo->setDocumento(isset($_GET["documento"]) ? $_GET["documento"] : null);
            $this->titulo->setSituacao(isset($_GET["situacao"]) ? $_GET["situacao"] : null);
            $this->titulo->setParcela(isset($_GET["parcela"]) ? $_GET["parcela"] : null);
            $this->titulo->setDataOperacao(isset($_GET["dataoperacao"]) ? $_GET["dataoperacao"] : null);
            $this->titulo->setFormPagamento(isset($_GET["datavencimento"]) ? $_GET["datavencimento"] : null);
            $this->titulo->setDescricao(isset($_GET["descricao"]) ? $_GET["descricao"] : null);
            $this->titulo->setId_fornecedor(isset($_GET["id_fornecedor"]) ? $_GET["id_fornecedor"] : null);
            $this->titulo->cadastrarTitulo();
            $this->fornecedor->listarTodos("titulos");
            } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function listarTitulos() {
        try {
            $linhas = $this->titulo->listarTitulos();
            
            session_start();
            $_SESSION["linhas"] = $linhas;
            header("Location: ../view/titulospagar/listar-titulopagar.php");
//          include '../view/titulospagar/listar-titulopagar.php';
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function excluirTitulos() {
        try {
            $id = (isset($_GET["id"]) ? $_GET["id"] : null);
            $this->titulo->excluirTitulosId($id);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        $this->listarTitulos();
    }

    function editarTitulos() {
        try {
            $this->titulo->setValorDocumento(isset($_GET["valor"]) ? $_GET["valor"] : null);
            $this->titulo->setDocumento(isset($_GET["documento"]) ? $_GET["documento"] : null);
            $this->titulo->setSituacao(isset($_GET["situacao"]) ? $_GET["situacao"] : null);
            $this->titulo->setParcela(isset($_GET["parcela"]) ? $_GET["parcela"] : null);
            $this->titulo->setDataOperacao(isset($_GET["dataoperacao"]) ? $_GET["dataoperacao"] : null);
            $this->titulo->setFormPagamento(isset($_GET["datavencimento"]) ? $_GET["datavencimento"] : null);
            $this->titulo->setDescricao(isset($_GET["descricao"]) ? $_GET["descricao"] : null);
            $this->titulo->setId(isset($_GET["id_titulo"]) ? $_GET["id_titulo"] : null);
            $this->titulo->editarTituloId();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
        $this->listarTitulos();
    }

}
new TituloPagarController();