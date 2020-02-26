<?php
 namespace Src\Traits;

 trait TraitUrlParser{

    #Divide a url em um array
    public function parserUrl(){
        /**
         * pega o que esta na url
         * tirar os espaços nas laterais
         * transforma a string em um vetor
         */
        return explode("/", rtrim($_GET['url']), FILTER_SANITIZE_URL);

    }


 }


?>