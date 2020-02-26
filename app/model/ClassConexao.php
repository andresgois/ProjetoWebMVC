<?php
namespace App\Model;

 abstract class ClassConexao{

    #Realiza a conexao com o banco
    public function conexaoDB(){
        try{
            $Con = new \PDO("mysql:host=".HOST.";dbname=".DB,USER,PASS);
            return $Con;
        }catch(\PDOException $Error){
            return $Error->getMessage();
        }
    }
}


?>