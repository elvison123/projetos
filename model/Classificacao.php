<?php
require_once '../model/Banco.php';
class Classificacao extends Banco{
    private $nome;
    private $id;
    private $tipo;
    function getNome() {
        return $this->nome;
    }

    function getId() {
        return $this->id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setId($id) {
        $this->id = $id;
    }
    
    function getTipo() {
        return $this->tipo;
    }
    
    function setTipo($tipo) {
        $this->tipo = $tipo;
    }
  

    public function cadastarClassificacao(){
        try{
            $db=  $this->instancia();
            $sql="INSERT INTO classificacao (nome, tipo) VALUES (?,?)";
           
            $stmt = $db->prepare($sql);
            $stmt->bindParam("1", $this->nome);
            $stmt->bindParam("2", $this->tipo);
            $stmt->execute();
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
              die; 
        }
    }
    public function listarTodosClassificacao() {
        
        try{
        
        $db = $this->instancia();
        $sql = "SELECT * FROM classificacao";
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
            $stmt = $db->prepare("DELETE FROM classificacao WHERE id_classificacao=?");
            $stmt->bindParam("1", $id);
            $stmt->execute();
        } catch (Exception $e) {

            echo $e->getMessage();
            die();
        }
        echo "deletada linha $id";
    }

    public function editarClassificacao() {

        try {
            $db = $this->instancia();
            $stmt = $db->prepare("UPDATE classificacao SET nome= ?, tipo= ? WHERE id_classificacao= ?");
            $stmt->bindParam("1", $this->nome);
            $stmt->bindParam("2", $this->tipo);
            $stmt->bindParam("3", $this->id);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
        echo $this->id." linhas editada";
    }

    
    public function buscaporTipo($tipo){
        try {
            $db = $this->instancia();
            $sql = "SELECT * FROM classificacao where tipo= ?";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("1", $tipo);
            $stmt->execute();
            $linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dados = array();
            
            $dados[] = array(
                    'value'=> null,
                    'text'=> '--'
                );
            
            foreach ($linhas as $linha){
                $dados[] = array(
                    'value'=> $linha['id_classificacao'],
                    'text'=> $linha['nome']
                );
            }
            return $dados;
        } catch (Exception $ex) {
            echo $e->getMessage();
            exit();
        }
    }
}

    
    
    
    
    
