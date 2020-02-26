<?php
 namespace App\Controller;


 class ControllerCarros{

    public function ValorCarro($Tipo, $motor){
        if($Tipo == 'veiculo' && $motor == '1'){
            $valor = '1000,00';
        }elseif($Tipo == 'veiculo' && $motor == '2'){
            $valor = '2000,00';
        }elseif($Tipo == 'caminhao' && $motor == '1'){
            $valor = '5000,00';
        }elseif($Tipo == 'caminhao' && $motor == '2'){
            $valor = '7000,00';
        }

        echo "O tipo de carro é {$Tipo} e seu valor é {$valor}";
    }

 }


?>