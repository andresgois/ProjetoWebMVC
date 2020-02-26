<?php
namespace App\Model;

use App\Model\ClassConexao;

class ClassCadastro extends ClassConexao{

    private $Db;

    #cadastrará clientes no sistema
    protected function cadastroClientes($Nome, $Sexo, $Cidade){
        //$Id = 0;
        $sql = "INSERT INTO teste (Nome,Sexo,Cidade) values  (:nome, :sexo, :cidade)";
        $this->Db = $this->conexaoDB()->prepare($sql);
        //$this->Db->bindParam(":id",$Id, \PDO::PARAM_INT);
        $this->Db->bindParam(":nome",$Nome, \PDO::PARAM_STR);
        $this->Db->bindParam(":sexo",$Sexo, \PDO::PARAM_STR);
        $this->Db->bindParam(":cidade",$Cidade, \PDO::PARAM_STR);
        $this->Db->execute();
    }

    #seleção dos dados
    protected function selecionaClientes($Nome, $Sexo, $Cidade){
        $Nome = '%'.$Nome.'%';
        $Sexo = '%'.$Sexo.'%';
        $Cidade = '%'.$Cidade.'%';
        $sql = "SELECT * FROM teste WHERE Nome LIKE :nome and Sexo LIKE :sexo and Cidade LIKE :cidade ";
        $RFetch = $this->Db = $this->conexaoDB()->prepare($sql);
        $RFetch->bindParam(":nome",$Nome, \PDO::PARAM_STR);
        $RFetch->bindParam(":sexo",$Sexo, \PDO::PARAM_STR);
        $RFetch->bindParam(":cidade",$Cidade, \PDO::PARAM_STR);
        $RFetch->execute();

        $I=0;
        while($Fetch = $RFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$I] = [
                'Id'=>$Fetch['Id'],
                'Nome'=>$Fetch['Nome'],
                'Sexo'=>$Fetch['Sexo'],
                'Cidade'=>$Fetch['Cidade']
            ];
            $I++;
        }
        return $Array;
    }

    #deletar direto no banco
    protected function deletarClientes($Id){
        $sql = "DELETE FROM teste WHERE Id = :id";
        $RFetch = $this->Db = $this->conexaoDB()->prepare($sql);
        $RFetch->bindParam(":id",$Id, \PDO::PARAM_INT);
        $RFetch->execute();
    }

    #Atualização direto no DB
    protected function atualizarClientes($Id, $Nome, $Sexo, $Cidade){
        $sql = "UPDATE teste SET Nome=:nome, Sexo=:sexo, Cidade=:cidade  WHERE Id=:id ";
        $RFetch = $this->Db = $this->conexaoDB()->prepare($sql);
        $RFetch->bindParam(":id",$Id, \PDO::PARAM_INT);
        $RFetch->bindParam(":nome",$Nome, \PDO::PARAM_STR);
        $RFetch->bindParam(":sexo",$Sexo, \PDO::PARAM_STR);
        $RFetch->bindParam(":cidade",$Cidade, \PDO::PARAM_STR);
        $RFetch->execute();
    }

}

?>