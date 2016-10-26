<?php
require_once '../model/Classificacao.php';

class ClassificaoController{
    private $classificao;
    
    function __construct() {
        $this->classificao = new Classificacao;
        try{
            $acao = isset($_GET["acao"])?$_GET["acao"]:null;
            if($acao==cadastar){
                
            }
            
            
            
            
        } catch (Exception $ex) {

        }
    }
    
    function cadastrar(){
        try{
            $classfi = $this->classificao;
            $classfi->setNome(isset($_GET["nome"])?$_GET["nome"]:null);
        } catch (Exception $ex) {

        }
    }
    
}
