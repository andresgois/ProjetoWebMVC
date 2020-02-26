<?php

    namespace App\Controller;

    use Src\Classes\ClassRender;
    use Src\Interfaces\InterfaceView;
    use App\Model\ClassCadastro;

    class ControllerCadastro extends ClassCadastro{

        protected $Id;
        protected $Nome;
        protected $Sexo;
        protected $Cidade;

        use \Src\Traits\TraitUrlParser;

        public function __construct()
        {
            if(count($this->parserUrl()) == 1){
                $Render = new ClassRender();
                $Render->setTitle("Cadastro");
                $Render->setDescription("Cadastro de clientes");
                $Render->setKeywords("Cadastro de clientes, Cadastro");
                $Render->setDir("cadastro/");
                $Render->renderLayout();
            }
            
        }

        public function recVariaveis(){
            if(isset($_POST['Id'])){
                $this->Id = $_POST['Id'];
            }
            if(isset($_POST['Nome'])){
                $this->Nome = filter_input(INPUT_POST, 'Nome', FILTER_SANITIZE_SPECIAL_CHARS);
            }
            if(isset($_POST['Sexo'])){
                $this->Sexo = filter_input(INPUT_POST, 'Sexo', FILTER_SANITIZE_SPECIAL_CHARS);
            }
            if(isset($_POST['Cidade'])){
                $this->Cidade = filter_input(INPUT_POST, 'Cidade', FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        
        #chamar o método de cadastro
        public function cadastrar(){            
            $this->recVariaveis();
            $this->cadastroClientes($this->Nome, $this->Sexo, $this->Cidade);
            echo "Cadastro efetuado com sucesso!";
        }

        #Selecionar e exibir os dados do banco
        public function seleciona(){
            $this->recVariaveis();
            $B = $this->selecionaClientes($this->Nome, $this->Sexo, $this->Cidade);

            echo "
            <form name='FormDeletar' id='FormDeletar' action='".DIRPAGE."cadastro/deletar' method='POST'>
                <table border=1>
                    <thead>
                        <tr>
                            <th>Ação</th>
                            <th>Nome</th>
                            <th>Sexo</th>
                            <th>Cidade</th>
                        </tr>
                    </thead>
                    <tbody>";
                        foreach($B as $C){
                            echo "
                            <tr>
                                <td>
                                    <input type='checkbox' id='Id' name='Id[]' value='$C[Id]'>
                                    <img rel='$C[Id]' src='".DIRIMG."edit.png' class='ImgEdit' alt='Editar'>
                                </td>
                                <td>$C[Nome]<td>
                                <td>$C[Sexo]<td>
                                <td>$C[Cidade]<td>
                            </tr>
                            ";
                        }
                    echo "</tbody>
                </table>
                <input type='submit' value='Deletar'>
            </form>
            ";
        }

        #Deletar dados do DB
        public function deletar(){
            $this->recVariaveis();
            //var_dump($this->Id);
            foreach($this->Id as $IdDeletar){
                $this->deletarClientes($IdDeletar);
            }
        }

        #Puxando dados do DB
        public function PuxaDB($Id){
            $this->recVariaveis();
            $B = $this->selecionaClientes($this->Nome, $this->Sexo, $this->Cidade);

            foreach($B as $C){
                if($C['Id'] == $Id){
                    $Nome = $C['Nome'];
                    $Sexo = $C['Sexo'];
                    $Cidade = $C['Cidade'];
                }
            }

            echo "
            <form action='".DIRPAGE."cadastro/atualizar/$Id' name='FormAtualizar' id='FormAtualizar' method='POST'>  
                <input type='hidden' name='Id' id='Id' value='$Id'> 
                Nome: <input type='text' name='Nome' id='Nome' value='$Nome'><br>
                Sexo: 
                <select name='Sexo' id='Sexo'>
                    <option value='$Sexo'>$Sexo</option>
                    <option value='Masculino'>Masculino</option>
                    <option value='Feminino'>Feminino</option>
                </select>
                <br>
                Cidade: <input type='text' name='Cidade' id='Cidade' value='$Cidade'> 
                <br>
                <input type='submit' value='Atualizar'>
            </form>
            ";
        }


        #Atualizar dados do cliente
        public function atualizar(){
            $this->recVariaveis();
            $this->atualizarClientes($this->Id, $this->Nome, $this->Sexo, $this->Cidade);
            echo "Usuário Atualizado!";
        }
    }
?>