<?php

require_once '../model/Modulo.php';
require_once '../model/FuncaoModulo.php';

class ModuloController {

    private $modulo;
    private $funcaoModulo;

    function __construct() {
        $this->modulo = new Modulo();
        $this->funcaoModulo = new FuncaoModulo();

        try {
            $acao = isset($_GET["acao"]) ? $_GET["acao"] : null;
            if ($acao == "cadastrarfuncao") {
                $this->cadastrarFuncao();
            }
            if ($acao == "paginafuncao"){
                $this->listarModulos("cadastrarfuncao");
            }
            if($acao == null){
                echo "acao nao definido";
           
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }

        function listarModulos($parametro) {
            try {
                if ($parametro == "cadastrarfuncao") {
                    $modulobusca = $this->modulo->listarModulos();
                    session_start();
                    $_SESSION["modulo"] = $modulobusca;
                    header("Location:../view/modulos/cadastar-funcao-modulo.php");
                }else{
                    echo "paramentor nao informado em listarModulos";
                }
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
        }

        function cadastrarFuncao() {
            try {

                $this->funcaoModulo->getFuncao(isset($_GET["nome"]) ? $_GET["nome"] : null);
                $this->funcaoModulo->getCodigo(isset($_GET["codigo"]) ? $_GET["codigo"] : null);
                $this->funcaoModulo->cadastrarFuncao();
            } catch (Exception $ex) {
                echo $ex->getMessage();
                exit();
            }
        }

    

}
