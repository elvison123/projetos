<?php

class Banco{
    public $db;

    public function instancia(){
		try{
		$db= new PDO("mysql:host=localhost;dbname=projetos","root","");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		return $db;
                
		
		}catch (PDOException $e){
			echo $e->getMessage("erro ao conectar no banco");
		}
		
	}
	
	
	
	
}