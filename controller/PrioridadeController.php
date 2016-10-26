<?php

require_once '../model/Prioridade.php';


class PrioridadeController {
    
    private $prioridade;
    
    function __construct() {
        try {
            $this->prioridade = new Prioridade();
            $acao = isset($_GET["acao"]) ? $_GET["acao"] : null;
            
            
            
            if ($acao == "cadastrarprioridade") {
                $this->cadastrar();
            }
            if ($acao === "buscartodos"){
                
                $this->listarTodos("mostrar")
            }
        } catch (Exception $ex) {
            
        };
    }
}

