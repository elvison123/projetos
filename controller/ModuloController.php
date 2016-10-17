<?php

require_once '../model/Modulo.php';
require_once '../model/FuncaoModulo.php';

class ModuloController {

    private $modulo;
    private $funcaoModulo;

    function __construct() {
        try {
        $this->modulo = new Modulo();
        $this->funcaoModulo = new FuncaoModulo();
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
                    if($modulobusca){
                        echo"ok";
                    }else{
                        echo"vazio";
                    }
                    session_start();
                    $_SESSION["nome"] = $modulobusca;
                    header("Location: ../view/modulos/cadastar-funcao-modulo.php");
                }else{
                    echo "paramentor nao informado em listarModulos";
                }
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
        }

        function cadastrarFuncao() {
            try {

                $this->funcaoModulo->setFuncao(isset($_GET["nome"]) ? $_GET["nome"] : null);
                $this->funcaoModulo->setCodigo(isset($_GET["codigo"]) ? $_GET["codigo"] : null);
                $this->funcaoModulo->setModulofk(isset($_GET["modulo"]) ? $_GET["modulo"] : null);
                $this->funcaoModulo->cadastrarFuncao();
            } catch (Exception $ex) {
                echo $ex->getMessage();
                exit();
            }
        }

    

}
new ModuloController();
