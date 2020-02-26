<?php
namespace Src\Classes;

use Src\Traits\TraitUrlParser;

class ClassRoutes{
    use TraitUrlParser;

    private $Rota;

    #Método de retorno da rota
    public function getRota(){
        $Url = $this->parserUrl();
        // atribui a variavel I o primeira url do navegador
        $I = $Url[0];
        // Rota recebera um array com as rotas que nela conterá
        $this->Rota = array(
            ""=>"ControllerHome",
            "Home"=>"ControllerHome",
            "sitemap"=>"ControllerSitemap",
            "carro"=>"ControllerCarros",
            "contato"=>"ControllerContato",
            "cadastro"=>"ControllerCadastro",
            "login"=>"ControllerLogin"
        );
        
        // se a rota na posição I existir dentro do array, então
        if(array_key_exists($I, $this->Rota)){
            // se o arquivo existir no controller
            if(file_exists(DIRREQ."app/controller/{$this->Rota[$I]}.php")){
                // retorna rota existente
                return $this->Rota[$I];
            }else{
                return "ControllerHome";
            }
            //caso não encontre a rota
        }else{
            return "Controller404";
        }   
    }

}
?>