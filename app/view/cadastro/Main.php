<form action="<?php echo DIRPAGE.'cadastro/cadastrar';?>" 
name="FormCadastro" id="FormCadastro" method="POST">  
    Nome: <input type="text" name="Nome" id="Nome"> <br>
    Sexo: 
    <select name="Sexo" id="Sexo">
        <option value="">Selecione</option>
        <option value="Masculino">Masculino</option>
        <option value="Feminino">Feminino</option>
    </select>
    <br>
    Cidade: <input type="text" name="Cidade" id="Cidade"> 
    <br>
    <input type="submit" value="Cadastrar">
</form>

<br><br>    <hr>    <br><br>
<h1>SELEÇÃO DE DADOS</h1>

<form action="<?php echo DIRPAGE.'cadastro/seleciona';?>" name="FormSelect" id="FormSelect" method="POST">  
    Nome: <input type="text" name="Nome" id="Nome"> <br>
    Sexo: 
    <select name="Sexo" id="Sexo">
        <option value="">Selecione</option>
        <option value="Masculino">Masculino</option>
        <option value="Feminino">Feminino</option>
    </select>
    <br>
    Cidade: <input type="text" name="Cidade" id="Cidade"> 
    <br>
    <input type="submit" value="Pesquisar">
</form>

<!-- Receberar a tabela -->
<div class="Resultado"></div>

<br><hr><br>
<h2>Formulário de Atualizações</h2>
<div class="ResultadoFormulario"></div>
