<?php

namespace Src\Classes;

class ClassBreadcrumb{
    use \Src\Traits\TraitUrlParser;

    // Cria os breadcrumbs do site
    public function addBreadcrumb(){
        $Contador = count($this->parserUrl());
        $ArrayLink[0] = '';

        echo "<a href=".DIRPAGE.">home > </a>";
        //echo $Contador;
        for($I=0; $I< $Contador; $I++){
            $ArrayLink[0] .= $this->parserUrl()[$I].'/';
            echo "<a href=".DIRPAGE.$ArrayLink[0].">".$this->parserUrl()[$I]."</a>";
            
            if($I < $Contador -1){
                echo " > ";
            }
        }
    }


}


?>