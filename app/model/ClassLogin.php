<?php
namespace App\Model;

class ClassLogin extends ClassConexao{

    #validar usuario no banco de dados
    protected function validarUsuario($Usuario, $Senha){
        $sql = "SELECT * FROM login WHERE Usuario=:usuario and Senha=:senha";
        $BFetch = $this->conexaoDB()->prepare($sql);
        $BFetch->bindParam(':usuario', $Usuario, \PDO::PARAM_STR);
        $BFetch->bindParam(':senha', $Senha, \PDO::PARAM_STR);
        $BFetch->execute();

        //verifica a quantidade de retorno
        if($Row = $BFetch->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }


}



?>